<?php
use App\Modules\HTML;

// HTML код главной страницы
if(count($tasks)) {
$page_content = HTML::phptpl('inc/admin/form', [
  'errors' => $errors,
  'tasks' => $tasks,
  'task' => $task
  ]);

$page_content .= HTML::phptpl('inc/admin/table', [
  'tasks' => $tasks,
  'page' => $page,
  'pages' => $pages,
  'get_parameter' => $get_parameter
  ]);
}

echo('<pre>');
print_r($_COOKIE);
echo('</pre>');

// окончательный HTML код
$layout_content = HTML::phptpl('layouts/app',
['content' => $page_content, 'title' => 'Админка. Учётная запись ' . $_COOKIE['login']]);

// вывод на экран итоговой страницы
print($layout_content);