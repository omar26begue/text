import 'package:dio/dio.dart';
import 'package:flutter/material.dart';
import 'package:logger/logger.dart';
import 'package:untitled/config.dart';
import 'package:untitled/views/nodata_widget.dart';
import 'package:untitled/views/pokemon_widget.dart';

class PokemonView extends StatefulWidget {
  PokemonView({Key? key}) : super(key: key);

  @override
  _PokemonViewState createState() {
    return _PokemonViewState();
  }
}

class _PokemonViewState extends State<PokemonView> {
  bool _loading = false;
  List<dynamic> _dataPokemon = [];
  final dio = new Dio();
  final logger = Logger();

  @override
  void initState() {
    super.initState();
    loadData();
  }

  @override
  void dispose() {
    super.dispose();
  }

  Future<void> loadData() async {
    try {
      setState(() => _loading = true);
      logger.i('Iniciando consumo de servicio');
      var response = await dio.get('$urlAPI/api/pokemon');
      if (response.statusCode == 200) {
        setState(() => _dataPokemon = response.data);
        logger.i(response.data);
      }
    } catch (e) {
      logger.e(e.toString());
    } finally {
      setState(() => _loading = false);
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Text Flutter'),
        actions: [],
      ),

      body: SafeArea(
        child: Stack(
          children: [
            _loading
                ? Center(child: CircularProgressIndicator())
                : _dataPokemon.isEmpty
                    ? NoDataWidget()
                    : GridView.builder(
                        gridDelegate: SliverGridDelegateWithFixedCrossAxisCount(
                          crossAxisCount:
                              MediaQuery.of(context).size.width > 600 ? 4 : 2,
                          crossAxisSpacing: 8,
                          mainAxisSpacing: 8,
                          childAspectRatio: 3 / 4,
                        ),
                        itemCount: _dataPokemon.length,
                        itemBuilder: (context, index) {
                          return PokemonWidget(pokemon: _dataPokemon[index]);
                        },
                      ),
          ],
        ),
      ),
    );
  }
}
