<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Pokemon extends Model
{
    protected $table = 'pokemon';

    protected $primaryKey = 'pokemon_id';

    public $timestamps = false;

    protected $fillable = [
        'pokemon_id',
        'name',
        'id',
        'base_experience',
        'heigth'
    ];

    protected $casts = [
        'pokemon_id' => 'string',
        'name' => 'string',
        'id' => 'int',
        'base_experience' => 'int',
        'heigth' => 'int'
    ];

    protected $hidden = [
        'abilities',
        'created_at',
        'updated_at'
    ];

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function abilities(): HasMany
    {
        return $this->hasMany(PokemonAbilities::class, 'pokemon_id');
    }
}
