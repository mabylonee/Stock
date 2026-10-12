<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class stock_in extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'fournisseur',
        'designation',
        'qte',
        'Num_facture'
       
    ];
}
