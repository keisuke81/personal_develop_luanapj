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

            $companion = Companion::where('id', $item->companion_id)->first();
            $item->companion_name = $companion->nickname;
            $item->image = $companion->img_url;
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

            $companion = Companion::where('id', $item->companion_id)->first();
            $item->companion_name = $companion->nickname;
            $item->image = $companion->img_url;
        }

        return view('user.user_reserve')->with([
            'reserves' => $reserves,
        ]);

    }
}


