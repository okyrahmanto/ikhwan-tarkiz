import 'dart:convert';

import 'package:firebase_database/firebase_database.dart';
import 'package:pemuda_bismillah/src/models/errors.dart';
import 'package:pemuda_bismillah/src/models/medicine_type.dart';
import 'package:pemuda_bismillah/src/models/user_profile.dart';
import 'package:rxdart/rxdart.dart';
import 'package:firebase_auth/firebase_auth.dart';
import 'package:shared_preferences/shared_preferences.dart';

class LandingBloc {
  BehaviorSubject<MedicineType> _selectedMedicineType$;
  BehaviorSubject<MedicineType> get selectedMedicineType =>
      _selectedMedicineType$.stream;

  FirebaseAuth _auth;
  FirebaseDatabase _database;
  DatabaseReference _userRef;   

  BehaviorSubject<UserProfile> _userStates$;
  BehaviorSubject<UserProfile> get user$ => _userStates$;
  

  // BehaviorSubject<List<Day>> _checkedDays$;
  // BehaviorSubject<List<Day>> get checkedDays$ => _checkedDays$;

  //BehaviorSubject<int> _selectedInterval$;
  //BehaviorSubject<int> get selectedInterval$ => _selectedInterval$;

  //BehaviorSubject<String> _selectedTimeOfDay$;
  //BehaviorSubject<String> get selectedTimeOfDay$ => _selectedTimeOfDay$;

  BehaviorSubject<EntryError> _errorState$;
  BehaviorSubject<EntryError> get errorState$ => _errorState$;

  LandingBloc() {
   // _selectedMedicineType$ =
   //     BehaviorSubject<MedicineType>.seeded(MedicineType.None);
    // _checkedDays$ = BehaviorSubject<List<Day>>.seeded([]);
   // _selectedTimeOfDay$ = BehaviorSubject<String>.seeded("None");
   // _selectedInterval$ = BehaviorSubject<int>.seeded(0);
   //setLoggedInTrue();
    _errorState$ = BehaviorSubject<EntryError>();
    _auth = FirebaseAuth.instance;
    _database = new FirebaseDatabase();
    _userRef = _database.reference().child('pemuda_bismillah').child('user_profile');
    _userStates$ = BehaviorSubject<UserProfile>.seeded(null);
    getUserProfile();
  }

  void dispose() {
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

  Future<bool> isLoggedIn() async {
    SharedPreferences sharedUser = await SharedPreferences.getInstance();
    return sharedUser.getBool('isLoggedIn');
  }

  Future<bool> setLoggedInTrue() async {
    SharedPreferences sharedUser = await SharedPreferences.getInstance();
    return sharedUser.setBool('isLoggedIn',true);
  }

  

  
  

  Future<UserProfile> getUserProfile() async {
      SharedPreferences sharedUser = await SharedPreferences.getInstance();
      //UserProfile userProfile = UserProfile.fromJson(jsonDecode(sharedUser.getString('userProfile')));
      //_userStates$.add(userProfile);
      //print(" isi dari user profile : $sharedUser.getString('userProfile')");
      //List<String> jsonList = sharedUser.getStringList('userProfile');
      //Map<String, dynamic> tempMap = user.toJson();
      //jsonList.add(jsonEncode(tempMap));
      //sharedUser.setString('userProfile', user.toString());
      //sharedUser.setBool('isLoggedIn', true);
      return null;
  }


}
