<?php

namespace Vensko\Calibre;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function book()
    {
        return $this->belongsTo(Book::class, 'book');
    }
}
