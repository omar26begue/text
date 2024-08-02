<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PokemonAbilities extends Model
{
    protected $table = 'pokemon_abilities';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'pokemon_id',
        'ability_id',
    ];

    protected $casts = [
        'id' => 'string',
        'pokemon_id' => 'string',
        'ability_id' => 'string',
    ];
}
