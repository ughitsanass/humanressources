<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    use HasFactory;


    protected $fillable = [
        'id',
        'id_recruteur' ,
        'id_entreprise' ,
        'type' ,
        'ville',
        'diplome_requis',
        'remuneration',
        'q1',
        'q2',
        'q3',
        'q4',
        'q5'
    ];
}
