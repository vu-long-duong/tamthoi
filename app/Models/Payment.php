<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table='payments';
    protected $fillable=['bank','cardnumber'];
    public function userprofile()
    {
        return $this->belongsTo(Userprofile::class);
    }
}
