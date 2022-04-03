<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Companion;
use App\Models\Follow;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    //フォローしているキャスト一覧の表示//
    public function getFollowing()
    {
        $user_id = Auth::id();
        $users = Follow::where('user_id', $user_id)->get();
        foreach ($users as $user) {
            $companion = Companion::where('id', $user->companion_id)->first();
            $user->nickname = $companion->nickname;
        }

        // チャットユーザ選択画面を表示
        return view('offer.following')->with([
            'users' => $users,
            'user_id' => $user_id
        ]);
    }

    //////////////////////////////////
    //キャスト

    //Likeされているユーザー一覧表示
    public function CastGetFollowed(){
        $companion_id = Auth::id();
        $items = Follow::where('companion_id', $companion_id)->get();
        foreach($items as $item){
            $user = User::where('id', $item->user_id)->first();
            $item->nickname = $user->nickname;
            $item->id = $user->id;
        }

        return view('cast.cast_followed')->with([
            'items' => $items,
            'companion_id' => $companion_id,
            'user' => $user
        ]);
    }
}
