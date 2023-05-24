<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;

class Movie extends Model
{
    use HasFactory;
    use HasEagerLimit;

    public $timestamps = false;
    protected $fillable = [
        'name',
        'description',
        'short_description',
        'genre_id',
        'country_id',
        'imdb',
        'privilege',
        'icon',
        'is_serial',
        'season',
        'banner',
    ];

    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }

    public function movieItems()
    {
        return $this->hasMany(MovieItem::class);
    }


}
