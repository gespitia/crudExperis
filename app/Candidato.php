<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    protected $fillable = [
        'name',
        'surname',
        'email',
        'phone',
        'date_of_interview',
        'rating',
    ];
}
