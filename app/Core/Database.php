<?php
declare(strict_types=1);

final class Database
{
    private static ?PDO $connection = null;

    public static function connection(): PDO
    {
        if (self::$connection === null) {
            self::$connection = require __DIR__ . '/../../config/database.php';
        }
        return self::$connection;
    }
}
