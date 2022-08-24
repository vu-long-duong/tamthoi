<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmRank extends Model
{
    use HasFactory;
    protected $table = 'film_ranks';
    protected $fillable = ['vip'];

    public function filmdetail()
    {
        return $this->hasMany(FilmDetail::class);
    }
}
