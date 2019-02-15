<?php

/*
	ДОМАШНЕЕ ЗАДАНИЕ прошлого урока
*/

$a = 3;
$b = 5;

echo "\$a = $a; \$b = $b <br>";

//$a = $a + $b;
//$b = $a - $b;
//$a = $a - $b;

// $a = 0011
// $b = 0101

$a = $a ^ $b; // $a = 0110 (6)
$b = $b ^ $a; // $b = 0011 (3)
$a = $a ^ $b; // $a = 0101 (5)

echo "\$a = $a; \$b = $b";
echo '</br>';

/*
	Операторы if, if-else
*/

/*
if ( условие ) {
  действие
}

if ( условие ) {
  действие
} else {
  действие
}
*/

$x = 5;
$y = 42;
if ($x > $y) {
    echo $x + $y . '<br>';
} else {
    echo $x * $y . '<br>';
}

$a = 10;
$b = 3;
$c = "";

if ($c) {
    echo "Не пусто <br>";
} else {
    echo "Пусто <br>";
}

/*
	Оператор switch
*/

$x = 5;
$y = 42;
if ($x > $y) {
    echo "$x больше $y <br>";
} else if ($x < $y) {
    echo "$x меньше $y<br>";
} else {
    echo "$x равен $y<br>";
}

/*
switch( переменная ){
  case Значение 1 :
    действие;
    break;
  case Значение 2:
    действие;
    break;
  default:
    действие;
}
*/

//упростить
$now = 'evening';
if ($now == 'night') {
    echo 'Доброй ночи! <br>';
} else if ($now == 'morning') {
    echo 'Доброе утро! <br>';
} else if ($now == 'evening') {
    echo 'Добрый вечер! <br>';
} else {
    echo 'Добрый день! <br>';
}

$a = 1;

switch ($a) {
    case '0':
    case '1':
        echo 'Один или ноль <br>';
        break;
    case '2':
        echo 'Два <br>';
        break;
    case 3:
        echo 'Три <br>';
        break;
    default:
        echo 'Неизвестное значение: ' . "$a<br>";
}

/*
	Тернарный оператор
*/

/* (Условие) ? (Операнд по истине) : (Оператор по лжи); */

$x = 10;
$y = 15;
$max = ($x > $y) ? $x : $y;
echo "$max<br>";

/*
	Функции
*/

/* 
function имя_функции(параметр1, параметр2, …){
   Действия
}
*/

function compare_numbers($x, $y)
{
    if ($x > $y) {
        echo "$x > $y" . '<br>';
    } else if ($x < $y) {
        echo "$x < $y" . '<br>';
    } else {
        echo "$x = $y" . '<br>';
    }
}

compare_numbers(10, 15);

/* return */

function average($x, $y)
{
    return ($x + $y) / 2;
}

$avg = average(42, 100500);
echo "$avg<br>";

/* значение по умолчанию */
function multiplications($a, $b = 1)
{
    return $a * $b;
}

echo multiplications(8) . '<br>';
echo multiplications(8, 2) . '<br>';

/* рекурсия */
function fibonacci($n, $prev1 = 1, $prev2 = 0)
{
    $current = $prev1 + $prev2;
    echo "$current ";
    if ($n > 1)
        fibonacci($n - 1, $current, $prev1);
}

echo fibonacci(15) . '<br>';

function factorial($x)
{
    if ($x <= 1) {
        return $x;
    }

    return $x * factorial($x - 1);
}

echo factorial(5) . '<br>';

/* область видимости функции */

function changeX($x)
{
    $x += 5;
    echo $x . '<br>';
}

$x = 1;

echo $x . '<br>';        // выводит 1
changeX($x);             // выводит 6
echo $x . '<br>';        // выводит 1

/* ДОМАШНЕЕ ЗАДАНИЕ */

//1
function func1($a, $b)
{
    /* */
}

func1(10, -7);

//2
function func2($a)
{
    /* */
}

func2(7);

//3
function addition($a, $b)
{
}

function subtraction($a, $b)
{
}

function multiplication($a, $b)
{
}

function division($a, $b)
{
}

//4
function mathOperation($a, $b, $operation)
{
}