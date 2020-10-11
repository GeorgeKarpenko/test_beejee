<?php

return [
  '/' => [
    'GET' => 'Site\HomeController@index',
    'POST' => 'Site\HomeController@index'
  ],
  '/login' => [
    'GET' => 'Site\HomeController@autoconfigure',
    'POST' => 'Site\HomeController@autoconfigure'
  ],
  '/admin' => [
    'GET' => 'Admin\AdminController@index',
    'POST' => 'Admin\AdminController@index'
  ],
  '/exit' => [
    'GET' => 'Admin\AdminController@exit'
  ]
];