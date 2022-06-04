<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SrtLink extends Model
{
    protected $fillable = [
        'user' ,'srt', 'link'
    ];
}
