import 'dart:convert';

class RegisteredEvent {
  final String idRegister;
  final String idEvent;
  final String idPeserta;
  final String idTicket;
  final String status;
  final String device;
  final String isTicketSend;
  final String alasanBatal;

  RegisteredEvent({
    this.idRegister,
    this.idEvent,
    this.idPeserta,
    this.idTicket,
    this.status,
    this.device,
    this.isTicketSend,
    this.alasanBatal
  });

  String get getIdEvent => idEvent;
  String get getIdRegister => idRegister;
  String get getIdPeserta => idPeserta;
  String get getIdTicket => idTicket;
  String get getStatus => status;
  String get getDevice => isTicketSend;
  String get getAlasanBatal => alasanBatal;

 

  Map<String, dynamic> toJson() {
    return {
      "idEvent": this.idEvent,
      "idRegister": this.idRegister,
      "idPeserta":this.idPeserta,
      "idTicket":this.idTicket,
      "status":this.status,
      "device":this.device,
      "isTicketSend": this.isTicketSend,
      "alasanBatal":this.alasanBatal
    };
  }

  factory RegisteredEvent.fromJson(Map<String, dynamic> parsedJson) {
    return RegisteredEvent(
      idEvent: parsedJson['idEvent'],
      idPeserta:parsedJson['idPeserta'],
      idTicket:parsedJson['idTicket'],
      status:parsedJson['status'],
      device:parsedJson['device'],
      isTicketSend:parsedJson['isTicketSend'],
      alasanBatal:parsedJson['alasanBatal'],
    );
  }
  
}
