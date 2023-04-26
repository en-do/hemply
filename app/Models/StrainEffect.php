<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrainEffect extends Model
{
    use HasFactory;

    public function strain() {
        return $this->belongsTo(Strain::class);
    }

    public function effect() {
        return $this->belongsTo(Effect::class);
    }
}
