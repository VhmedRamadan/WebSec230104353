<?php

use App\Http\Controllers\Web\ProductsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

Route::get('register', [UsersController::class, 'register'])->name('register');
Route::post('register', [UsersController::class, 'doRegister'])->name('do_register');
Route::get('login', [UsersController::class, 'login'])->name('login');
Route::post('login', [UsersController::class, 'doLogin'])->name('do_login');
Route::get('logout', [UsersController::class, 'doLogout'])->name('do_logout');

Route::get('/', function () {
    return view('welcome'); //welcome.blade.php
});
Route::get('/multable', function (Request $request) {
    $j = $request->number ??2;
    $msg = $request->msg ??'';
    return view('multable', compact('j',"msg")); //multable.blade.php
});
Route::get('/even', function () {
    return view('even'); //even.blade.php
});
Route::get('/prime', function () {
    return view('prime'); //prime.blade.php
});
Route::get('/test', function () {
    return view('test'); //test.blade.php
});
Route::get('/minitest', function () {
    $items = [
        ['item' => 'Apple', 'quantity' => 3, 'price' => 1.00],
        ['item' => 'Banana', 'quantity' => 2, 'price' => 0.50],
        ['item' => 'Orange', 'quantity' => 5, 'price' => 0.80],
    ];
    return view('minitest', ['items' => $items]);
});
Route::get('/transcript', function () {
    $transcripts = [
        ['course' => 'Mathematics', 'course_code' => 'MATH104', 'credit_hours' => 3, 'grade' => 'A'],
        ['course' => 'Chemistry', 'course_code' => 'CHEM302', 'credit_hours' => 3, 'grade' => 'A-'],
        ['course' => 'Physics', 'course_code' => 'PHYS203', 'credit_hours' => 4, 'grade' => 'B+'],

    ];
    return view('transcript', ['transcripts' => $transcripts]);
});

Route::get('products', [ProductsController::class, 'list'])->name('products_list');
Route::get('products/edit/{product?}', [ProductsController::class, 'edit'])->name('products_edit');
Route::post('products/save/{product?}', [ProductsController::class, 'save'])->name('products_save');
Route::get('products/delete/{product}', [ProductsController::class, 'delete'])->name('products_delete');

Route::get('/calculator', function () {
    return view('calculator');
});

Route::get('/products2', function () {
    $products = [
        [
            'name' => 'Laptop',
            'image' => 'https://via.placeholder.com/150',
            'price' => 15000,
            'description' => 'A high-performance laptop for all your needs.'
        ],
        [
            'name' => 'Smartphone',
            'image' => 'https://via.placeholder.com/150',
            'price' => 8000,
            'description' => 'A sleek smartphone with the latest features.'
        ],
        [
            'name' => 'Headphones',
            'image' => 'https://via.placeholder.com/150',
            'price' => 2000,
            'description' => 'Noise-canceling headphones for a great experience.'
        ]
    ];

    return view('products2', compact('products'));
});

Route::prefix('users')->group(function () {
    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
    Route::get('/', [UsersController::class, 'index'])->name('users.index');
    Route::get('/create', [UsersController::class, 'create'])->name('users.create');
    Route::post('/store', [UsersController::class, 'store'])->name('users.store');
    Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
    Route::post('/update/{id}', [UsersController::class, 'update'])->name('users.update');
    Route::get('/delete/{id}', [UsersController::class, 'destroy'])->name('users.delete');


});
