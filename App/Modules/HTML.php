<?php

namespace App\Modules;

class HTML
{
  function phptpl($fileName, $params) {
    extract($params);
    ob_start();
    require(PATH . 'view/' . $fileName . '.php');
    return ob_get_clean();
	}
}