<?php

namespace Vensko\Calibre;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public $timestamps = false;

    public function books()
    {
        return $this->belongsToMany(Book::class, 'books_ratings_link', 'rating', 'book');
    }
}
