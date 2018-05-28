<?php

namespace Vensko\Calibre;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    const CREATED_AT = 'timestamp';
    const UPDATED_AT = 'last_modified';

    protected $dates = [
        'pubdate',
    ];

    protected $dateFormat = 'Y-m-d H:i:s.uP';

    protected $casts = [
        'has_cover' => 'boolean',
    ];

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'books_authors_link', 'book', 'author');
    }

    public function languages()
    {
        return $this->belongsToMany(Language::class, 'books_languages_link', 'book', 'lang_code');
    }

    public function publishers()
    {
        return $this->belongsToMany(Language::class, 'books_publishers_link', 'book', 'publisher');
    }

    public function ratings()
    {
        return $this->belongsToMany(Rating::class, 'books_ratings_link', 'book', 'rating');
    }

    public function series()
    {
        return $this->belongsToMany(Serie::class, 'books_series_link', 'book', 'series');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'books_tags_link', 'book', 'tag');
    }

    public function files()
    {
        return $this->hasMany(File::class, 'book');
    }

    public function comment()
    {
        return $this->hasOne(Comment::class, 'book');
    }
}
