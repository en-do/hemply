<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrainTerpene extends Model
{
    use HasFactory;

    public function strain() {
        return $this->belongsTo(Strain::class);
    }

    public function terpene() {
        return $this->belongsTo(Terpene::class);
    }
}
