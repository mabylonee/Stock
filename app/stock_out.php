<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class stock_out extends Model
{
    use HasFactory;
    protected $fillable = [
        'agence',
        'dep',
        'mat_user',
        'designation',
        'qt',
        'num_bs'
    ];
}
