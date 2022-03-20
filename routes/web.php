<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//LINEログイン機能
Route::get('/login/line', 
[LoginController::class, 'redirectToProvider'])->name('linelogin');

Route::get('/login/line/callback',[LoginController::class,'handleProviderCallback']);

Route::get('/logout', [LoginController::class,'logout'])->name('logout');
//LINEログイン機能　終わり