<?php

namespace App\Controllers;

class Controller
{
  protected function view ($name, $payload) {
    extract($payload, EXTR_PREFIX_SAME, "wddx");
    unset($payload);
    include(PATH . $name);
  }

  protected function middleware ($data) {
    if ($data == 'auth') {
      if ($_COOKIE['user']){
        return true;
      }
      else {
        header("Location: /403");
      }
    }
  }
}
