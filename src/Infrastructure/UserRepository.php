<?php

namespace Infrastructure;

use Domain\User;
use PDO;

class UserRepository {
    private PDO $db;
    
    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function getById(string $id): ?User {
      $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id");
      $stmt->execute(['id' => $id]);
      
      $user = $stmt->fetch(PDO::FETCH_ASSOC);
      
      if (!$user) {
          die(json_encode(["error" => "User not found in database", "query" => "SELECT * FROM users WHERE id = $id"]));
      }
  
      return new User($user['id'], $user['name'], $user['email']);
  }
}
