<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Offer;
use App\Models\Area;
use App\Models\Level;
use App\Models\User;

class OfferController extends Controller
{
    //「キャストから」or「日程から」のページ
    public function search_top(){
        $user_id = Auth::id();

        return view('offer.search_top')->with([
            'user_id' => $user_id
        ]);
    }
    //「キャストをお誘いする」ページの表示
    public function getInvitePage($id)
    {
        $user_id = Auth::id();
        $companion_id = $id;

        return view('offer.invite')->with([
            'user_id' => $user_id,
            'companion_id' => $companion_id
        ]);
    }

    //確認ページに進む//
    public function InviteConfirm(Request $request, $id)
    {
        $user_id = Auth::id();
        $companion_id = $id;

        $inputs = $request->all();

        return view('offer.invite_confirm', [
            'user_id' => $user_id,
            'companion_id' => $companion_id,
            'inputs' => $inputs,

        ]);
    }

    public function InviteSuccess(Request $request, $id)
    {
        $user = Auth::user();
        $user_id = Auth::id();
        $companion_id = $id;

        if ($request->get('back')) {
            return redirect()->route('getInvitePage',['id' => $id])->withInput();
        }else{

            $param = [
                'user_id' => $user_id,
                'companion_id' => $companion_id,
                'golf_course' => $request->golf_course,
                'date' => $request->date,
                'start_at' => $request->start_at,
                'num_of_players_men' => $request->num_of_players_men,
                'num_of_players_women' => $request->num_of_players_women,
            ];

            Offer::create($param);

            return view('offer.invite_done')->with([
                'user_id' => $user_id
            ]);
        }  
    }

    //////////////////////////////////////////
    //キャスト：誘い一覧を見る
    //フォローしているキャスト一覧の表示//
    public function CastGetInvited()
    {
        $companion_id = Auth::id();
        $invites = Offer::where('companion_id', $companion_id)->where('reserved',null)->get();
        foreach ($invites as $invite) {

            $user = User::where('id', $invite->user_id)->first();
            $invite->user_name = $user->nickname;
            $invite->image = $user->img_url;
        }

        // チャットユーザ選択画面を表示
        return view('cast.invited')->with([
            'invites' => $invites
        ]);
    }

    //誘いを受けるページ
    public function GetAcceptPage($offer_id){
        $invite = Offer::where('id', $offer_id)->first();
        $user = User::where('id', $invite->user_id)->first();
        $invite->user_name = $user->nickname;
        $invite->image = $user->img_url;

        return view('cast.accept_page')->with([
            'invite' => $invite,
            'offer_id' => $offer_id
        ]);
    }    

    //誘いを断るページ    
    public function GetRejectPage($offer_id)
    {
        $invite = Offer::where('id', $offer_id)->first();
        $user = User::where('id', $invite->user_id)->first();
        $invite->user_name = $user->nickname;
        $invite->image = $user->img_url;

        return view('cast.reject_page')->with([
            'invite' => $invite,
            'offer_id' => $offer_id
        ]);
    }

    //お誘いを断る（確定させる）
    public function PostReject($offer_id){

        Offer::where('id',$offer_id)->delete();

        $companion_id = Auth::id();
        $invites = Offer::where('companion_id', $companion_id)->where('reserved',null)->get();
        foreach ($invites as $invite) {

            $user = User::where('id', $invite->user_id)->first();
            $invite->user_name = $user->nickname;
            $invite->image = $user->img_url;
        }

        return redirect()->route('CastGetInvited',['invites'=>$invites]);
    }
}
