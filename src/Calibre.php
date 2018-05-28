<?php

namespace Vensko\Calibre;

use Illuminate\Database\Eloquent\Model;

class Calibre
{
    protected $connection;

    /**
     * Calibre constructor.
     * @param string $connection
     */
    public function __construct(string $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param string $dbFile
     * @return self
     */
    public static function connect(string $dbFile): self
    {
        $key = md5($dbFile);

        config([
            'database.connections.'.$key => [
                'driver' => 'sqlite',
                'database' => $dbFile,
            ],
        ]);

        $db = app('db');

        $db->setDefaultConnection($key);

        SqliteFunctions::attach($db->connection($key)->getPdo());

        return new static($key);
    }

    /**
     * @param $name
     * @param $arguments
     * @return Model
     */
    public function __call($name, $arguments): Model
    {
        $class = __NAMESPACE__.'\\'.ucfirst($name);

        return new $class();
    }
}
