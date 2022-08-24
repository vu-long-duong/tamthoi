<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluated extends Model
{
    use HasFactory;
    protected $table = 'evaluateds';
    protected $fillable = ['star'];
    
    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }

    public function films()
    {
        return $this->belongsTo(Film::class, 'film_id');
    }
}
