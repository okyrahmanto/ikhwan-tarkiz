import 'dart:convert';

import 'package:pemuda_bismillah/src/models/user_profile.dart';
import 'package:rxdart/rxdart.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:http/http.dart' as http;
import 'dart:io' show Platform;

class EventDetailBloc {
 
  BehaviorSubject<UserProfile> _userStates$;
  BehaviorSubject<UserProfile> get user$ => _userStates$.stream;
  
  UserProfile _user;
  UserProfile get getUser => _user;

   String _device;

  EventDetailBloc() {
    _userStates$ = BehaviorSubject<UserProfile>.seeded(null);
    getUserProfile().then((value) {
      _user = value;
      
    });

    _device = getDeviceType();

  }

  void dispose() {

    _userStates$.close();
    
    // _checkedDays$.close();
    //_selectedTimeOfDay$.close();
    //_selectedInterval$.close();
  }

  Future<UserProfile> getUserProfile() async {
      SharedPreferences sharedUser = await SharedPreferences.getInstance();
      UserProfile userProfile = UserProfile.fromJson(jsonDecode(sharedUser.getString('userProfile')));
      _userStates$.add(userProfile);
      return userProfile;
  }

  registerEvent(String idEvent, String idTiket) async {
      String url = 'https://ikhwan-tarkiz.t-paz.com/index.php/apimobile/event/registerEvent';
      getUserProfile().then((value) async {
        var response = await http.post(
        url, 
        body: 
          {'idFirebase': value.getIdFirebase,
           'idEvent': idEvent,
           'idTicket': idTiket,
           'device': _device
           }
        );
      print('Response status: ${response.statusCode}');
      print('Response body: ${response.body}');
      }); 
      return true;


  }

  getDeviceType() {
    if (Platform.isAndroid) {
      return 'Android';
    } else if (Platform.isIOS) {
      return 'IOS';
    }
  }

}
