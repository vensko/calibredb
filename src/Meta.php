<?php

namespace Vensko\Calibre;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    protected $table = 'meta';

    protected $casts = [
        'timestamp' => 'datetime:Y-m-d H:i:sP',
        'pubdate' => 'datetime:Y-m-d H:i:s.uP',
    ];
}
