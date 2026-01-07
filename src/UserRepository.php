<?php

require_once 'Database.php';
class UserRepository {
    public function getAll() {
        return Database::getConnect()
            ->query("SELECT * FROM users")
            ->fetchAll();
    }

    public function create($fullname, $email , $password) {
        $stmt = Database::getConnect()
            ->prepare("INSERT INTO users (id , fullname, email , password) VALUES (?, ?, ?)");
        return $stmt->execute([$fullname, $email , $password]);
    }

   public function update($id, $fullname, $email, $password) {
    $stmt = Database::getConnect()->prepare(
        "UPDATE users 
         SET fullname = ?, email = ?, password = ? 
         WHERE id = ?"
    );

    return $stmt->execute([$fullname, $email, $password, $id]);
}

  public function delete($id) {
        $stmt = Database::getConnect()
        ->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$id]);
    }
}