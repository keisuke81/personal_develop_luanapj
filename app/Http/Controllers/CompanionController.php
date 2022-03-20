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
    public function search_cast()
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
}
