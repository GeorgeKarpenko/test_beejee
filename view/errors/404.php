<?php
use App\Modules\HTML;


// окончательный HTML код
$layout_content = HTML::phptpl('layouts/app',
['content' => '<a href="/">Главная страница</a>', 'title' => '404']);

// вывод на экран итоговой страницы
print($layout_content);