<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phenotype extends Model
{
    use HasFactory;

    public function strains() {
        return $this->hasMany(Strain::class);
    }

    public function meta() {
        return $this->belongsTo(Meta::class);
    }
}
