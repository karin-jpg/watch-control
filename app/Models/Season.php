<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;

    public function series()
    {
        $this->belongsTo(Series::class);
    }

    public function episodes()
    {
        $this->hasMany(Episode::class);
    }
}