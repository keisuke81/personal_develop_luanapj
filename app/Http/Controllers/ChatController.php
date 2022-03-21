<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SampleNotification;
use App\Events\ChatMessageRecieved;
use App\Models\Chat;
use App\Models\Follow;
use App\Models\Companion;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ChatController extends Controller
{
    //チャットルームの表示
    public function getChatPage($recieve)
    {
        // チャットの画面
        $loginId = Auth::id();
        $user_id = Auth::id();

        $param = [
            'send' => $loginId,
            'recieve' => $recieve,
        ];

        // 送信 / 受信のメッセージを取得する
        $query = Chat::where('send', $loginId)->where('recieve', $recieve);

        $query->orWhere(function ($query) use ($loginId, $recieve) {
            $query->where('send', $recieve);
            $query->where('recieve', $loginId);
        });

        $messages = $query->get();

        return view('chat.chat')->with([
            'param' => $param,
            'messages' => $messages,
            'user_id' => $user_id
        ]);
    }

    /**
     * メッセージの保存をする
     */
    public function store(Request $request)
    {

        // リクエストパラメータ取得
        $insertParam = [
            'send' => $request->send,
            'recieve' => $request->recieve,
            'message' => $request->message
        ];
        
        Chat::insert($insertParam);

        return redirect()->back();
    }
}