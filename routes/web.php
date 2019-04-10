<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'ConvertController@showForm');
Route::get('/convert_units', 'ConvertController@convertUnits');
//Route::any('/showResults', 'ConvertController@showResults');
//Route::view('/result', 'convertController@showResult')

//Route::get('/calculate/', 'ConvertController@calculate');


//Route::get('/{unitType, system, valueToConvert}', 'ConvertController@calculate');

## Example routes from the discussion of P3 development (Week 6, Part 8 video)
//Route::get('/', 'TriviaController@index');
//Route::get('/check-answer', 'TriviaController@checkAnswer');
