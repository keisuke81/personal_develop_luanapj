<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\Companion\Auth\CompanionLoginController;//追加
use App\Http\Controllers\ChatController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanionController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\CastFollowController;
use App\Http\Controllers\PaymentController;

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

//LINEログイン機能 男
Route::get('/login/line',
[LoginController::class, 'redirectToProvider'])->name('linelogin');

Route::get('/login/line/callback',[LoginController::class,'handleProviderCallback'])->name('callback');

Route::get('/logout', [LoginController::class,'logout'])->name('logout');
//LINEログイン機能　男　終わり


//マイページの表示
Route::get(
    '/mypage',
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

//プロフィール画像の更新の実行
Route::post('/image_upload',
[UserController::class,'store']);

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
Route::get('/nofollow/{id}', [CompanionController::class, 'noFollow'])->name('noFollow');

//コンパニオンをお誘いする
Route::get(
    'invite_page/{id}',
    [OfferController::class, 'getInvitePage']
)->name('getInvitePage');

//インバイト確認ページの表示//
Route::get(
    '/invite_confirm/{id}',
    [OfferController::class, 'InviteConfirm']
)->name('InviteConfirm');

//インバイト確認ページの表示//
Route::post(
    '/invite_confirm/{id}',
    [OfferController::class, 'InviteConfirm'])->name('InviteConfirm');

//お誘い完了
Route::post(
    '/invite_done/{id}',
    [OfferController::class, 'InviteSuccess']
)->name('InviteSuccess');

//フォロー一覧表示
Route::get(
    '/follow_cast',
    [FollowController::class, 'getFollowing']
)->name('getFollowing');

//チャットの受け取りと送信//
Route::get('/chat/{recieve}', [
    ChatController::class, 'getChatPage'
])->name('chat');

//チャットの送信
Route::post('/chat/send',
    [ChatController::class, 'store']
)->name('chatSend');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//予約の確認
Route::get('/mypage/user_reserve_round',
[ReserveController::class,'GetUserReserve'])->name('GetUserReserve');

//予約の削除
Route::post('/reserve_delete/{id}',
[ReserveController::class, 'ReserveDelete'])->name('ReserveDelete');

//フォローされているページ表示
Route::get(
    '/followed',
    [CastFollowController::class, 'GetFollowed']
)->name('GetFollowed');

//相互フォロー一覧表示
Route::get(
    '/each_follow',
    [FollowController::class, 'EachFollow']
)->name('EachFollow');

//支払画面の表示
Route::get('/payment/form',
[PaymentController::class, 'getPaymentForm'])->name('getPaymentForm');

//カード情報の表示
Route::get('/payment', 
[PaymentController::class,'getCurrentPayment'])->name('getCurrentPayment');

//支払い情報の送信
Route::post('/payment/store',
[PaymentController::class,'storePayment'])->name('storePayment');

//登録しているカード情報の削除
Route::post('/payment/destroy',
[PaymentController::class, 'deletePayment'])->name('deletePayment');

/////////////////////////////////////////
//キャスト側のRoute

//女性　ログイン機能
Route::get(
    '/login/line/cast',
    [CompanionLoginController::class, 'cast_redirectToProvider']
)->name('companion.linelogin');

//コールバック
Route::get('/login/line/cast/callback', [CompanionLoginController::class, 'cast_handleProviderCallback'])->name('companion.callback');

//キャストのマイページ取得
Route::get(
    '/cast_mypage',
    [CompanionController::class, 'CastGetMypage']
)->name('CastGetMypage');

//キャスト：プロフィールの表示
Route::get(
    '/cast_mypage/profile/{companion_id}',
    [CompanionController::class, 'CastGetProfile']
)->name('CastGetProfile');

//キャスト：プロフィール更新ページの表示
Route::get(
    '/cast_mypage/profile/edit/{companion_id}',
    [CompanionController::class, 'CastProfileEdit']
)->name(('CastProfileEdit'));

//キャスト：プロフィール更新の実行
Route::post(
    '/cast_profile_update',
    [CompanionController::class, 'CastProfileUpdate']
)->name('CastProfileUpdate');

//誘い一覧を見る
Route::get('/invited',
[OfferController::class,'CastGetInvited'])->name('CastGetInvited');

//お誘いを受けるページ
Route::get('invited/{offer_id}/accept',
[OfferController::class,'GetAcceptPage'])->name('GetAcceptPage');

//お誘いを断るページ
Route::get('invited/{offer_id}/reject',
[OfferController::class,'GetRejectPage'])->name('GetRejectPage');

//お誘いを受ける（確定させる）
Route::post('/invited/{offer_id}/accept/done',
[ReserveController::class, 'AcceptDone'])->name('AcceptDone');

//お誘いを断る（確定させる）
Route::post('/invited/{offer_id}/reject/done',[OfferController::class,'PostReject'])->name('PostReject');

//今後のラウンド予定を確認する
Route::get('/cast_mypage/reserve_round',
[ReserveController::class,'GetCastReserve'])->name('GetCastReserve');

//相互フォロー一覧表示
Route::get(
    '/cast_chat',
    [CastFollowController::class, 'CastgetChats']
)->name('CastgetChats');

//チャットの受け取りと送信//
Route::get('/cast_chat/{recieve}', [
    ChatController::class, 'getCastChat'
])->name('getCastChat');

//チャットの送信
Route::post(
    '/cast_chat/send',
    [ChatController::class, 'store']
)->name('chatSend');

//男性ユーザー一覧表示
Route::get('/search_user',
[UserController::class,'SearchUser'])->name('SearchUser');

//男性ユーザー詳細ページ
Route::get('/search_user/{user_id}',
[UserController::class,'GetUser'])->name('GetUser');

//ユーザーのフォロー//
Route::get('/cast_follow/{id}', [UserController::class, 'CastgetFollow'])->name('CastgetFollow');

//ユーザーのフォロー解除//
Route::get('/cast_noffollow/{id}', [UserController::class, 'CastnoFollow'])->name('CastnoFollow');

//フォローされているページ表示
Route::get('/cast_followed',
[FollowController::class,'CastGetFollowed'])->name('CastGetFollowed');

//予約の削除
Route::post('/cast/reserve_delete/{id}',
[ReserveController::class, 'CastReserveDelete'])->name('CastReserveDelete');