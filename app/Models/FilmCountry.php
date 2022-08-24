<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmCountry extends Model
{
    use HasFactory;
    protected $table='film_countries';
    protected $fillable=['namecountrie','describe','status'];
    
    public function filmdetail()
    {
        return $this->hasMany(FilmDetail::class,'countrie_id','id');   
    }
    public function scopeOrderCountrie($query)
    {
        return $query->orderBy('id', 'DESC');
    }

}
