<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Follow extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'companion_id'
    ];

    public function companion()
    {
        return $this->belongsTo(Companion::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
