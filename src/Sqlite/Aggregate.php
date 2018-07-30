<?php

namespace Vensko\Calibre\Sqlite;

use PDO, ReflectionMethod;

class Aggregate
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
        $pdo->sqliteCreateAggregate($name, $callable, $callable);
    }

    public static function sortconcat($context, int $rownumber, ...$values)
    {
        if ($values) {
            if ($context) {
                $context[] = $values[1];
                return $context;
            } else {
                return [$values[1]];
            }
        } else {
            return implode(' & ', $context);
        }
    }

    public static function concat($context, int $rownumber, ...$values)
    {
        if ($values) {
            if ($context) {
                return $context.', '.reset($values);
            }
            return reset($values);
        } else {
            return $context;
        }
    }
}
