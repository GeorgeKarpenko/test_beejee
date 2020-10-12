<?php

namespace App\Models;


class User extends Model
{
    public function my($data) {
        $query = "SELECT * FROM users where `login` = '{$data['login']}' AND `password` = '{$data['password']}'";
        $user = $this->pdo->query($query);
        try {
            $user = $user->fetch(\PDO::FETCH_ASSOC);
            return $user;
        } catch (\PDOException $e) {
            echo "Ошибка выполнения запроса: " . $e->getMessage();
            return false;
        }
    }

}
