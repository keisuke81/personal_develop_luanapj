<?php

namespace App\Http\Controllers;

use App\Models\Reserve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Offer;
use App\Models\Area;
use App\Models\Level;
use App\Models\User;

class ReserveController extends Controller
{
    public function AcceptDone(Request $request){
        $offer_id = $request->offer_id;

        $param=[
            'offer_id'=>$offer_id
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

            $area = Area::where('id', $invite->area_id)->first();
            $invite->area_name = $area->name;
        }

        return redirect()->route('CastGetInvited');
    }

    //キャスト：今後のラウンド予定を確認する
    public function GetCastReserve(){
        $companion_id = Auth::id();
        $reserves = Reserve::get();
        
        foreach($reserves as $reserve){
           $item = Offer::where('id', $reserve->offer_id)->first();
            $invites = Offer::where('companion_id', $companion_id)->where('reserved', null)->get();
            foreach ($invites as $invite) {

                $user = User::where('id', $invite->user_id)->first();
                $invite->user_name = $user->nickname;
                $invite->image = $user->img_url;

                $area = Area::where('id', $invite->area_id)->first();
                $invite->area_name = $area->name;
            }


        }
        
    }
}
