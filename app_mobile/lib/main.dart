import 'package:flutter/material.dart';
import 'package:pemuda_bismillah/src/global_bloc.dart';
import 'package:pemuda_bismillah/src/ui/landing/landing.dart';
//import 'package:pemuda_bismillah/src/ui/homepage/homepage.dart';
import 'package:pemuda_bismillah/src/ui/login/login.dart';
import 'package:provider/provider.dart';

void main() {
  runApp(PemudaBismillah());
}

class PemudaBismillah extends StatefulWidget {
  @override
  _PemudaBismillahState createState() => _PemudaBismillahState();
}

class _PemudaBismillahState extends State<PemudaBismillah> {
  GlobalBloc globalBloc;

  void initState() {
    globalBloc = GlobalBloc();
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    return Provider<GlobalBloc>.value(
      value: globalBloc,
      child: MaterialApp(
        theme: ThemeData(
          primarySwatch: Colors.green,
          brightness: Brightness.light,
        ),
        home: Landing(),
        debugShowCheckedModeBanner: false,
      ),
    );
  }
}
