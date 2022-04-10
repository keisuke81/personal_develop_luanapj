<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Follow;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ClientRequest;
use App\Models\CastFollow;

class UserController extends Controller
{
    //マイページの表示//
    public function getMypage()
    {
        $user_id = Auth::id();

        return view('user.mypage')->with(['user_id' => $user_id]);
    }

    //プロフィール表示
    public function getProfile($user_id)
    {
        $user_id = Auth::id();
        $profile = User::where('id', $user_id)->first();

        return view('user.mypage')->with([
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
        
        $originalImg = $request->img_url;

        $filePath = $originalImg->store('public');
        $img = str_replace('public/','',$filePath);

        $user_id = Auth::id();
        $user = User::where('id',$user_id);
        $user->update(['img_url' => $img]);

        return redirect()->route('getProfile', ['user_id' => $user_id]);
    }

    /////////////////////////////
    //キャスト
    //「男性を誘う」のキャスト一覧表示//
    public function SearchUser()
    {
        $items = User::get();
        
        $companion_id = Auth::id();

        return view('cast.search_user')->with([
            'items' => $items
        ]);
    }

    //男性のプロフィール
    public function GetUser($user_id)
    {
        $item = User::where('id', $user_id)->first();

        return view('cast.user_profile')->with([
            'item' => $item,
        ]);
    }

    //お気に入り登録//
    public function CastgetFollow($id)
    {
        $companion_id = Auth::id();
        $param = [
            'companion_id' => $companion_id,
            'user_id' => $id,
        ];

        CastFollow::create($param);

        return redirect()->back();
    }

    //お気に入り解除//
    public function CastnoFollow($id)
    {
        $companion_id = Auth::id();
        $follow = CastFollow::where('user_id', $id)->where('companion_id', $companion_id)->first();
        $follow->delete();

        return redirect()->back();
    }
}
