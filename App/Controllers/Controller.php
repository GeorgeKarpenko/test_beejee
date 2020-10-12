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
    $user = new User;
    if ($data == 'auth') {
      if ($user->my($_COOKIE)){
        return true;
      }
      else {
        header("Location: /403");
      }
    }
  }
}
