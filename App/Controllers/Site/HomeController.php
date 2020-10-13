<?php

namespace App\Controllers\Site;

use App\Controllers\Controller;
use App\Models\{
  Task,
  User
};

class HomeController extends Controller
{

  private $per_page = 3;
  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
    $task = new Task;
    $errors = [];
    if ($_SERVER['REQUEST_METHOD'] ==='POST') {
      if (strlen($_POST['login']) < 2 || strlen($_POST['login']) > 100) {
        $errors['login'] = 'Ошибка валидации. Имя должно быть минимум 2 символа и меньше 100';
      }
      if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
        $errors['email'] = 'Ошибка валидации. Это не электронная почта';
      }
      if (strlen($_POST['text']) <= 5) {
        $errors['text'] = 'Ошибка валидации. Текст задачи должен быть больше 5 символов';
      }

      if (!count($errors)) {
        $task->save($_POST);
      }
    }
    $page = (int)($_GET['page'] ?? 1);
    $per_page = $this->per_page;
    $tasks = $task->tasks($page, $per_page, $_GET['column'] ?? 'login', $_GET['sort'] ?? 'ASC');
    $count_tasks = $task->number_of_tasks();
    $pages = ceil($count_tasks/$per_page);

    $url = $_SERVER['REQUEST_URI'];
    $url = explode('?', $url);
    $url = $url[0];

    $get_parameter = $_GET;
    $post_parameter = $_POST;
    
    $this->view("view/index.php", compact('tasks','count_tasks','pages','page', 'errors', 'url', 'get_parameter', 'post_parameter'));
  }

  public function autoconfigure() {
    $errors = [];
    $user = new User;
    if ($_SERVER['REQUEST_METHOD'] ==='POST') {
      if (strlen($_POST['login']) < 2 || strlen($_POST['login']) > 100) {
        $errors['login'] = 'Ошибка валидации. Имя должно быть минимум 2 символа и меньше 100';
      }
      if (strlen($_POST['password']) < 2) {
        $errors['password'] = 'Ошибка валидации. Пароль должно быть минимум 2 символа';
      }

      if (!count($errors)) {
        $data = $_POST;
        $data['password'] = md5($data['password']); 
        $my = $user->my($data);
        if($my){
          session_start();
          $_SESSION['login'] = $my['login'];
          $_SESSION['password'] = $my['password'];
          header("Location: /admin");
        }
        else {
          $errors['validation'] = 'Ошибка валидации. Введён неправильно логин или пароль';
        }
      }
    }
    
    $post_parameter = $_POST;
    $this->view("view/login.php", compact('errors', 'post_parameter'));
  }

}
