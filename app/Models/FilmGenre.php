<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmGenre extends Model
{
    use HasFactory;
    protected $table = 'film_genres';
    protected $fillable = ['namegenre', 'describe', 'status'];

    public function filmdetail()
    {
        return $this->hasMany(FilmDetail::class, 'genre_id', 'id');
    }


}
