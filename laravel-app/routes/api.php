<?php

use App\Http\Controllers\PokemonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/pokemon', [PokemonController::class, 'get']);
