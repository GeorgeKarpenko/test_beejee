<?php
$root_dir = 'test_beejee';
define ('PATH', explode($root_dir, __DIR__)[0].$root_dir.'/');
$app = require_once PATH . 'router/web.php';

spl_autoload_register(function ($class_name) {
  include PATH . str_replace("\\", "/", $class_name) . '.php';
});
$url = explode('?', $_SERVER['REQUEST_URI'])[0];
if($app[$url]){
  if($class_func = $app[$url][$_SERVER['REQUEST_METHOD']]){
    list($class, $func) = explode('@', $class_func);
    $class = 'App\Controllers\\' . $class;
    $Controllers = new $class;
    $Controllers->$func();
    die();
  }
}

if ($_SERVER['REQUEST_URI'] == '/403') {
  include( PATH . 'view/errors/403.php');
  die();
}

http_response_code(404);
include( PATH . 'view/errors/404.php');
die();

