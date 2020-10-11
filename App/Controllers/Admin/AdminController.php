<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\Task;

class AdminController extends Controller
{

  private $per_page = 3;

  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */

  public function index()
  {
    $task_db = new Task;
    if($_GET['update']){
      $task = $task_db->task($_GET['update']);
    }
    if ($_SERVER['REQUEST_METHOD'] ==='POST') {
      $errors = [];
      if (strlen($_POST['text']) <= 5) {
        $errors['text'] = 'Ошибка валидации. Текст задачи должен быть больше 5 символов';
      }
      if (!count($errors)) {
        $task_db->update($_POST, $task);
      }
    }
    $page = (int)($_GET['page'] ?? 1);
    $per_page = $this->per_page;
    $tasks = $task_db->tasks($page, $per_page);
    $count_tasks = $task_db->number_of_tasks();
    $pages = ceil($count_tasks/$per_page);

    $url = $_SERVER['REQUEST_URI'];
    $url = explode('?', $url);
    $url = $url[0];
    
    $this->view("view/admin.php", compact('tasks','count_tasks','pages','page', 'errors', 'url','task'));
  }

  public function exit()
  {
    setcookie("user","",time()-3600,"/");

    header("Location: /");
  }

}
