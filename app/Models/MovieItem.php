<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieItem extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'movie_id',
        'name',
        'description',
        'payment_type',
        'url',
        'triler',
        'banner',
    ];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


}
