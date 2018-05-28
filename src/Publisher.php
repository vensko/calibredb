<?php

namespace Vensko\Calibre;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    public $timestamps = false;

    public function books()
    {
        return $this->belongsToMany(Book::class, 'books_publishers_link', 'publisher', 'book');
    }
}
