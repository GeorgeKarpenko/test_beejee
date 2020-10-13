<?php

namespace App\Controllers;

use App\Models\{
  User
};

class Controller
{
  protected function view ($name, $payload) {
    extract($payload, EXTR_PREFIX_SAME, "wddx");
    unset($payload);
    include(PATH . $name);
  }

  protected function middleware ($data) {
    session_start();
    $user = new User;
    if ($data == 'auth') {
      if ($user->my($_SESSION)){
        return true;
      }
      else {
        header("Location: /403");
        die();
      }
    }
  }
}
