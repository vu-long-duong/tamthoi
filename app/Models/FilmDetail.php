<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class FilmDetail extends Model
{
    use HasFactory;

    protected $table = 'film_details';
    protected $fillable = ['summary', 'tags'];

    public function account()
    {
        return $this->belongsTo('App\Models\Film');
    }

    public function filmsale()
    {
        return $this->belongsTo(FilmSale::class, 'sale_id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id');
    }

    public function filmcategory()
    {
        return $this->belongsTo(FilmCategory::class, 'category_id', 'id');
    }

    public function filmgenre()
    {
        return $this->belongsTo(FilmGenre::class, 'genre_id', 'id');
    }

    public function filmcountrie()
    {
        return $this->belongsTo(FilmCountry::class, 'countrie_id','id');
    }

    public function filmyear()
    {
        return $this->belongsTo(FilmYear::class, 'year_id', 'id');
    }

    public function films()
    {
        return $this->belongsTo(Film::class, 'film_id');
    }
}
