<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\Follow;
use App\Models\CastFollow;
use App\Models\Companion;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CastFollowController extends Controller
{
    //チャット一覧の表示//
    public function CastgetChats()
    {
        $companion_id = Auth::id();
        $followers = Follow::where('companion_id', $companion_id)->pick('user_id')->toArray();
        dd($followers);

        $follows = CastFollow::where('companion_id',$companion_id)->pick('user_id')->toArray();




        // チャットユーザ選択画面を表示
        return view('cast.')->with([
            'follows' => $follows,
            'companion_id' => $companion_id
        ]);
    }
}
