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
        $followers = Follow::where('companion_id', $companion_id)->get('user_id')->toArray();

        $follows = CastFollow::where('companion_id',$companion_id)->get('user_id')->toArray();

        $each_follows = array_intersect($followers, $follows);
        foreach($each_follows as $each_follow){
            $user = User::where('id',$each_follow->user_id);
            $each_follow->nickname = $user->nickname;
        }




        // チャットユーザ選択画面を表示
        return view('cast.cast_each_follow')->with([
            'each_follows' => $each_follows
        ]);
    }
}
