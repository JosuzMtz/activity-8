<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperheroController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('superheroes', SuperheroController::class);