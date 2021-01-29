import 'dart:convert';

class Ticket {
  final String idTicket;
  final String namaTicket;
  final String descTicket;
  final DateTime dateTicket;

  Ticket({
    this.idTicket,
    this.namaTicket,
    this.descTicket,
    this.dateTicket,
  });

  String get getIdTicket => idTicket;
  String get getNamaTicket => namaTicket;
  String get getDescTicket => descTicket;
  DateTime get getDateTicket => dateTicket;

 

  Map<String, dynamic> toJson() {
    return {
      "idTicket": this.idTicket,
      "namaTicket": this.namaTicket,
      "descTicket": this.descTicket,
      "dateTicket": this.dateTicket,
    };
  }

  factory Ticket.fromJson(Map<String, dynamic> parsedJson) {
    return Ticket(
      idTicket: parsedJson['idTicket'],
      namaTicket: parsedJson['namaTicket'],
      descTicket: parsedJson['descTicket'],
      dateTicket: parsedJson['dateTicket'],
    );
  }
  
}
