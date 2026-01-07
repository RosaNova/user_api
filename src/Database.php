<?php
class Database {
    private static $pdo;
    public static function getConnect() {
            try {
                self::$pdo = new PDO(
                    "pgsql:host=dpg-d5eu6bh5pdvs73fpt0ng-a.render.com;port=5432;dbname=testdb123_0g96", 
                    "postgres222", 
                    "Us34WTS8rFs5G3P6zXFOxM5JLQkzYFX9",         
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]
                );    
            } catch (PDOException $e) {
                die("Database connection failed: " . $e->getMessage());
            }
        return self::$pdo;
    }
}

Database::getConnect();
