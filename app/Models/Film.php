<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    protected $table = 'films';
    protected $fillable = ['name', 'imagefilm', 'episodenumber', 'videofilm'];

    public function filmdetail()
    {
        return $this->hasOne(FilmDetail::class);
    }

    public function evaluate()
    {
        return $this->hasMany(Evaluated::class);
    }
    
    public function scopeAccoutRate($query,$id)
    {
        return $query->select('account_id')->where('film_id', $id)->distinct();
    }
}
