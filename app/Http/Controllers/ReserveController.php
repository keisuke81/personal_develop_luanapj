<?php

namespace App\Http\Controllers;

use App\Models\Reserve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Offer;
use App\Models\Area;
use App\Models\Companion;
use App\Models\Level;
use App\Models\User;

class ReserveController extends Controller
{
    public function AcceptDone(Request $request){
        $offer_id = $request->offer_id;
        $companion_id = Auth::id();

        $param=[
            'offer_id'=>$offer_id,
            'user_id' => $request->user_id,
            'companion_id' => $companion_id

        ];

        Reserve::insert($param);

        $item = Offer::where('id', $offer_id)->first();
        $item ->reserved =1;
        $item->save();


        $companion_id = Auth::id();
        $invites = Offer::where('companion_id', $companion_id)->where('reserved',null)->get();
        foreach ($invites as $invite) {

            $user = User::where('id', $invite->user_id)->first();
            $invite->user_name = $user->nickname;
            $invite->image = $user->img_url;
        }

        return redirect()->route('CastGetInvited');
    }

    //キャスト：今後のラウンド予定を確認する
    public function GetCastReserve(){
        $companion_id = Auth::id();
        $reserves = Reserve::where('companion_id',$companion_id)->get();

        foreach($reserves as $reserve){
            $item = Offer::where('id',$reserve->offer_id)->first();

            $user = User::where('id', $item->user_id)->first();
            $item->user_name = $user->nickname;
            $item->image = $user->img_url;
        }

        return view('cast.cast_reserve')->with([
            'reserves' => $reserves,
            'item' => $item
        ]);
    }

    //ユーザー：今後のラウンド予定を確認する
    public function GetUserReserve()
    {
        $user_id = Auth::id();
        $reserves = Reserve::where('user_id', $user_id)->get();

        foreach ($reserves as $reserve) {
            $item = Offer::where('id', $reserve->offer_id)->first();
            $reserve->start_at = $item->start_at;
            $reserve->num_of_players_men = $item->num_of_players_men;
            $reserve->golf_course = $item->golf_course;

            $companion = Companion::where('id', $reserve->companion_id)->first();
            $reserve->companion_name = $companion->nickname;
            $reserve->image = $companion->img_url;
        }

        return view('user.user_reserve')->with([
            'reserves' => $reserves,
        ]);
    }

    //予約の削除
    public function ReserveDelete($id){
        $user_id = Auth::id();
        Reserve::where('id', $id)->delete();

        $reserves = Reserve::where('user_id', $user_id)->get();

        foreach ($reserves as $reserve) {
            $item = Offer::where('id', $reserve->offer_id)->first();
            $reserve->start_at = $item->start_at;
            $reserve->num_of_players_men = $item->num_of_players_men;
            $reserve->golf_course = $item->golf_course;

            $companion = Companion::where('id', $reserve->companion_id)->first();
            $reserve->companion_name = $companion->nickname;
            $reserve->image = $companion->img_url;
        }

        return view('user.user_reserve')->with([
            'reserves' => $reserves,
        ]);

    }
}


