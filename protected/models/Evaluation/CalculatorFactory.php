<?php
class CalculatorFactory
{
    private static $cached = array();

    public static function create($type)
    {
        if (empty(self::$cached[$type])) {
            $type = ucfirst(str_replace('_', '', $type));
            $class = "{$type}Calculator";
            include("{$class}.php");
            self::$cached[$type] = new $class();
        }

        return self::$cached[$type];
    }
}