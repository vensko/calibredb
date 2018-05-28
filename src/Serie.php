<?php

namespace Vensko\Calibre;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    public $timestamps = false;

    public function books()
    {
        return $this->belongsToMany(Book::class, 'books_series_link', 'series', 'book');
    }
}
