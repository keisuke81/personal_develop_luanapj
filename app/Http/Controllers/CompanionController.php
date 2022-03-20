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

        return redirect()->action('CompanionController@getDetail', ['id' => $id]);
    }

    //お気に入り解除//
    public function noFollow($id)
    {
        $user_id = Auth::id();
        $follow = Follow::where('companion_id', $id)->where('member_id', $user_id)->first();
        dd($follow);
        $follow->delete();

        return redirect()->back();
    }
}
