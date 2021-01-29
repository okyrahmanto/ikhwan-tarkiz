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

class LoginBloc {
  BehaviorSubject<MedicineType> _selectedMedicineType$;
  BehaviorSubject<MedicineType> get selectedMedicineType =>
      _selectedMedicineType$.stream;

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

  LoginBloc() {
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
    //_selectedMedicineType$.close();
    // _checkedDays$.close();
    //_selectedTimeOfDay$.close();
    //_selectedInterval$.close();
  }

  void submitError(EntryError error) {
    _errorState$.add(error);
  }

  bool signInWithEmail(String email, String password) {
    
    return true;
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

  void updateSelectedMedicine(MedicineType type) {
    MedicineType _tempType = _selectedMedicineType$.value;
    if (type == _tempType) {
      _selectedMedicineType$.add(MedicineType.None);
    } else {
      _selectedMedicineType$.add(type);
    }
  }

  Future<bool> loginUserEmail(String email, String password) async {
     AuthResult authResult = await _auth.signInWithEmailAndPassword(
        email: email, password: password);
    FirebaseUser user =  authResult.user;
    //UserProfile userProfile = await getUserProfileCloudDb(user.uid);
    UserProfile userProfile = await getUserProfileServerDb(user.uid,password);
    bool result  = await saveUserProfile(userProfile);
    return result;
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

  Future<UserProfile> getUserProfileCloudDb(String uid) async {
    DataSnapshot data = await _userRef.child(uid).once();    
    //print(data.value);
    return UserProfile.fromSnapshot(data);
    
  }

  Future<UserProfile> getUserProfileServerDb(String uid, String password) async {
     String url = 'https://ikhwan-tarkiz.t-paz.com/index.php/apimobile/auth/user';
      var response = await http.post(
        url, 
        body: 
          {
           'idFirebase': uid
           }
        );
      print('Response status: ${response.statusCode}');
      print('Response body: ${response.body}');
      Map<String, dynamic> userData = jsonDecode(response.body);
      
      return UserProfile(password: password, email: userData['email'], 
        idFirebase: uid, jenisKelamin: userData['jenisKelamin'], 
        nama: userData['nama'], noTelepon: userData['noTelepon'], asalKota: userData['asalKota']);
  }
}
