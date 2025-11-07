<?php
namespace App\Http\Repositories;

use App\Models\User;
use PDO;

class UserRepository
{
    private PDO $pdo;
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function findById(): ?User
    {
        $sql = 'SELECT * FROM member WHERE id = 1';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return new User($user['id'], $user['name'], $user['age']);
    }
}