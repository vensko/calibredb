<?php

namespace Vensko\Calibre;

use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    public $timestamps = false;

    protected $casts = [
        'val' => 'array',
    ];

    /**
     * @param string $name
     * @return mixed
     */
    public static function getValue(string $name)
    {
        return static::where('key', $name)->value('val');
    }

    /**
     * @param string $name
     * @param $value
     */
    public static function setValue(string $name, $value)
    {
        static::where('key', $name)->update([
            'val' => $value,
        ]);
    }
}
