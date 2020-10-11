<?php
use App\Modules\HTML;

// HTML код главной страницы
$page_content = HTML::phptpl('inc/form', ['errors' => $errors]);
$page_content .= HTML::phptpl('inc/table', [
  'tasks' => $tasks,
  'page' => $page,
  'pages' => $pages
  ]);

// окончательный HTML код
$layout_content = HTML::phptpl('layouts/app',
['content' => $page_content, 'title' => 'Стартовая страница']);

// вывод на экран итоговой страницы
print($layout_content);