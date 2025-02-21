<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
   });
    Route::get('/multi/{upto?}', function ($upto = 8) {
        return view('multi', [
            'upto' => $upto,
            'title' => "Multiplication Tables (1 to $upto)"
        ]);
    })->where('upto', '[0-9]+'); // Only accept numeric values
   Route::get('/even', function () {
    return view('even'); 
   });
   Route::get('/prime', function () {
    return view('prime');
   });
   