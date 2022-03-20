<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanionController;

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
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//LINEログイン機能
Route::get('/login/line', 
[LoginController::class, 'redirectToProvider'])->name('linelogin');

Route::get('/login/line/callback',[LoginController::class,'handleProviderCallback']);

Route::get('/logout', [LoginController::class,'logout'])->name('logout');
//LINEログイン機能　終わり


//マイページの表示
Route::get(
    '/mypage/{user_id}',
    [UserController::class, 'getMypage']
)->name('getMypage');

//プロフィールの表示//
Route::get(
    '/mypage/profile/{user_id}',
    [UserController::class, 'getProfile']
)->name('getProfile');

//プロフィール更新ページの表示//
Route::get(
    '/mypage/profile/edit/{user_id}',
    [UserController::class, 'profile_edit']
)->name(('profile_edit'));

//プロフィール更新の実行
Route::post(
    '/profile_update',
    [UserController::class, 'profile_update']
);

//探す
Route::get('/search',
[OfferController::class,'search_top'])->name('search_top');

//キャストから探す//
Route::get(
    '/search_cast',
    [CompanionController::class, 'searchCast']
)->name('searchCast');

//キャストから探す＿年齢で絞る//
Route::get(
    '/search_cast_age',
    [CompanionController::class, 'searchCast_age']
);
//キャストの個人プロフィール
Route::get(
    'cast_profile/{id}',
    [CompanionController::class, 'getCastProfile']
)->name('getCastProfile');

//キャストのフォロー//
Route::get('/follow/{id}', [CompanionController::class, 'getFollow'])->name('getFollow');

//フォロー解除//
Route::get('/noffollow/{id}', [CompanionController::class, 'noFollow'])->name('noFollow');

//コンパニオンをお誘いする
Route::get(
    'invite_page/{id}',
    [OfferController::class, 'getInvitePage']
)->name('getInvitePage');

//インバイト確認ページの表示//
Route::post(
    '/invite_confirm/{id}',
    [OfferController::class, 'InviteConfirm']
);

//インバイト完了
Route::post(
    '/invite_done/{id}',
    [OfferController::class, 'InviteSuccess']
)->name('InviteSuccess');