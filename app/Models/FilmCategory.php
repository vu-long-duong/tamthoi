<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmCategory extends Model
{
    use HasFactory;
    protected $table='film_categories';
    protected $fillable=['namecategory','describe','status'];

    public function filmdetail()
    {
        return $this->hasMany(FilmDetail::class,'category_id','id');
    }

}
