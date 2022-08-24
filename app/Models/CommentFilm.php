<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentFilm extends Model
{
    use HasFactory;
    protected $table='comment_films';
    protected $fillable=['content'];
}
