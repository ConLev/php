<?php

require_once __DIR__ . '/../config/config.php';
//var_dump(($_GET['id']));
$id = isset($_GET['id']) ? $_GET['id'] : false;

if (!$id) {
    echo 'id не передан';
    exit();
}

echo render(TEMPLATES_DIR . 'index.tpl', [
    'title' => "product $id",
    'h1' => "Товар $id",
    'content' => showProduct($id, TEMPLATES_DIR . 'product.tpl'),
    'year' => date('Y'),
]);