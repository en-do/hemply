<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrainCannabinoid extends Model
{
    use HasFactory;

    public function strain() {
        return $this->belongsTo(Strain::class);
    }

    public function cannabinoid() {
        return $this->belongsTo(Cannabinoid::class);
    }
}
