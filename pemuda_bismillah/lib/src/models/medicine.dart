class Medicine {
  final List<dynamic> notificationIDs;
  final String medicineName;
  final int dosage;
  final String medicineType;
  final int interval;
  final String startTime;
  final String medicineUses;
  final String notes;

  Medicine({
    this.notificationIDs,
    this.medicineName,
    this.dosage,
    this.medicineType,
    this.startTime,
    this.interval,
    this.medicineUses,
    this.notes
  });

  String get getName => medicineName;
  int get getDosage => dosage;
  String get getType => medicineType;
  int get getInterval => interval;
  String get getStartTime => startTime;
  String get getMedicineUses => medicineUses;
  String get getNotes => notes;
  List<dynamic> get getIDs => notificationIDs;

  Map<String, dynamic> toJson() {
    return {
      "ids": this.notificationIDs,
      "name": this.medicineName,
      "dosage": this.dosage,
      "type": this.medicineType,
      "interval": this.interval,
      "start": this.startTime,
      "medicineUses": this.medicineUses,
      "notes": this.notes,
    };
  }

  factory Medicine.fromJson(Map<String, dynamic> parsedJson) {
    return Medicine(
      notificationIDs: parsedJson['ids'],
      medicineName: parsedJson['name'],
      dosage: parsedJson['dosage'],
      medicineType: parsedJson['type'],
      interval: parsedJson['interval'],
      startTime: parsedJson['start'],
      medicineUses: parsedJson['medicineUses'],
      notes: parsedJson['notes'],
    );
  }
}
