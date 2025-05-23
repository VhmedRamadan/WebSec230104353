<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\ProductsController;
use App\Http\Controllers\Web\UsersController;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Web\ForgetPasswordController;
use Laravel\Socialite\Facades\Socialite;

// Route::get('/login/facebook', function () {
// });

Route::get('/collect', function (Request $request) {
    $name = $request->query('name');
    $credit = $request->query('credit');
    return response('data collected',200)
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE')
        ->header('Access-Control-Allow-Headers', 'Content-Type, X-requested-With');
});

// // Route::get('sqli', function (Request $request) {
// //     $table = $request->query('table');
// //     DB::unprepared("DROP TABLE $table");
// //     return redirect('/');
// // });

Route::get('register', [UsersController::class, 'register'])->name('register');
Route::post('register', [UsersController::class, 'doRegister'])->name('do_register');
Route::get('login', [UsersController::class, 'login'])->name('login');
Route::post('login', [UsersController::class, 'doLogin'])->name('do_login');
Route::get('logout', [UsersController::class, 'doLogout'])->name('do_logout');
Route::get('/forgot-password', [ForgetPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgetPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [ForgetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ForgetPasswordController::class, 'reset'])->name('password.update');
Route::get('/login/facebook', function () {
    return Socialite::driver('facebook')->redirect();
})->name('facebook.login');
Route::get('/login/facebook/callback', function () {
    $facebookUser = Socialite::driver('facebook')->user();
    $user = User::firstOrCreate(
        ['email' => $facebookUser->getEmail()],
        ['name' => $facebookUser->getName(), 'password' => bcrypt('facebook')]
    );
    Auth::login($user);
    return redirect('/home');
});
Route::get('/auth/google',
    [UsersController::class, 'redirectToGoogle'])
        ->name('login_with_google');
Route::get('/auth/google/callback',
    [UsersController::class, 'handleGoogleCallback']);

Route::get('verify', [UsersController::class, 'verify'])->name('verify');


Route::middleware(['auth'])->group(function(){
    Route::get('users', [UsersController::class, 'list'])->name('users');
    Route::get('profile/{user?}', [UsersController::class, 'profile'])->name('profile');
    Route::get('users/edit/{user?}', [UsersController::class, 'edit'])->name('users_edit');
    Route::post('users/save/{user}', [UsersController::class, 'save'])->name('users_save');
    Route::get('users/delete/{user}', [UsersController::class, 'delete'])->name('users_delete');
    Route::get('users/edit_password/{user?}', [UsersController::class, 'editPassword'])->name('edit_password');
    Route::post('users/save_password/{user}', [UsersController::class, 'savePassword'])->name('save_password');
    Route::get('users/create', [UsersController::class, 'create'])->name('create');
    Route::post('create', [UsersController::class, 'store'])->name('store');
    Route::get('customers', [UsersController::class, 'listCustomers'])->name('customers');
    Route::get('/insufficient-credit', function () {return view('users.insufficient');})->name('insufficient.credit');
    Route::get('products/edit/{product?}', [ProductsController::class, 'edit'])->name('products_edit');
    Route::post('products/save/{product?}', [ProductsController::class, 'save'])->name('products_save');
    Route::get('products/delete/{product}', [ProductsController::class, 'delete'])->name('products_delete');
    Route::post('/buy-product/{product}', [ProductsController::class, 'buy'])->name('buy');
    Route::get('bought', [ProductsController::class, 'boughtProducts'])->name('bought');
});
Route::get('/', function () {
    return view('welcome');
});

Route::get('products', [ProductsController::class, 'list'])->name('products_list');
Route::get('/multable', function (Request $request) {
    $j = $request->number??5;
    $msg = $request->msg;
    return view('multable', compact("j", "msg"));
});

Route::get('/even', function () {
    return view('even');
});

Route::get('/prime', function () {
    return view('prime');
});

Route::get('/test', function () {
    return view('test');
});
