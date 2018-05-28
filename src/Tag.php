<?php

namespace Vensko\Calibre;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $timestamps = false;

    public function books()
    {
        return $this->belongsToMany(Book::class, 'books_tags_link', 'tag', 'book');
    }
}
