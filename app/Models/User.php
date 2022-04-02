<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
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

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'line_id'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function appeals()
    {
        return $this->hasMany(CastFollow::class, 'user_id');
    }

    //フォローボタンの切り替え//
    public function is_appealed_by_auth_user()
    {
        $companion_id = Auth::id();

        $followers = array();
        foreach ($this->appeals as $follow) {
            array_push($followers, $follow->companion_id);
        }

        if (in_array($companion_id, $followers)) {
            return true;
        } else {
            return false;
        }
    }
}
