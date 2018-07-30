<?php

namespace Vensko\Calibre;

use Illuminate\Database\Eloquent\Model;

class Column extends Model
{
    protected $table = 'custom_columns';

    protected $casts = [
        'display' => 'array',
        'mark_for_delete' => 'boolean',
        'editable' => 'boolean',
        'is_multiple' => 'boolean',
        'normalized' => 'boolean',
    ];

    /**
     * @return string
     */
    public function getTableName(): string
    {
        return 'custom_column_'.$this->getKey();
    }
}
