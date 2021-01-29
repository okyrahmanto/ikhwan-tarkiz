import 'package:flutter/material.dart';
import 'package:pemuda_bismillah/src/models/todo.dart';

List<TodoObject> todos = [
  // TodoObject.import("SOME_RANDOM_UUID", "Custom", 1, ColorChoies.colors[0], Icons.alarm, [TaskObject("Task", DateTime.now()),TaskObject("Task2", DateTime.now()),TaskObject.import("Task3", DateTime.now(), true)]),
  /*TodoObject.import("SOME_RANDOM_UUID", "Custom", 1, ColorChoices.choices[0], Icons.alarm, {
    DateTime(2018, 5, 3): [
      TaskObject("Meet Clients", DateTime(2018, 5, 3)),
      TaskObject("Design Sprint", DateTime(2018, 5, 3)),
      TaskObject("Icon Set Design for Mobile", DateTime(2018, 5, 3)),
      TaskObject("HTML/CSS Study", DateTime(2018, 5, 3)),
    ],
    DateTime(2018, 5, 4): [
      TaskObject("Meet Clients", DateTime(2018, 5, 4)),
      TaskObject("Design Sprint", DateTime(2018, 5, 4)),
      TaskObject("Icon Set Design for Mobile", DateTime(2018, 5, 4)),
      TaskObject("HTML/CSS Study", DateTime(2018, 5, 4)),
    ]
  }),
  */
  TodoObject("Pemuda Bismillah", Icons.person, "", "1"),
];