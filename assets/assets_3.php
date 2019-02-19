<?php
/*

Правка ДЗ

*/

// 1. последний if лишний
// 2. можно использовать остаток от деления
// 3. секретная фича
function worldForm($h)
{

    if ($h == 1 || $h == 21) {
        echo "$h час";
    } else if ($h >= 2 && $h <= 4 || $h >= 22 && $h <= 24) {
        echo "$h часа";
    } else if ($h == 0 || $h >= 5 && $h <= 20) {
        echo "$h часов";
    }
}

$h = rand(0, 23);
worldForm($h);


/*

ЦИКЛЫ И МАССИВЫ

*/

/*

while

*/

$n = 10;
$i = 1;

while ($i <= $n) {
    echo "$i<br/>";
    $i++;
}

/*

do...while

*/

$n = 10;
$i = 1;

do {
    echo "$i<br/>";
    $i++;
} while ($i <= $n);


/*

for

*/

$n = 10;

for ($i = 1; $i <= $n; $i++) {
    echo "$i<br/>";
}

/*

for - замена while

for ( ; условие; ){
    операторы
}

*/

/*

Бесконечные циклы и break;

    for (;;){
       …
    }

    while(true){
       …
    }
*/

$n = 10;
$i = 1;
while (true) {
    echo "$i<br/>";
    $i++;
    if ($i > $n) {
        break;
    }
}

/*

continue;

все нечётные числа от 1 до 10

*/

$n = 10;
for ($i = 1; $i <= $n; $i++) {
    if ($i % 2 == 0) {
        continue;
    }
    echo "$i<br/>";
}

/*

Массивы

*/

// PHP < 5.3
$oldArrayStyle = array();

// PHP >= 5.4
$myArray = [];

//разные типы
$myArray = [];

$myArray = [1, 2, 3];
$someVar = true;
$myArray[] = 1;
$myArray[] = 'Hello, world!';
$myArray[] = $someVar;

var_dump($myArray);

//обращение
echo $myArray[1];

//isset
var_dump(isset($myArray[8]));

// вложенный массив
$users = [];
$users[0] = [
    'name' => 'Alex',
    'email' => 'alex@example.com'
];
$users[1] = [
    'name' => 'George',
    'email' => 'george@domain.ru',
    'additionalData' => 'Всем привет!'
];
$users[3] = [
    'name' => 'Michael',
    'email' => 'mich@test.com'
];

//Циклы и массивы
$arr = [1, 2, 3, 4, 5, 6];
for ($i = 0; $i < count($arr); $i++) {
    echo $arr[$i] . '</br>';
}


foreach ($myArray as $my_key => $my_value) {
    echo("$my_key is $my_value <br/>");
}


foreach ($users as $user) {
    foreach ($user as $key => $value) {
        var_dump($key, $value);
    }
}

//Функции для массивов
// http://php.net/manual/ru/ref.array.php
//unset

//count
//int count(mixed var)
var_dump(count($arr));


//in_array()
//boolean in_array(mixed needle, array haystack [, bool strict])

var_dump(in_array(1, $arr));


//sort()
//void sort(array array [, int sort_flags])

$arr = [7, 4, 6, 8, 1];
var_dump(sort($arr));
//arsort(), asort(), ksort(), natsort(), natcasesort(), rsort(), usort(), array_multisort() и uksort().


//implode, explode
// Превратить массив в строку, с разделителем - точкой с запятой:
$aLanguages = ['ru', 'en', 'de', 'fr'];
$sLangString = implode(';', $aLanguages);
echo $sLangString;

var_dump('123');
// Превратить предложение в массив отдельных слов:
$sSentence = 'Per aspera ad astra';
$aWords = explode(' ', $sSentence);
var_dump($aWords);


/*

Супер глобальные массивы

$GLOBALS – содержит ссылки на все переменные глобальной области видимости.
$_SERVER – информация о сервере и среде исполнения.
$_GET – GET-переменные HTTP. В массив $_GET приходят параметры, перечисленные в адресной строке после знака ?
и разделённые знаком & (localhost/index.php?param1=somevalue&param2=hello&test=world).
$_POST – ассоциативный массив данных, переданных скрипту через HTTP метод POST.
$_FILES – переменные файлов, загруженных по HTTP.
$_COOKIE – ассоциативный массив значений, переданных скрипту через HTTP Куки.
$_SESSION – ассоциативный массив, содержащий переменные сессии, которые доступны для текущего скрипта.
$_REQUEST – ассоциативный массив, который по умолчанию содержит данные переменных $_GET, $_POST и $_COOKIE.
$_ENV – переменные окружения.

*/

$menu = [
    [
        'title' => 'Главная',
        'link' => '/',
    ],
    [
        'title' => 'Статьи',
        'link' => '/articles/',
        'children' => [
            'title' => 'О котиках',
            'articles' => '/articles/cats/',
        ],
        [
            'title' => 'О собачках',
            'articles' => '/articles/dogs/',
        ],
    ],
    [
        'title' => 'Контакты',
        'articles' => '/contacts/',
    ],
];
