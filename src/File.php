<?php

namespace Vensko\Calibre;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'data';

    protected $casts = [
        'uncompressed_size' => 'integer',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book');
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return implode(DIRECTORY_SEPARATOR, [
            $this->book->path,
            $this->name.'.'.strtolower($this->format),
        ]);
    }
}
