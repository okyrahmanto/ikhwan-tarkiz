import 'dart:convert';
import 'package:pemuda_bismillah/src/models/event.dart';
import 'package:pemuda_bismillah/src/models/medicine.dart';
import 'package:pemuda_bismillah/src/models/user_profile.dart';
import 'package:rxdart/rxdart.dart';
import 'package:flutter_local_notifications/flutter_local_notifications.dart';
import 'package:shared_preferences/shared_preferences.dart';

class GlobalBloc {
  // BehaviorSubject<Day> _selectedDay$;
  // BehaviorSubject<Day> get selectedDay$ => _selectedDay$.stream;
  
  // BehaviorSubject<Period> _selectedPeriod$;
  // BehaviorSubject<Period> get selectedPeriod$ => _selectedPeriod$.stream;
  bool isPopupAlreadyShown = false;

  BehaviorSubject<List<Medicine>> _medicineList$;
  BehaviorSubject<List<Medicine>> get medicineList$ => _medicineList$;

  BehaviorSubject<List<Event>> _eventList$;
  BehaviorSubject<List<Event>> get eventList$ => _eventList$;

  GlobalBloc() {
    _medicineList$ = BehaviorSubject<List<Medicine>>.seeded([]);
    _eventList$ = BehaviorSubject<List<Event>>.seeded([]);
    makeMedicineList();
    makeEventist();

   
    // _selectedDay$ = BehaviorSubject<Day>.seeded(Day.Saturday);
    // _selectedPeriod$ = BehaviorSubject<Period>.seeded(Period.Week);
  }

  // void updateSelectedDay(Day day) {
  //   _selectedDay$.add(day);
  // }

  // void updateSelectedPeriod(Period period) {
  //   _selectedPeriod$.add(period);
  // }

  Future saveUserDetails(UserProfile user) async {
     SharedPreferences sharedUser = await SharedPreferences.getInstance();
      List<String> jsonList = sharedUser.getStringList('userProfile');
      jsonList.clear();
      jsonList.add(jsonEncode(user));
      sharedUser.setStringList('userProfile', jsonList);
  }

  Future removeMedicine(Medicine tobeRemoved) async {
    FlutterLocalNotificationsPlugin flutterLocalNotificationsPlugin =
        FlutterLocalNotificationsPlugin();
    SharedPreferences sharedUser = await SharedPreferences.getInstance();
    List<String> medicineJsonList = [];

    var blocList = _medicineList$.value;
    blocList.removeWhere(
        (medicine) => medicine.medicineName == tobeRemoved.medicineName);

    for (int i = 0; i < (24 / tobeRemoved.interval).floor(); i++) {
      flutterLocalNotificationsPlugin
          .cancel(int.parse(tobeRemoved.notificationIDs[i]));
    }
    if (blocList.length != 0) {
      for (var blocMedicine in blocList) {
        String medicineJson = jsonEncode(blocMedicine.toJson());
        medicineJsonList.add(medicineJson);
      }
    }
    sharedUser.setStringList('medicines', medicineJsonList);
    _medicineList$.add(blocList);
  }

  Future updateMedicineList(Medicine newMedicine) async {
    var blocList = _medicineList$.value;
    blocList.add(newMedicine);
    _medicineList$.add(blocList);
    Map<String, dynamic> tempMap = newMedicine.toJson();
    SharedPreferences sharedUser = await SharedPreferences.getInstance();
    String newMedicineJson = jsonEncode(tempMap);
    List<String> medicineJsonList = [];
    if (sharedUser.getStringList('medicines') == null) {
      medicineJsonList.add(newMedicineJson);
    } else {
      medicineJsonList = sharedUser.getStringList('medicines');
      medicineJsonList.add(newMedicineJson);
    }
    sharedUser.setStringList('medicines', medicineJsonList);
  }

  Future makeMedicineList() async {
    SharedPreferences sharedUser = await SharedPreferences.getInstance();
    List<String> jsonList = sharedUser.getStringList('medicines');
    List<Medicine> prefList = [];
    if (jsonList == null) {
      return;
    } else {
      for (String jsonMedicine in jsonList) {
        Map userMap = jsonDecode(jsonMedicine);
        Medicine tempMedicine = Medicine.fromJson(userMap);
        prefList.add(tempMedicine);
      }
      _medicineList$.add(prefList);
    }
  }

 // Event
  Future removeEvent(Event tobeRemoved) async {
    
    SharedPreferences sharedUser = await SharedPreferences.getInstance();
    List<String> eventJsonList = [];

    var blocList = _eventList$.value;
    blocList.removeWhere(
        (event) => event.namaEvent == tobeRemoved.namaEvent);

    if (blocList.length != 0) {
      for (var blocEvent in blocList) {
        String eventJson = jsonEncode(blocEvent.toJson());
        eventJsonList.add(eventJson);
      }
    }
    sharedUser.setStringList('events', eventJsonList);
    _eventList$.add(blocList);
  }

  Future updateEventList(Event newEvent) async {
    var blocList = _eventList$.value;
    blocList.add(newEvent);
    _eventList$.add(blocList);
    Map<String, dynamic> tempMap = newEvent.toJson();
    SharedPreferences sharedUser = await SharedPreferences.getInstance();
    String newEventJson = jsonEncode(tempMap);
    List<String> eventJsonList = [];
    if (sharedUser.getStringList('events') == null) {
      eventJsonList.add(newEventJson);
    } else {
      eventJsonList = sharedUser.getStringList('events');
      eventJsonList.add(newEventJson);
    }
    sharedUser.setStringList('events', eventJsonList);
  }

  Future makeEventist() async {
    SharedPreferences sharedUser = await SharedPreferences.getInstance();
    List<String> jsonList = sharedUser.getStringList('events');
    List<Event> prefList = [];
    if (jsonList == null) {
      return;
    } else {
      for (String jsonEvent in jsonList) {
        Map userMap = jsonDecode(jsonEvent);
        Event tempEvent = Event.fromJson(userMap);
        prefList.add(tempEvent);
      }
      _eventList$.add(prefList);
    }
  }

  void dispose() {
    // _selectedDay$.close();
    // _selectedPeriod$.close();
    _medicineList$.close();
  }

  void setPopUpAlreadyShown() => isPopupAlreadyShown = true;
    
  

  bool get getPopUpAlreadyShown => isPopupAlreadyShown;

}
