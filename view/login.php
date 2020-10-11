<?php
use App\Modules\HTML;

// HTML код главной страницы
$page_content = HTML::phptpl('inc/login_form', [
  'errors' => $errors,
  'post_parameter' => $post_parameter
  ]);

// окончательный HTML код
$layout_content = HTML::phptpl('layouts/app',
['content' => $page_content, 'title' => 'Авторизация']);

// вывод на экран итоговой страницы
print($layout_content);