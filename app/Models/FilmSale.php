<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmSale extends Model
{
    use HasFactory;
    protected $table='film_sales';
    protected $fillable=['discountcode','exist','price'];

    public function filmdetail()
    {
        return $this->hasMany(FilmDetail::class);    
    }

    public function userprofile()
    {
        return $this->belongsTo(Userprofile::class,'userprofile_id');    
    }
    

}
