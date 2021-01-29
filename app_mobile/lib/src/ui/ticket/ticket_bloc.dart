import 'dart:convert';

import 'package:pemuda_bismillah/src/models/errors.dart';
import 'package:pemuda_bismillah/src/models/registeredevent.dart';
import 'package:pemuda_bismillah/src/models/user_profile.dart';
import 'package:rxdart/rxdart.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:http/http.dart' as http;

class TicketBloc {

  BehaviorSubject<UserProfile> _userStates$;
  BehaviorSubject<UserProfile> get user$ => _userStates$.stream;

  BehaviorSubject<RegisteredEvent> _registeredEventStates$;
  BehaviorSubject<RegisteredEvent> get registeredEvent$ => _registeredEventStates$.stream;
  
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

  TicketBloc() {
   // _selectedMedicineType$ =
   //     BehaviorSubject<MedicineType>.seeded(MedicineType.None);
    // _checkedDays$ = BehaviorSubject<List<Day>>.seeded([]);
   // _selectedTimeOfDay$ = BehaviorSubject<String>.seeded("None");
   // _selectedInterval$ = BehaviorSubject<int>.seeded(0);
    _userStates$ = BehaviorSubject<UserProfile>.seeded(null);
    _registeredEventStates$ = BehaviorSubject<RegisteredEvent>.seeded(null);
    getUserProfile().then((value) {
      _user = value;
    });
    
    getStatusTicket('1'); 
  }

  void dispose() {
    _userStates$.close();
    _registeredEventStates$.close();
    
    // _checkedDays$.close();
    //_selectedTimeOfDay$.close();
    //_selectedInterval$.close();
  }

  void submitError(EntryError error) {
    _errorState$.add(error);
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

  RegisteredEvent getStatusTicket(String idEvent) {
      String url = 'https://ikhwan-tarkiz.t-paz.com/index.php/apimobile/event/getRegisteredEvent';
      getUserProfile().then((value) async {
        var response = await http.post(
        url, 
        body: 
          {'idFirebase': value.getIdFirebase,
           'idEvent': idEvent,
           }
        );
      print('Response status: ${response.statusCode}');
      print('Response body: ${response.body}');
      RegisteredEvent registeredEvent = RegisteredEvent.fromJson(jsonDecode(response.body));
      _registeredEventStates$.add(registeredEvent);
      return registeredEvent;
      }); 
  }

  Future<bool> signOut() async {
    SharedPreferences sharedUser = await SharedPreferences.getInstance();
    sharedUser.setBool('isLoggedIn', false);
    return true;
  }
}
