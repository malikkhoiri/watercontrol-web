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

Route::get('/', 'WelcomeController@index');

Route::get('/data', function (){

    $pathFile = storage_path('app/public/data.json');

    if(File::exists($pathFile)){
        // Read File
        $jsonString = file_get_contents($pathFile);

        return json_decode($jsonString, true);
    } else{
        File::put($pathFile, json_encode([
            "temp" => 0,
            "ph" => 0,
            "high" => 0
        ]));

        $jsonString = file_get_contents(storage_path('app/public/data.json'));

        return json_decode($jsonString, true);
    }
})->name('data');

Route::get('/write', 'WelcomeController@write');
