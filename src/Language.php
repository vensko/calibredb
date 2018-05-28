<?php

namespace Vensko\Calibre;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public $timestamps = false;

    public function books()
    {
        return $this->belongsToMany(Book::class, 'books_languages_link', 'lang_code', 'book');
    }
}
