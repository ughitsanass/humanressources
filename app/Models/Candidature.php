<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_candidat' ,
        'id_offre' ,
        'statut',
        'id_recruteur',
        'r1',
        'r2',
        'r3',
        'r4',
        'r5'
    ];


}
