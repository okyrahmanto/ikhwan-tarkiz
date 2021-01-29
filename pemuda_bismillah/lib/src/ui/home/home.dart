import 'package:flutter/material.dart';
import 'package:flutter/rendering.dart';
import 'package:pemuda_bismillah/src/common/CustomIcons.dart';
import 'package:pemuda_bismillah/src/common/custom_scroll.dart';
import 'package:pemuda_bismillah/src/common/design_course_app_theme.dart';
import 'package:pemuda_bismillah/src/common/todos.dart';
import 'package:pemuda_bismillah/src/global_bloc.dart';
import 'package:pemuda_bismillah/src/models/medicine.dart';
import 'package:pemuda_bismillah/src/models/todo.dart';
import 'package:pemuda_bismillah/src/models/user_profile.dart';
import 'package:pemuda_bismillah/src/ui/detail/detail.dart';
import 'package:pemuda_bismillah/src/ui/event_detail/event_detail.dart';
import 'package:pemuda_bismillah/src/ui/home/home_bloc.dart';
import 'package:pemuda_bismillah/src/ui/home_drawer/home_drawer.dart';
import 'package:pemuda_bismillah/src/ui/medicine_details/medicine_details.dart';
import 'package:provider/provider.dart';
import 'package:pemuda_bismillah/src/style/colors.dart';

class Home extends StatefulWidget {
  Home({Key key, this.title}) : super(key: key);
  final String title;

  @override
  _HomeState createState() => _HomeState();
}

class _HomeState extends State<Home> with TickerProviderStateMixin {
  ScrollController scrollController;
  ScrollController scrollControllerSponsor;
  Color backgroundColor;
  LinearGradient backgroundGradient;
  Tween<Color> colorTween;
  int currentPage = 0;
  Color constBackColor;
  HomeBloc _homeBloc;

  ambilAntrian(BuildContext context, String id_pasien, String id_poli,
      String poli, TodoObject todoObject) async {
    movePageAntrian(todoObject);
    /*Response response;
    Dio dio = new Dio();
    //dio.options.baseUrl = "http://192.168.88.29/puskesmas";
    //dio.options.baseUrl = "http://puskesmas.vps.t-paz.com";
    dio.options.baseUrl = "http://pkmbbu.ddns.net/puskesmas";
    //dio.options.responseType=ResponseType.plain;
    try {
      //response = await dio.post("/front/cek_pasien", data: {"id_pasien": 1});
      response = await dio
          .get("/front/queue_mobile/" + id_pasien + "/" + id_poli + "/" + poli);
      print(response.data.toString());
      if (response.data.toString() != null) {
        Map<String, dynamic> user = jsonDecode(response.data.toString());
        no_antrian = user['no_antrian'].toString();
        sisa_antrian = user['sisa_antrian'].toString();
        movePageAntrian(todoObject);
      } else {
        showDialog(
            context: context,
            builder: (context) {
              return AlertDialog(
                content: Text("Data Pasien tidak ditemukan"),
              );
            });
      }
    } catch (e) {
      print(e);
      showDialog(
          context: context,
          builder: (context) {
            return AlertDialog(
              // Retrieve the text the user has entered by using the
              // TextEditingController.
              content: Text("Terjadi Kesalahan"),
            );
          });
    }*/
  }

  movePageAntrian(TodoObject todoObject) {
    Navigator.of(context).push(PageRouteBuilder(
        pageBuilder: (BuildContext context, Animation<double> animation,
                Animation<double> secondaryAnimation) =>
            EventDetailPage(todoObject: todoObject),
        transitionsBuilder: (
          BuildContext context,
          Animation<double> animation,
          Animation<double> secondaryAnimation,
          Widget child,
        ) {
          return SlideTransition(
            position: Tween<Offset>(
              begin: const Offset(0.0, 1.0),
              end: Offset.zero,
            ).animate(animation),
            child: SlideTransition(
              position: Tween<Offset>(
                begin: Offset.zero,
                end: const Offset(0.0, 1.0),
              ).animate(secondaryAnimation),
              child: child,
            ),
          );
        },
        transitionDuration: const Duration(milliseconds: 1000)));
  }

  @override
  void initState() {
    colorTween = ColorTween(begin: todos[0].color, end: todos[0].color);
    backgroundColor = todos[0].color;
    backgroundGradient = todos[0].gradient;
    scrollController = ScrollController();
    scrollController.addListener(() {
      ScrollPosition position = scrollController.position;
      ScrollDirection direction = position.userScrollDirection;
      int page = (position.pixels /
              (position.maxScrollExtent / (todos.length.toDouble() - 1)))
          .toInt();
      double pageDo = (position.pixels /
          (position.maxScrollExtent / (todos.length.toDouble() - 1)));
      double percent = pageDo - page;
      if (todos.length - 1 < page + 1) {
        return;
      }
      colorTween.begin = todos[page].color;
      colorTween.end = todos[page + 1].color;
      setState(() {
        backgroundColor = colorTween.lerp(percent);
        backgroundGradient =
            todos[page].gradient.lerpTo(todos[page + 1].gradient, percent);
      });
    });

    _homeBloc = HomeBloc();
  }

/*
void button2(BuildContext context) {
  print("Button 2");
  //Navigator.of(context).pushNamed('/screen1');
  //Navigator.of(context).pop(true);
  Navigator.of(context).push(PageRouteBuilder(
      pageBuilder: (BuildContext context, Animation<double> animation,
              Animation<double> secondaryAnimation) =>
          Screen1(),
      transitionsBuilder: (
        BuildContext context,
        Animation<double> animation,
        Animation<double> secondaryAnimation,
        Widget child,
      ) {
        return SlideTransition(
          position: Tween<Offset>(
            begin: const Offset(0.0, 1.0),
            end: Offset.zero,
          ).animate(animation),
          child: SlideTransition(
            position: Tween<Offset>(
              begin: Offset.zero,
              end: const Offset(0.0, 1.0),
            ).animate(secondaryAnimation),
            child: child,
          ),
        );
      },
      transitionDuration: const Duration(milliseconds: 1000)));
}

*/
  @override
  Widget build(BuildContext context) {
    final double _width = MediaQuery.of(context).size.width;
    final double _height = MediaQuery.of(context).size.height;

    return Container(
      decoration: BoxDecoration(gradient: backgroundGradient),
      child: Scaffold(
          backgroundColor: Colors.transparent,
          appBar: AppBar(
            backgroundColor: Colors.transparent,
            elevation: 0.0,
          ),
          body: Container(
              child: ListView(
            children: <Widget>[
              Stack(
                children: <Widget>[
                  Container(
                    child: Column(
                      crossAxisAlignment: CrossAxisAlignment.start,
                      children: <Widget>[
                        Container(
                          padding: const EdgeInsets.only(
                              top: 20.0, bottom: 20.0, left: 50.0, right: 60.0),
                          child: Column(
                            crossAxisAlignment: CrossAxisAlignment.start,
                            children: <Widget>[
                              Padding(
                                padding: const EdgeInsets.only(bottom: 25.0),
                                child: Center(
                                  child: Image(
                                    image: AssetImage(
                                        'assets/logo/ic_bismillah_putih.png'),
                                    width:
                                        MediaQuery.of(context).size.width * 0.5,
                                    fit: BoxFit.fitWidth,
                                  ),
                                ),
                              ),
                              Padding(
                                  padding: const EdgeInsets.only(bottom: 10.0),
                                  child: StreamBuilder<UserProfile>(
                                    stream: _homeBloc.user$,
                                    builder: (context, snapshot) {
                                      if (snapshot.data == null) {
                                        return Text(
                                          "Halo",
                                          style: TextStyle(
                                              color: Colors.white,
                                              fontSize: 30.0),
                                        );
                                      } else {
                                        return Text(
                                          "Halo, ${snapshot.data.getNama}",
                                          style: TextStyle(
                                              color: Colors.white,
                                              fontSize: 30.0),
                                        );
                                      }
                                    },
                                  )
                                  ),
                              Text(
                                "Event Pilihan Untukmu",
                                style: TextStyle(color: Colors.white70),
                              ),
                            ],
                          ),
                        ),
                        Container(
                          height: 250.0,
                          width: _width,
                          child: ListView.builder(
                            itemBuilder: (context, index) {
                              TodoObject todoObject = todos[index];
                              EdgeInsets padding = const EdgeInsets.only(
                                  left:10.0,
                                  right: 10.0,
                                  top: 10.0,
                                  bottom: 30.0);

                              double percentComplete =
                                  todoObject.percentComplete();

                              return Padding(
                                  padding: padding,
                                  child: InkWell(
                                    onTap: () {
                                      movePageAntrian(todoObject);
                                      /*ambilAntrian(
                                        context,
                                        id_pasien,
                                        todoObject.idPoli,
                                        todoObject.uniqueName,
                                        todoObject);*/
                                    },
                                    child: Container(
                                        decoration: BoxDecoration(
                                            borderRadius:
                                                BorderRadius.circular(10.0),
                                            boxShadow: [
                                              BoxShadow(
                                                  color: Colors.black
                                                      .withAlpha(70),
                                                  offset:
                                                      const Offset(3.0, 10.0),
                                                  blurRadius: 15.0)
                                            ]),
                                        height: 150.0,
                                        child: Stack(
                                          children: <Widget>[
                                            Hero(
                                              tag: todoObject.uuid +
                                                  "_background",
                                              child: Container(
                                                decoration: BoxDecoration(
                                                  color: Colors.white,
                                                  borderRadius:
                                                      BorderRadius.circular(
                                                          10.0),
                                                ),
                                              ),
                                            ),
                                            Padding(
                                              padding:
                                                  const EdgeInsets.all(0.0),
                                              child: Column(
                                                crossAxisAlignment:
                                                    CrossAxisAlignment.center,
                                                mainAxisSize: MainAxisSize.max,
                                                mainAxisAlignment:
                                                    MainAxisAlignment.center,
                                                children: <Widget>[
                                                  Expanded(
                                                    child: Row(
                                                      crossAxisAlignment:
                                                          CrossAxisAlignment
                                                              .start,
                                                      children: <Widget>[
                                                        Padding(
                                                          padding:
                                                              EdgeInsets.all(
                                                                  0),
                                                          child: Center(
                                                            child: Image(
                                                              image: AssetImage(
                                                                  'assets/logo/ic_poster_4d_pemuda_biru.png'),
                                                              width:
                                                                  _width * 0.73,
                                                              fit: BoxFit.fill,
                                                            ),
                                                          ),
                                                        ),
                                                        /*Expanded(
                                                        child: Container(
                                                            alignment: Alignment.topRight,
                                                            child: Hero(
                                                              tag: todoObject.uuid + "_more_vert",
                                                              child: Material(
                                                                color: Colors.transparent,
                                                                type: MaterialType.transparency,
                                                                child: PopupMenuButton(
                                                                  icon: Icon(
                                                                    Icons.more_vert,
                                                                    color: Colors.grey,
                                                                  ),
                                                                  itemBuilder: (context) => <PopupMenuEntry<TodoCardSettings>>[
                                                                        PopupMenuItem(
                                                                          child: Text("Edit Color"),
                                                                          value: TodoCardSettings.edit_color,
                                                                        ),
                                                                        PopupMenuItem(
                                                                          child: Text("Delete"),
                                                                          value: TodoCardSettings.delete,
                                                                        ),
                                                                      ],
                                                                  onSelected: (setting) {
                                                                    switch (setting) {
                                                                      case TodoCardSettings.edit_color:
                                                                        print("edit color clicked");
                                                                        break;
                                                                      case TodoCardSettings.delete:
                                                                        print("delete clicked");
                                                                        setState(() {
                                                                          todos.remove(todoObject);
                                                                        });
                                                                        break;
                                                                    }
                                                                  },
                                                                ),
                                                              ),
                                                            )),
                                                      )*/
                                                      ],
                                                    ),
                                                  ),
                                                  /*Padding(
                                                    padding: const EdgeInsets.only(bottom: 8.0),
                                                    child: Align(
                                                        alignment: Alignment.bottomLeft,
                                                        child: Hero(
                                                          tag: todoObject.uuid + "_number_of_tasks",
                                                          child: Material(
                                                              color: Colors.transparent,
                                                              child: Text(
                                                                todoObject.taskAmount().toString() + " Tasks",
                                                                style: TextStyle(),
                                                                softWrap: false,
                                                              )),
                                                        ))),*/
                                                  Padding(
                                                    padding:
                                                        const EdgeInsets.only(
                                                            bottom: 10.0,
                                                            left: 20.0),
                                                    child: Align(
                                                        alignment: Alignment
                                                            .bottomLeft,
                                                        child: Hero(
                                                          tag: todoObject.uuid +
                                                              "_title",
                                                          child: Material(
                                                            color: Colors
                                                                .transparent,
                                                            child: Text(
                                                              todoObject.title,
                                                              style: TextStyle(
                                                                  fontSize:
                                                                      20.0),
                                                              softWrap: false,
                                                            ),
                                                          ),
                                                        )),
                                                  ),
                                                ],
                                              ),
                                            ),
                                          ],
                                        )),
                                  ));
                            },
                            padding:
                                const EdgeInsets.only(left: 40.0, right: 40.0),
                            scrollDirection: Axis.horizontal,
                            physics: CustomScrollPhysics(),
                            controller: scrollController,
                            itemExtent: _width - 80,
                            itemCount: todos.length,
                          ),
                        ),
                        Container(
                          padding:
                              const EdgeInsets.only(left: 40.0, right: 40.0),
                          child: Text(
                            "Didukung Oleh",
                            style: TextStyle(color: Colors.white70),
                          ),
                        ),
                        Container(
                          height: 150.0,
                          width: _width,
                          child: ListView(
                            children: <Widget>[
                              getTimeBoxUI(context,
                                  "assets/logo/ic_logo_abude_new.png", "Abude"),
                              getTimeBoxUI(
                                  context, "assets/logo/ic_paz.png", "Abude"),
                            ],
                            padding:
                                const EdgeInsets.only(left: 40.0, right: 40.0),
                            scrollDirection: Axis.horizontal,
                            physics: CustomScrollPhysics(),
                            controller: scrollControllerSponsor,
                            itemExtent: _width * 0.35,
                          ),
                        )
                      ],
                    ),
                  ),
                  Opacity(
                    opacity: 0.0,
                    child: Padding(
                      padding: const EdgeInsets.only(right: 15.0, bottom: 15.0),
                      child: Align(
                        alignment: Alignment.bottomRight,
                        child: FloatingActionButton(
                          onPressed: () {},
                          tooltip: 'Increment',
                          child: Icon(Icons.add),
                        ),
                      ),
                    ),
                  )
                ],
              ),
            ],
          ))),
    );
  }
}

Widget getTimeBoxUI(BuildContext context, String path, String txt2) {
  return Padding(
    padding: const EdgeInsets.all(8.0),
    child: Container(
      decoration: BoxDecoration(
        color: DesignCourseAppTheme.nearlyWhite,
        borderRadius: const BorderRadius.all(Radius.circular(16.0)),
        boxShadow: <BoxShadow>[
          BoxShadow(
              color: DesignCourseAppTheme.grey.withOpacity(0.2),
              offset: const Offset(1.1, 1.1),
              blurRadius: 8.0),
        ],
      ),
      child: Padding(
        padding: const EdgeInsets.only(
            left: 18.0, right: 18.0, top: 12.0, bottom: 12.0),
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          crossAxisAlignment: CrossAxisAlignment.center,
          children: <Widget>[
            Image(
              image: AssetImage(path),
              width: MediaQuery.of(context).size.width * 0.5,
              fit: BoxFit.fitWidth,
            ),
          ],
        ),
      ),
    ),
  );
}

// class MiddleContainer extends StatelessWidget {
//   @override
//   Widget build(BuildContext context) {
//     final GlobalBloc globalBloc = Provider.of<GlobalBloc>(context);
//     return StreamBuilder<Object>(
//         stream: globalBloc.selectedDay$,
//         builder: (context, snapshot) {
//           return Container(
//             height: double.infinity,
//             width: double.infinity,
//             child: Row(
//               mainAxisAlignment: MainAxisAlignment.spaceEvenly,
//               children: <Widget>[
//                 GestureDetector(
//                   onTap: () {
//                     globalBloc.updateSelectedDay(Day.Saturday);
//                   },
//                   child: Container(
//                     height: double.infinity,
//                     width: 50,
//                     child: Center(
//                       child: Text(
//                         "Sat",
//                         style: TextStyle(
//                           color: snapshot.data == (Day.Saturday)
//                               ? Colors.black
//                               : Color(0xFFC9C9C9),
//                           fontSize: 16,
//                           fontWeight: FontWeight.w500,
//                         ),
//                       ),
//                     ),
//                   ),
//                 ),
//                 GestureDetector(
//                   onTap: () {
//                     globalBloc.updateSelectedDay(Day.Sunday);
//                   },
//                   child: Container(
//                     height: double.infinity,
//                     width: 50,
//                     child: Center(
//                       child: Text(
//                         "Sun",
//                         style: TextStyle(
//                           color: snapshot.data == (Day.Sunday)
//                               ? Colors.black
//                               : Color(0xFFC9C9C9),
//                           fontSize: 16,
//                           fontWeight: FontWeight.w500,
//                         ),
//                       ),
//                     ),
//                   ),
//                 ),
//                 GestureDetector(
//                   onTap: () {
//                     globalBloc.updateSelectedDay(Day.Monday);
//                   },
//                   child: Container(
//                     height: double.infinity,
//                     width: 50,
//                     child: Center(
//                       child: Text(
//                         "Mon",
//                         style: TextStyle(
//                           color: snapshot.data == (Day.Monday)
//                               ? Colors.black
//                               : Color(0xFFC9C9C9),
//                           fontSize: 16,
//                           fontWeight: FontWeight.w500,
//                         ),
//                       ),
//                     ),
//                   ),
//                 ),
//                 GestureDetector(
//                   onTap: () {
//                     globalBloc.updateSelectedDay(Day.Tuesday);
//                   },
//                   child: Container(
//                     height: double.infinity,
//                     width: 50,
//                     child: Center(
//                       child: Text(
//                         "Tue",
//                         style: TextStyle(
//                           color: snapshot.data == (Day.Tuesday)
//                               ? Colors.black
//                               : Color(0xFFC9C9C9),
//                           fontSize: 16,
//                           fontWeight: FontWeight.w500,
//                         ),
//                       ),
//                     ),
//                   ),
//                 ),
//                 GestureDetector(
//                   onTap: () {
//                     globalBloc.updateSelectedDay(Day.Wednesday);
//                   },
//                   child: Container(
//                     height: double.infinity,
//                     width: 50,
//                     child: Center(
//                       child: Text(
//                         "Wed",
//                         style: TextStyle(
//                           color: snapshot.data == (Day.Wednesday)
//                               ? Colors.black
//                               : Color(0xFFC9C9C9),
//                           fontSize: 16,
//                           fontWeight: FontWeight.w500,
//                         ),
//                       ),
//                     ),
//                   ),
//                 ),
//                 GestureDetector(
//                   onTap: () {
//                     globalBloc.updateSelectedDay(Day.Thursday);
//                   },
//                   child: Container(
//                     height: double.infinity,
//                     width: 50,
//                     child: Center(
//                       child: Text(
//                         "Thu",
//                         style: TextStyle(
//                           color: snapshot.data == (Day.Thursday)
//                               ? Colors.black
//                               : Color(0xFFC9C9C9),
//                           fontSize: 16,
//                           fontWeight: FontWeight.w500,
//                         ),
//                       ),
//                     ),
//                   ),
//                 ),
//                 GestureDetector(
//                   onTap: () {
//                     globalBloc.updateSelectedDay(Day.Friday);
//                   },
//                   child: Container(
//                     height: double.infinity,
//                     width: 50,
//                     child: Center(
//                       child: Text(
//                         "Fri",
//                         style: TextStyle(
//                           color: snapshot.data == (Day.Friday)
//                               ? Colors.black
//                               : Color(0xFFC9C9C9),
//                           fontSize: 16,
//                           fontWeight: FontWeight.w500,
//                         ),
//                       ),
//                     ),
//                   ),
//                 ),
//               ],
//             ),
//           );
//         });
//   }
// }
