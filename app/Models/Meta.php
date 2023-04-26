<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'no_index',
        'no_follow'
    ];

    public function post() {
        return $this->hasOne(Post::class);
    }

    public function category() {
        return $this->hasOne(Category::class);
    }

    public function cannabinoid() {
        return $this->hasOne(Cannabinoid::class);
    }

    public function phenotype() {
        return $this->hasOne(Phenotype::class);
    }

    public function effects() {
        return $this->hasOne(Effect::class);
    }

    public function terpene() {
        return $this->hasOne(Terpene::class);
    }

    public function strain() {
        return $this->hasOne(Strain::class);
    }
}
