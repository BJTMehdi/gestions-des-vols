<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['vol_id', 'passager_id', 'num_siege'];

    public function vol()
    {
        return $this->belongsTo(Vol::class);
    }

    public function passager()
    {
        return $this->belongsTo(Passager::class);
    }
}
