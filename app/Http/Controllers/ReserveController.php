<?php

namespace App\Http\Controllers;

use App\Models\Reserve;
use Illuminate\Http\Request;

class ReserveController extends Controller
{
    public function AcceptDone(Request $request){

        $param =[
            'user_id' => $request->user_id,
            'companion_id' => $request->companion_id,
            'date' => $request->date,
            'start_at' => $request->start_at,
            'num_of_players' => $request->num_of_players,
            'mens_level_id' => $request->mens_level_id,
            'golf_course' => $request->golf_course
        ];

        Reserve::create($param);

        return redirect()->route('CastGetInvited');
    }
}
