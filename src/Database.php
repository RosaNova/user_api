<?php
class Database {
    private static $pdo;
    public static function getConnect() {
            try {
                self::$pdo = new PDO(
                    "pgsql:host=ep-quiet-shadow-a15z075v-pooler.ap-southeast-1.aws.neon.tech;dbname=neondb", 
                    "neondb_owner", 
                    "npg_dTujtB6IxYb4",         
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
