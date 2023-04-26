<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Strain extends Model
{
    use HasFactory;

    public function meta() {
        return $this->belongsTo(Meta::class);
    }

    public function type() {
        return $this->belongsTo(Phenotype::class, 'phenotype_id');
    }

    public function cannabinoids() {
        return $this->hasMany(StrainCannabinoid::class);
    }

    public function terpenes() {
        return $this->hasMany(StrainTerpene::class);
    }

    public function effects() {
        return $this->hasMany(StrainEffect::class);
    }

    //
    public function cannabinoid($value = 0) {
        return $this->cannabinoids()->where('value', '>', $value)->orderBy('value', 'desc');
    }

    public function terpene($value = 0, $limit = 3) {
        return $this->terpenes()->where('score', '>', $value)->limit($limit)->orderBy('score', 'desc');
    }

    public function effect($value = 0) {
        return $this->effects()->where('score', '>', $value)->orderBy('score', 'desc');
    }

    //
    public function primaryCannabinoid() {
        return $this->hasOne(StrainCannabinoid::class)->orderBy('value', 'desc');
    }

    public function primaryTerpene() {
        return $this->hasOne(StrainTerpene::class)->orderBy('score', 'desc');
    }
}
