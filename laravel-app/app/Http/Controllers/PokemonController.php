<?php

namespace App\Http\Controllers;

use App\Models\Abilities;
use App\Models\Pokemon;

class PokemonController extends Controller
{
    public function __construct()
    {

    }

    public function get()
    {
        $data = Pokemon::all();
        $dataAbilities = Abilities::all();

        function filter1($dataAbilities, $id)
        {
            $response = null;
            for ($i = 0; $i < count($dataAbilities); $i++) {
                if ($dataAbilities[$i]->ability_id == $id) {
                    $response = $dataAbilities[$i]->name;
                    $i = count($dataAbilities);
                }
            }

            return $response;
        }

        for ($i = 0; $i < count($data); $i++) {
            $abilities = array();
            for ($j = 0; $j < count($data[$i]->abilities); $j++) {
                $abilities[] = filter1($dataAbilities, $data[$i]->abilities[$j]->ability_id);
            }

            $data[$i]['items'] = $abilities;
        }
        return response()->json($data, 200);
    }
}
