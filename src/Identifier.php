<?php

namespace Vensko\Calibre;

use Illuminate\Database\Eloquent\Model;

class Identifier extends Model
{
    public $timestamps = false;

    public function book()
    {
        return $this->belongsTo(Book::class, 'book');
    }
}
