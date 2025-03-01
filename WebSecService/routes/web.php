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
   Route::get('/minitest', function () {
    $bill=[
        ["item"=>"apple","quantity"=>2,"price"=>9.5],
        ["item"=>"mango","quantity"=>2,"price"=>12.5],
        ["item"=>"tea","quantity"=>2,"price"=>4],
    ];
    $sub=0;
    foreach($bill as $item){
        $sub+=$item["quantity"]*$item["price"];
    };
    return view('minitest',compact('bill','sub'));
    Route::get('/tran', function () {
        $course=[
            ["code"=>"c1010","name"=>"oop","grade"=>"a+","chours"=>2],
            ["code"=>"c1070","name"=>"os","grade"=>"a","chours"=>4],
            ["code"=>"c1080","name"=>"math","grade"=>"b","chours"=>3],
        ];
        $sub=0;
        foreach($courses as $item){
            $sub+=$item["chours"];
        };
        return view('tran',compact('course','sub'));
       });
   });