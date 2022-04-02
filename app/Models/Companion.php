<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Companion extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'id',
        'gender',
        'email',
        'password',
        'nickname',
        'birthday',
        'age',
        'img_url',
        'score',
        'self_produce',
        'message',
        'provider',
        'line_id'
    ];


    public function follows()
    {
        return $this->hasMany(Follow::class, 'companion_id');
    }

    //フォローボタンの切り替え//
    public function is_followed_by_auth_user()
    {
        $user_id = Auth::id();

        $followers = array();
        foreach ($this->follows as $follow) {
            array_push($followers, $follow->user_id);
        }

        if (in_array($user_id, $followers)) {
            return true;
        } else {
            return false;
        }
    }
}
