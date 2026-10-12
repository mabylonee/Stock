<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class lignebon extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'description',
        'qt',
        'prixUnit',
        'prixTotal',  
        'file',    
        'idBon'





        
    ];
}
