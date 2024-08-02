import 'package:flutter/material.dart';

class NoDataWidget extends StatelessWidget {
  NoDataWidget({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Center(
      child: Icon(
        Icons.earbuds_rounded,
        size: 100.0,
      ),
    );
  }
}
