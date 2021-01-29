import 'dart:convert';

import 'package:firebase_database/firebase_database.dart';
import 'package:pemuda_bismillah/src/models/errors.dart';
import 'package:pemuda_bismillah/src/models/medicine.dart';
import 'package:pemuda_bismillah/src/models/medicine_type.dart';
import 'package:pemuda_bismillah/src/models/user_profile.dart';
import 'package:rxdart/rxdart.dart';
import 'package:firebase_auth/firebase_auth.dart';
import 'package:shared_preferences/shared_preferences.dart';

class HomeBloc {
  BehaviorSubject<MedicineType> _selectedMedicineType$;
  BehaviorSubject<MedicineType> get selectedMedicineType =>
      _selectedMedicineType$.stream;

  FirebaseAuth _auth;
  FirebaseDatabase _database;
  DatabaseReference _userRef;   

  BehaviorSubject<UserProfile> _userStates$;
  BehaviorSubject<UserProfile> get user$ => _userStates$.stream;
  
  UserProfile _user;
  UserProfile get getUser => _user;

  // BehaviorSubject<List<Day>> _checkedDays$;
  // BehaviorSubject<List<Day>> get checkedDays$ => _checkedDays$;

  //BehaviorSubject<int> _selectedInterval$;
  //BehaviorSubject<int> get selectedInterval$ => _selectedInterval$;

  //BehaviorSubject<String> _selectedTimeOfDay$;
  //BehaviorSubject<String> get selectedTimeOfDay$ => _selectedTimeOfDay$;

  BehaviorSubject<EntryError> _errorState$;
  BehaviorSubject<EntryError> get errorState$ => _errorState$;

  HomeBloc() {
   // _selectedMedicineType$ =
   //     BehaviorSubject<MedicineType>.seeded(MedicineType.None);
    // _checkedDays$ = BehaviorSubject<List<Day>>.seeded([]);
   // _selectedTimeOfDay$ = BehaviorSubject<String>.seeded("None");
   // _selectedInterval$ = BehaviorSubject<int>.seeded(0);
    _errorState$ = BehaviorSubject<EntryError>();
    _auth = FirebaseAuth.instance;
    _database = new FirebaseDatabase();
    _userRef = _database.reference().child('pemuda_bismillah').child('user_profile');
    _userStates$ = BehaviorSubject<UserProfile>.seeded(null);
    getUserProfile().then((value) {
      _user = value;
    });
  }

  void dispose() {
    _selectedMedicineType$.close();
    _userStates$.close();
    
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

  void updateSelectedMedicine(MedicineType type) {
    MedicineType _tempType = _selectedMedicineType$.value;
    if (type == _tempType) {
      _selectedMedicineType$.add(MedicineType.None);
    } else {
      _selectedMedicineType$.add(type);
    }
  }

  Future<bool> registerUserEmail(String email, String password, String noTelepon, String nama) async {
    //bool isRegistered = false;
    print(noTelepon);
    FirebaseUser user =  await registerToFirebaseUserEmail(email, password);
    UserProfile userProfile = UserProfile(email: email, idFirebase: user.uid, nama: nama, password: password, noTelepon: noTelepon);
    await saveUserProfile(userProfile); // local
    await saveUserProfileCloudDb(userProfile);
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
      sharedUser.setString('userProfile', user.toString());
      sharedUser.setBool('isLoggedIn', true);
      return true;
  }

  Future<UserProfile> getUserProfile() async {
      SharedPreferences sharedUser = await SharedPreferences.getInstance();
      UserProfile userProfile = UserProfile.fromJson(jsonDecode(sharedUser.getString('userProfile')));
      _userStates$.add(userProfile);
      //print(sharedUser.getString('userProfile'));
      //List<String> jsonList = sharedUser.getStringList('userProfile');
      //Map<String, dynamic> tempMap = user.toJson();
      //jsonList.add(jsonEncode(tempMap));
      //sharedUser.setString('userProfile', user.toString());
      //sharedUser.setBool('isLoggedIn', true);
      return userProfile;
  }

  Future<bool> saveUserProfileCloudDb(UserProfile user) async {
    _userRef.child(user.getIdFirebase).set({
        "nama": user.getNama,
        "noTelepon": user.getNoTelepon,
        "idFirebase": user.getIdFirebase,
        "email": user.getEmail,
        "password": user.getPassword,
      }
    );
    return true;
  }
}
