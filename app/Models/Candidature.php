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
        'q1',
        'q2',
        'q3',
        'q4',
        'q5'
    ];


}
