<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class boncommande extends Model
{
    //
    use HasFactory;
    protected $table = 'boncommandes';

    protected $fillable = [
        'code',
        'tva',
        'sousTotal',
        'totalGeneral',
        'totalLettre',
        'destinataire',
        'autorisation',
        'file'

        



        
    ];
}
