<?php

namespace core;

class Registry
{

    use TSingleton;

    private static array $properties = [];

    public function setProperty(string|int $key, string|int|array|null $value): void
    {
        self::$properties[$key] = $value;
    }

    public function getProperty($name)
    {
        return self::$properties[$name] ?? null;
    }

}