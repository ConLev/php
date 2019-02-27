<?php

require_once __DIR__ . '/../../config/config.php';

$id = $_GET['id'];
$sql = "SELECT * FROM `images` WHERE id='$id'";
$images = getImg($sql);
$gallery = renderImg(TEMPLATES_DIR . 'img.tpl', $images);

echo render(TEMPLATES_DIR . 'viewImg.tpl', [
    'title' => 'Галерея',
    'content' => $gallery,
]);