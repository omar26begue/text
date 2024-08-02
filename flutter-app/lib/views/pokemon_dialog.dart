import 'package:flutter/material.dart';
import 'package:image_network/image_network.dart';

class PokemonDialog extends StatelessWidget {
  final String pokemon;

  PokemonDialog({Key? key, required this.pokemon}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Dialog(
      elevation: 5.0,

      child: Column(
        mainAxisSize: MainAxisSize.min,
        mainAxisAlignment: MainAxisAlignment.center,
        children: [
          ImageNetwork(
            image:
            'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/$pokemon.png',
            onError: Icon(Icons.image_not_supported_rounded),
            width: MediaQuery.of(context).size.width * 0.7,
            height: MediaQuery.of(context).size.height * 0.5,
          )
        ],
      ),
    );
  }
}
