<?php

namespace App\Models;

use App\Models\Model;

class Task extends Model
{

    public function tasks($col, $per_page, $column = 'id', $sort = 'ASC') {
        $col = ($col - 1) * $per_page;
        $query = "SELECT * FROM tasks ORDER BY $column $sort limit $col, $per_page";
        $tasks = $this->pdo->query($query);
        try {
            $tasks = $tasks->fetchAll(\PDO::FETCH_CLASS);
            return $tasks;
        } catch (\PDOException $e) {
            echo "Ошибка выполнения запроса: " . $e->getMessage();
        }
    }

    public function task($id) {
        $query = "SELECT * FROM tasks where `id` = '{$id}'";
        $task = $this->pdo->query($query);
        try {
            $task = $task->fetch(\PDO::FETCH_ASSOC);
            return $task;
        } catch (\PDOException $e) {
            echo "Ошибка выполнения запроса: " . $e->getMessage();
        }
    }

    public function number_of_tasks() {
        $query = "SELECT COUNT(*) FROM tasks";
        $count_tasks = $this->pdo->query($query);
        try {
            $count_tasks = $count_tasks->fetch()[0];
            return $count_tasks;
        } catch (\PDOException $e) {
            echo "Ошибка выполнения запроса: " . $e->getMessage();
        }
    }

    public function save($data) {
        $data['login'] = htmlspecialchars($data['login']);
        $data['email'] = htmlspecialchars($data['email']);
        $data['text'] = htmlspecialchars($data['text']);
        $query = "INSERT INTO `tasks`(`login`, `email`, `text`) VALUES ('{$data['login']}', '{$data['email']}', '{$data['text']}')";
        if($this->pdo->query($query))
        {
            header("Location: ".$_SERVER['REQUEST_URI']);
        }
    }

    public function update($up_data, $data) {
        $up_data['text'] = htmlspecialchars($up_data['text']);
        $up_data['produced'] = $up_data['produced'] ?? 0;
        $updated = $up_data['text'] === $data['text'] ? $data['updated'] : 1;
        $query = "UPDATE `tasks` SET `text` = '{$up_data['text']}', `updated` = '{$updated}', `produced` = '{$up_data['produced']}' WHERE `id` = '{$up_data['id']}'";
        if($this->pdo->query($query))
        {
            header("Location: ".$_SERVER['REQUEST_URI']);
        }
    }

}
