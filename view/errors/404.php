<?php
use App\Modules\HTML;


// окончательный HTML код
$layout_content = HTML::phptpl('layouts/app',
['content' => '', 'title' => '404']);

// вывод на экран итоговой страницы
print($layout_content);