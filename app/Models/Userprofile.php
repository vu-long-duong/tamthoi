<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userprofile extends Model
{
    use HasFactory;
    protected $table='userprofiles';
    protected $fillable=['name','age','address','price'];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function payment()
    {
        return $this->hasMany(Payment::class);
    }
    
    public function discountcode()
    {
        return $this->hasMany(FilmSale::class);
    }
}

