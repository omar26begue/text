import 'package:flutter/material.dart';
import 'package:untitled/views/pokemon_view.dart';

void main() {
  runApp(AppTest());
}

class AppTest extends StatefulWidget {
  AppTest({Key? key}) : super(key: key);

  @override
  _AppTestState createState() {
    return _AppTestState();
  }
}

class _AppTestState extends State<AppTest> {
  @override
  void initState() {
    super.initState();
  }

  @override
  void dispose() {
    super.dispose();
  }

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      home: PokemonView(),
    );
  }
}
