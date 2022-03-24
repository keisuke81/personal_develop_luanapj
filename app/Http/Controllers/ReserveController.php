<?php

namespace App\Http\Controllers;

use App\Models\Reserve;
use Illuminate\Http\Request;

class ReserveController extends Controller
{
    public function AcceptDone(Request $request){

        $param =[
            'offer_id' => $request->offer_id
        ];

        Reserve::create($param);

        return redirect()->route('CastGetInvited');
    }
}
