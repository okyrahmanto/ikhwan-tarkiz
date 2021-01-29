import 'package:flutter/material.dart';
import 'package:pemuda_bismillah/src/common/color_choice.dart';
//import 'main.dart';
import 'package:uuid/uuid.dart';
import 'dart:math';
import 'dart:collection';

class TodoObject {
  TodoObject(String title, IconData icon, String uniqueName, String idEvent) {
    this.title = title;
    this.uniqueName = uniqueName;
    this.icon = icon;
    this.idEvent = idEvent;
    ColorChoice choice = ColorChoices.choices[new Random().nextInt(ColorChoices.choices.length)];
    this.color = choice.primary;
    this.gradient = LinearGradient(colors: choice.gradient, begin: Alignment.bottomCenter, end: Alignment.topCenter);
    tasks = new Map<DateTime, List<TaskObject>>();
    this.uuid = new Uuid().v1();
  }

  TodoObject.import(String uuidS, String title, int sortID, ColorChoice color, IconData icon, Map<DateTime, List<TaskObject>> tasks) {
    this.sortID = sortID;
    this.title = title;
    this.color = color.primary;
    this.gradient = LinearGradient(colors: color.gradient, begin: Alignment.bottomCenter, end: Alignment.topCenter);
    this.icon = icon;
    this.tasks = tasks;
    this.uuid = uuidS;
  }

  String uuid;
  String uniqueName;
  String idEvent;
  int sortID;
  String title;
  Color color;
  LinearGradient gradient;
  IconData icon;
  Map<DateTime, List<TaskObject>> tasks;

  int taskAmount() {
    int amount = 0;
    tasks.values.forEach((list) {
      amount += list.length;
    });
    return amount;
  }

  //List<TaskObject> tasks;

  double percentComplete() {
    if (tasks.isEmpty) {
      return 1.0;
    }
    int completed = 0;
    int amount = 0;
    tasks.values.forEach((list) {
      amount += list.length;
      list.forEach((task) {
        if (task.isCompleted()) {
          completed++;
        }
      });
    });
    return completed / amount;
  }
}

class TaskObject {
  DateTime date;
  String task;
  bool _completed;

  TaskObject(String task, DateTime date) {
    this.task = task;
    this.date = date;
    this._completed = false;
  }

  TaskObject.import(String task, DateTime date, bool completed) {
    this.task = task;
    this.date = date;
    this._completed = completed;
  }

  void setComplete(bool value) {
    _completed = value;
  }

  isCompleted() => _completed;
}
