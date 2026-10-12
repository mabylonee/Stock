<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class email extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject',
        'email',
        'content'
    ];
}
