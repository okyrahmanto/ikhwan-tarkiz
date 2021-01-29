class CourseModel {
  String name;
  String description;
  String university;
  String noOfCource;
  String tag1;
  String tag2;

  CourseModel(
      {this.name,
      this.description,
      this.noOfCource,
      this.university,
      this.tag1,
      this.tag2});
}

class CourseList {
  static List<CourseModel> list = [
    CourseModel(
        name: "Pemuda Bismillah",
        description:
            "Pembukaan Acara Pemuda Bismillah",
        university: "Banjarmasin",
        noOfCource: "",
        tag1: "",
        tag2: ""),
  ];
}
