<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Otp extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'phone',
        'code',
        'expire_at',
    ];

    protected $dates = [
        'expire_at',
    ];
}
