<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class SeedPokemon extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:seed-pokemon';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $count = 1;

        while ($count <= 100) {
            echo 'Agregando pokemon ' . $count . "\n";

            $response = Http::get('https://pokeapi.co/api/v2/pokemon?offset=' . rand(1, 1302) . '&limit=1');

            $responsePokemon = $response->json()['results'][0];
            $dataPokemon = DB::table('pokemon')->where('name', '=', $responsePokemon['name'])->first();

            if ($dataPokemon == NULL) {
                $dataInfoAbilities = $this->getAbilities($responsePokemon['name']);

                $responseAbilities = $dataInfoAbilities['abilities'];
                for ($i = 0; $i < count($responseAbilities); $i++) {
                    $dataAbilitie = DB::table('abilities')->where('name', '=', $responseAbilities[$i]['ability']['name'])->first();

                    if ($dataAbilitie == NULL) {
                        DB::table('abilities')->insert(array(
                            'ability_id' => Str::uuid(),
                            'name' => $responseAbilities[$i]['ability']['name']
                        ));
                    }
                }

                DB::table('pokemon')->insert(array(
                    'pokemon_id' => Str::uuid(),
                    'name' => $responsePokemon['name'],
                    'id' => $dataInfoAbilities['id'],
                    'base_experience' => $dataInfoAbilities['base_experience'],
                    'heigth' => $dataInfoAbilities['height'],
                ));

                $this->addAbilities($responsePokemon['name'], $responseAbilities);

                $count++;
            }
        }
    }

    private function getAbilities($name)
    {
        $response = Http::get('https://pokeapi.co/api/v2/pokemon/' . $name);
        return $response->json();
    }

    private function addAbilities($name, $abilities)
    {
        $request = array();

        $dataPokemon = DB::table('pokemon')->where('name', '=', $name)->first();
        for ($i = 0; $i < count($abilities); $i++) {
            $dataAbilities = DB::table('abilities')->where('name', '=', $abilities[$i]['ability']['name'])->first();

            $request[] = array(
                'id' => Str::uuid(),
                'pokemon_id' => $dataPokemon->pokemon_id,
                'ability_id' => $dataAbilities->ability_id
            );
        }

        DB::table('pokemon_abilities')->insert($request);
    }
}
