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
    public function IviteConfirm(ClientRequest $request)
    {
        $user = Auth::user();
        $user_id = Auth::id();


        $inputs = $request->all();
        //エリア名の表示//
        $area = Area::where('id', $request->area_id)->first();
        $area_name = $area->name;

        //レベル名の表示//
        $mens_level = Level::where('id', $request->mens_level_id)->first();
        $mens_level_name = $mens_level->name;

        $required_level = Level::where('id', $request->required_level_id)->first();
        $required_level_name = $required_level->name;

        return view('offer.invite_confirm', [
            'user_id' => $user_id,
            'inputs' => $inputs,
            'area_name' => $area_name,
            'mens_level_name' => $mens_level_name,
            'required_level_name' => $required_level_name

        ]);
    }
}
