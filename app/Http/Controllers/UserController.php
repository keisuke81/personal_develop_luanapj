<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ClientRequest;

class UserController extends Controller
{
    //マイページの表示//
    public function getMypage($user_id)
    {
        $user_id = Auth::id();

        return view('user.mypage')->with(['user_id' => $user_id]);
    }

    //プロフィール表示
    public function getProfile($user_id)
    {
        $user_id = Auth::id();
        $profile = User::where('id', $user_id)->first();

        return view('user.profile')->with([
            'profile' => $profile,
            'user_id' => $user_id
        ]);
    }

    //登録情報更新ページの表示//
    public function profile_edit($user_id)
    {
        $user_id = Auth::id();
        $profile = User::where('id', $user_id)->first();

        return view('user.profile_edit')->with([
            'profile' => $profile,
            'user_id' => $user_id
        ]);
    }

    //プロフィール更新時のDB更新//
    public function profile_update(Request $request)
    {
        $user_id = $request->id;

        $param = [
            'id' => $request->id,
            'nickname' => $request->nickname,
            'email' => $request->email,
            'birthday' => $request->birthday,
            'score' => $request->score,
            'self_produce' => $request->self_produce,
            'message' => $request->message,
        ];

        User::where('id', $user_id)->update($param);


        return redirect()->route('getProfile',['user_id' => $user_id]);
    }

    public function store(Request $request){
        
        $img = $request->img_url->store();
        dd($img);

        $user_id = Auth::id();
        $user = User::where('id',$user_id);
        $user->update(['img_url' => $img]);

        return redirect()->route('getProfile', ['user_id' => $user_id]);
    }
}
