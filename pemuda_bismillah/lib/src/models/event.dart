import 'dart:convert';

class Event {
  final String idEvent;
  final String namaEvent;
  final String descEvent;
  final DateTime dateEvent;

  Event({
    this.idEvent,
    this.namaEvent,
    this.descEvent,
    this.dateEvent,
  });

  String get getIdEvent => idEvent;
  String get getNamaEvent => namaEvent;
  String get getDescEvent => descEvent;
  DateTime get getDateEvent => dateEvent;

 

  Map<String, dynamic> toJson() {
    return {
      "idEvent": this.idEvent,
      "namaEvent": this.namaEvent,
      "descEvent": this.descEvent,
      "dateEvent": this.dateEvent,
    };
  }

  factory Event.fromJson(Map<String, dynamic> parsedJson) {
    return Event(
      idEvent: parsedJson['idEvent'],
      namaEvent: parsedJson['namaEvent'],
      descEvent: parsedJson['descEvent'],
      dateEvent: parsedJson['dateEvent'],
    );
  }
  
}
