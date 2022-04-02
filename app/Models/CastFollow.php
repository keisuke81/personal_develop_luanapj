<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CastFollow extends Model
{
    use HasFactory;
    protected $table = 'castfollows';

    protected $fillable = [
        'user_id',
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
