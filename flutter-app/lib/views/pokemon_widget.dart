import 'package:flutter/material.dart';
import 'package:hexcolor/hexcolor.dart';
import 'package:image_network/image_network.dart';
import 'package:untitled/views/pokemon_dialog.dart';

class PokemonWidget extends StatelessWidget {
  final dynamic pokemon;

  const PokemonWidget({Key? key, required this.pokemon}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    var image = int.parse(pokemon['id'].toString());

    return Container(
      decoration: BoxDecoration(
        borderRadius: BorderRadius.circular(5.0),
        color: HexColor('#ffffff').withOpacity(0.9),
        boxShadow: [
          BoxShadow(
            color: Colors.grey.withOpacity(0.2),
            spreadRadius: 2,
            blurRadius: 3,
            offset: const Offset(0, 3),
          ),
        ],
      ),
      padding: const EdgeInsets.symmetric(vertical: 14.0, horizontal: 14.0),
      child: Column(
        children: [
          Row(
            children: [
              Expanded(
                child: Text(
                  pokemon['name'].toString().toUpperCase(),
                  maxLines: 2,
                  style: TextStyle(fontSize: 18.0, fontWeight: FontWeight.bold),
                ),
              ),
              InkWell(
                child: Icon(Icons.info_outline, color: Colors.blue),
                onTap: () => {
                  showDialog(
                      context: context,
                      builder: (BuildContext context) =>
                          PokemonDialog(pokemon: pokemon['id'].toString())),
                },
              ),
            ],
          ),
          SizedBox(height: 10.0),
          ImageNetwork(
            image:
                'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/$image.png',
            onError: Icon(Icons.image_not_supported_rounded),
            height: 100.0,
            width: 100.0,
          ),
          SizedBox(height: 10.0),
          Row(
            children: [
              const Text(
                'Experiencia: ',
                maxLines: 2,
                style: TextStyle(fontSize: 16.0, fontWeight: FontWeight.bold),
              ),
              Text(
                pokemon['base_experience'].toString(),
                maxLines: 2,
                style: TextStyle(
                  fontSize: 14.0,
                  color: int.parse(pokemon['base_experience'].toString()) > 150
                      ? Colors.green
                      : Colors.orangeAccent,
                  fontWeight: FontWeight.normal,
                ),
              )
            ],
          ),
          SizedBox(height: 10.0),
          Row(
            children: [
              const Text(
                'Tamaño: ',
                maxLines: 2,
                style: TextStyle(fontSize: 16.0, fontWeight: FontWeight.bold),
              ),
              Text(
                pokemon['base_experience'].toString(),
                maxLines: 2,
                style: TextStyle(
                  fontSize: 14.0,
                  fontWeight: FontWeight.normal,
                ),
              )
            ],
          ),
        ],
      ),
    );
  }
}
