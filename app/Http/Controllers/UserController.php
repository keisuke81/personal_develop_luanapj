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
}
