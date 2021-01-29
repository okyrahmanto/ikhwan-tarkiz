import 'dart:convert';

import 'package:firebase_database/firebase_database.dart';
import 'package:pemuda_bismillah/src/models/errors.dart';
import 'package:pemuda_bismillah/src/models/medicine.dart';
import 'package:pemuda_bismillah/src/models/medicine_type.dart';
import 'package:pemuda_bismillah/src/models/user_profile.dart';
import 'package:rxdart/rxdart.dart';
import 'package:firebase_auth/firebase_auth.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:http/http.dart' as http;

class RegisterBloc {

  FirebaseAuth _auth;
  FirebaseDatabase _database;
  DatabaseReference _userRef;   

  // BehaviorSubject<List<Day>> _checkedDays$;
  // BehaviorSubject<List<Day>> get checkedDays$ => _checkedDays$;

  //BehaviorSubject<int> _selectedInterval$;
  //BehaviorSubject<int> get selectedInterval$ => _selectedInterval$;

  //BehaviorSubject<String> _selectedTimeOfDay$;
  //BehaviorSubject<String> get selectedTimeOfDay$ => _selectedTimeOfDay$;

  BehaviorSubject<EntryError> _errorState$;
  BehaviorSubject<EntryError> get errorState$ => _errorState$;

  RegisterBloc() {
   // _selectedMedicineType$ =
   //     BehaviorSubject<MedicineType>.seeded(MedicineType.None);
    // _checkedDays$ = BehaviorSubject<List<Day>>.seeded([]);
   // _selectedTimeOfDay$ = BehaviorSubject<String>.seeded("None");
   // _selectedInterval$ = BehaviorSubject<int>.seeded(0);
    _errorState$ = BehaviorSubject<EntryError>();
    _auth = FirebaseAuth.instance;
    _database = new FirebaseDatabase();
    _userRef = _database.reference().child('pemuda_bismillah').child('user_profile');
  }

  void dispose() {
    
    // _checkedDays$.close();
    //_selectedTimeOfDay$.close();
    //_selectedInterval$.close();
  }

  void submitError(EntryError error) {
    _errorState$.add(error);
  }

  

  // void addtoDays(Day day) {
  //   List<Day> _updatedDayList = _checkedDays$.value;
  //   if (_updatedDayList.contains(day)) {
  //     _updatedDayList.remove(day);
  //   } else {
  //     _updatedDayList.add(day);
  //   }
  //   _checkedDays$.add(_updatedDayList);
  // }

  Future<bool> registerUserEmail(String email, String password, String noTelepon, String nama, String jenisKelamin, String asalKota) async {
    //bool isRegistered = false;
    print(noTelepon);
    FirebaseUser user =  await registerToFirebaseUserEmail(email, password);
    UserProfile userProfile = UserProfile(email: email, idFirebase: user.uid, nama: nama, password: password, noTelepon: noTelepon, jenisKelamin: jenisKelamin, asalKota: asalKota);
    await saveUserProfile(userProfile); // local
    await saveUserProfileCloudDb(userProfile);
    await saveUserProfileDbServer(userProfile);
    return true;
    //UserProfile userProfile = UserProfile(email: email, idFirebase: '', nama: nama, password: password);
    //saveUserProfile(userProfile);
    //return true;
  }

  Future<FirebaseUser> registerToFirebaseUserEmail(String email, String password) async {
    FirebaseUser user = (await _auth.createUserWithEmailAndPassword(
      email: email,
      password: password,
    )).user;
    return user;
  }

  Future<bool> saveUserProfile(UserProfile user) async {
      SharedPreferences sharedUser = await SharedPreferences.getInstance();
      //List<String> jsonList = sharedUser.getStringList('userProfile');
      //Map<String, dynamic> tempMap = user.toJson();
      //jsonList.add(jsonEncode(tempMap));
      sharedUser.setString('userProfile', jsonEncode(user.toJson()));
      sharedUser.setBool('isLoggedIn', true);
      return true;
  }

  Future<bool> saveUserProfileDbServer(UserProfile user) async {
      String url = 'https://ikhwan-tarkiz.t-paz.com/index.php/apimobile/auth/user_register';
      var response = await http.post(
        url, 
        body: 
          {'nama': user.getNama,
           'email': user.getEmail,
           'noTelepon': user.getNoTelepon,
           'idFirebase': user.getIdFirebase,
           'password': user.getPassword,
           'jenisKelamin': user.getJenisKelamin,
           'asalKota': user.getAsalKota
           }
        );
      print('Response status: ${response.statusCode}');
      print('Response body: ${response.body}');
      return true;
  }

  Future<bool> saveUserProfileCloudDb(UserProfile user) async {
    _userRef.child(user.getIdFirebase).set({
        "nama": user.getNama,
        "noTelepon": user.getNoTelepon,
        "idFirebase": user.getIdFirebase,
        "email": user.getEmail,
        "password": user.getPassword,
        "jenisKelamin": user.getJenisKelamin,
        "asalKota": user.getAsalKota,
      }
    );
    return true;
  }
}
