<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmYear extends Model
{
    use HasFactory;
    protected $table='film_years';
    protected $fillable=['year','status'];

    public function filmdetail()
    {
        return $this->hasMany(FilmDetail::class,'year_id','id');
    }
}
