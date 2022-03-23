<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Companion;
use App\Models\Follow;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use phpDocumentor\Reflection\DocBlock\Tags\Author;

class CompanionController extends Controller
{
    //「キャストから誘う」のキャスト一覧表示//
    public function searchCast()
    {
        $items = Companion::get();
        $birthday = Companion::select('birthday');
        $today = date("Y-m-d");
        $user_id = Auth::id();

        return view('offer.search_cast')->with([
            'items' => $items,
            'user_id' => $user_id
        ]);
    }

    //年齢で絞る//
    public function searchCast_age(Request $request)
    {
        $min = $request->required_age_min;
        $max = $request->required_age_max;

        $items = Companion::wherebetween('age', [$min, $max])->get();

        $user_id = Auth::id();

        return view('offer.search_cast_age')->with([
            'items' => $items,
            'min' => $min,
            'max' => $max,
            'user_id' => $user_id
        ]);
    }

    //キャストのプロフィール
    public function getCastProfile(Companion $id)
    {
        $item = Companion::find($id)->last();
        $user_id = Auth::id();

        return view('offer.cast_profile')->with([
            'item' => $item,
            'user_id' => $user_id
        ]);
    }

    //お気に入り登録//
    public function getFollow($id)
    {
        $user_id = Auth::id();
        $param = [
            'member_id' => $user_id,
            'companion_id' => $id,
        ];

        Follow::create($param);

        return redirect()->back();
    }

    //お気に入り解除//
    public function noFollow($id)
    {
        $user_id = Auth::id();
        $follow = Follow::where('companion_id', $id)->where('member_id', $user_id)->first();
        $follow->delete();

        return redirect()->back();
    }

    //キャストマイページ
    public function CastGetMypage(){
        $companion_id = Auth::id();
        return view('cast.cast_mypage')->with([
            'companion_id' => $companion_id
        ]);
    }

    //キャストのプロフィール表示
    public function CastGetProfile($companion_id)
    {
        $companion_id = Auth::id();
        $profile = Companion::where('id', $companion_id)->first();

        return view('cast.cast_profile')->with([
            'profile' => $profile,
            'companion_id' => $companion_id
        ]);
    }

    //登録情報更新ページの表示
    public function CastProfileEdit($companion_id)
    {
        $companion_id = Auth::id();
        $profile = Companion::where('id', $companion_id)->first();

        return view('cast.cast_profile_edit')->with([
            'profile' => $profile,
            'companion_id' => $companion_id
        ]);
    }

    //プロフィール更新時のDB更新//
    public function CastProfileUpdate(Request $request)
    {
        $companion_id = $request->id;

        $param = [
            'id' => $request->id,
            'nickname' => $request->nickname,
            'email' => $request->email,
            'img_url' => $request->img_url,
            'score' => $request->score,
            'self_produce' => $request->self_produce,
            'message' => $request->message,
        ];


        Companion::where('id', $companion_id)->update($param);

        return redirect()->route('CastGetProfile', ['companion_id' => $companion_id]);
    }

}
