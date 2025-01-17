<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Vol extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'ville_depart', 'ville_arrivee', 'pilote', 'avion'];
}
