<?php

namespace Vensko\Calibre;

use Ramsey\Uuid\Uuid;
use PDO, ReflectionMethod;

class SqliteFunctions
{
    /**
     * @param PDO $pdo
     * @return PDO
     */
    public static function attach(PDO $pdo): PDO
    {
        foreach (get_class_methods(__CLASS__) as $method) {
            if ($method === __FUNCTION__) {
                continue;
            }

            $callable = __CLASS__.'::'.$method;
            $argNum = (new ReflectionMethod($callable))->getNumberOfParameters();

            $pdo->sqliteCreateFunction($method, $callable, $argNum);
        }

        return $pdo;
    }

    /**
     * @param string $title
     * @return string
     */
    public static function title_sort(string $title): string
    {
        return $title;
    }

    /**
     * @return string
     */
    public static function uuid4(): string
    {
        return Uuid::uuid4()->toString();
    }
}
