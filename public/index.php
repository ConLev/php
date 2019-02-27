<?php

require_once __DIR__ . '/../config/config.php';

//var_dump(scandir('./'));

$year = date("Y");
echo render(TEMPLATES_DIR . 'index.tpl', [
    'title' => 'Home page',
    'h1' => 'Home page',
    //'footer' => 'Все права защищены ' . date("Y"),
    'content' => 'Home page my.site',
    'year' => $year,
]);