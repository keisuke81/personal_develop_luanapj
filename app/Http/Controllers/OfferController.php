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
}
