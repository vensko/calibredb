<?php

namespace Vensko\Calibre;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public $timestamps = false;

    public function books()
    {
        return $this->belongsToMany(Book::class, 'books_authors_link', 'author', 'book');
    }
}
