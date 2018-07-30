<?php

namespace Vensko\Calibre\Sqlite;

use Ramsey\Uuid\Uuid;
use PDO, ReflectionMethod;

class Functions
{
    /**
     * @param PDO $pdo
     * @return PDO
     */
    public static function attach(PDO $pdo): PDO
    {
        foreach (get_class_methods(__CLASS__) as $name) {
            if (in_array($name, [__FUNCTION__, 'attachFunction'], true)) {
                continue;
            }

            $callable = __CLASS__.'::'.$name;

            static::attachFunction($pdo, $name, $callable);
        }

        return $pdo;
    }

    /**
     * @param PDO $pdo
     * @param string $name
     * @param callable $callable
     */
    public static function attachFunction(PDO $pdo, string $name, $callable)
    {
        $argNum = (new ReflectionMethod($callable))->getNumberOfParameters();

        $pdo->sqliteCreateFunction($name, $callable, $argNum);
    }

    /**
     * @param string $title
     * @return string
     */
    public static function title_sort(string $title): string
    {
        if (!$title OR strpos($title, ' ') === false) {
            return $title;
        }

        $title = trim($title);
        $title = preg_replace('/\s+/', ' ', $title);

        $parts = explode(' ', $title);
        $lastName = array_pop($parts);

        $title = implode(' ', $parts);
        $title = implode(', ', array_filter([$lastName, $title]));

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
