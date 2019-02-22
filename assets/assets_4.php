<?php

//Домашнее задание

header('Content-Type: text/html; charset=utf-8');


// Если не помещается на 1 строку, то соблюдать правила открытия/закрытия тегов
$regions = [
    "Московская область" => ["Москва", "Зеленоград", "Клин"],
    "Ленинградская область" => ["Санкт-Петербург", "Всеволожск", "Павловск"],
    "Рязанская область" => ["Рязань", "Ряжск", "Сапожок"]
];

foreach ($regions as $region_name => $cities) { //неосмысленные имена
    echo $region_name . '<br>';

    $arrLength = count($regions[$region_name]);
    for ($i = 0; $i < $arrLength; $i++) { //count внутри цикла
        if ($i == $arrLength - 1) {
            echo $cities[$i] . '.' . '<br>'; //не использование $value
        } else {
            echo $cities[$i] . ', ';
        }
    }
}

$a = 0;
while ($a++ < 100) {
    $result .= $a; //$result не задан
}

//Подключение файлов с кодом
//include
//require
//include_once
//require_once


$file = fopen("file.txt", "r");
if (!$file) {
    echo("Ошибка открытия файла<br>");
}

echo "Файл открыт<br>";
fclose($file);

//Если не знаем размер файла
$file = fopen("file.txt", "r");
if (!$file) {
    echo("Ошибка открытия файла<br>");
} else {
    $buffer = '';
    while (!feof($file)) {
        $buffer .= fread($file, 1); //fgets
    }
    echo "$buffer<br>";
    fclose($file);
}

//Если размер файла не большой
$file = fopen("file.txt", "r");
if (!$file) {
    echo("Ошибка открытия файла<br>");
} else {
    $buffer = fread($file, filesize("file.txt"));
    echo "$buffer<br>";
    fclose($file);
}

// удобно
echo file_get_contents("file.txt") . '<br>';

// запись файлов
$filename = "file.txt";
file_put_contents("file.txt", "Some Data\n", FILE_APPEND);
echo file_get_contents("file.txt");

//шаблонизатор
function render($file, $variables = [])
{
    if (!is_file($file)) {
        echo 'Template file "' . $file . '" not found<br>';
        exit();
    }

    if (filesize($file) === 0) {
        echo 'Template file "' . $file . '" is empty<br>';
        exit();
    }

    $templateContent = file_get_contents($file);

    if (empty($variables)) {
        return $templateContent;
    }

    foreach ($variables as $key => $value) {
        if (empty($value) || !is_string($value)) {
            continue;
        }

        $key = '{{' . strtoupper($key) . '}}';

        $templateContent = str_replace($key, $value, $templateContent);
    }

    return $templateContent;
}