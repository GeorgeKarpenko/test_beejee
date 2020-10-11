<?php
use App\Modules\HTML;

// HTML код главной страницы
$page_content = HTML::phptpl('inc/form', [
  'errors' => $errors,
  'post_parameter' => $post_parameter
  ]);
$page_content .= HTML::phptpl('inc/table', [
  'tasks' => $tasks,
  'page' => $page,
  'pages' => $pages,
  'get_parameter' => $get_parameter
  ]);

// окончательный HTML код
$layout_content = HTML::phptpl('layouts/app',
['content' => $page_content, 'title' => 'Стартовая страница']);

// вывод на экран итоговой страницы
print($layout_content);