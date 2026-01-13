<?php
class Database {
    private static $pdo;
    public static function getConnect() {
            try {
                self::$pdo = new PDO(
                    "pgsql:host=ep-lively-art-a1dka5rc-pooler.ap-southeast-1.aws.neon.tech;port=5432;dbname=neondb", 
                    "neondb_owner", 
                    "npg_t4mxFrl2gCuW",         
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

