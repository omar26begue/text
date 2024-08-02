<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Abilities extends Model
{
    protected $table = 'abilities';

    protected $primaryKey = 'ability_id';

    public $timestamps = false;

    protected $fillable = [
        'ability_id',
        'name'
    ];

    protected $casts = [
        'ability_id' => 'string',
        'name' => 'string',
    ];

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
}
