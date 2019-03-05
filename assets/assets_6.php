<?php

//$feedback_body = mysqli_real_escape_string(
//    $db_link,
//    (string)htmlspecialchars(strip_tags($_POST['review']))
//);

/*

strip_tags – удаляет HTML и PHP теги. Честно говоря, это мало относится к SQL-инъекциям,
но атаку через форму без этого тега провести можно.

htmlspecialchars – производятся следующие преобразования:
'&' (амперсанд) преобразуется в '&amp;'
'"' (двойная кавычка) преобразуется в '&quot;' в режиме ENT_NOQUOTES is not set.
"'" (одиночная кавычка) преобразуется в '&#039;' (или &apos;) только в режиме ENT_QUOTES.
'<' (знак "меньше чем") преобразуется в '&lt;'
'>' (знак "больше чем") преобразуется в '&gt;'
(string) – строго приводим тип к строке.
mysqli_real_escape_string – самый мощный инструмент, экранирует специальные символы в строке
для использования в SQL выражении, используя текущий набор символов соединения.

*/

require_once '../config/config.php';

echo '<pre>';
var_dump($_POST);
var_dump($_FILES); //тут хранится информация о загружаемых файлах
echo '</pre>';

//user_file - имя name заданное для input типа file
//Если $_FILES['user_file'] существует, и нет ошибок
if (!empty($_FILES['user_file']) && !$_FILES['user_file']['error']) {
    $file = $_FILES['user_file'];

    //выбираем деррикторию куда загружать изображение
    $upload_dir = WWW_DIR . '/uploads/';

    //выбираем конечное имя файла
    $upload_file = $upload_dir . basename($file['name']);

    //Пытаемся переместить файл из временного местонахождения в постоянное
    if (move_uploaded_file($file['tmp_name'], $upload_file)) {
        echo "Файл корректен и был успешно загружен.\n";
    } else {
        echo "Возможная атака с помощью файловой загрузки!\n";
    }
}
?>

<!-- показываю, что кнопка submit может так же передавать данные в POST|GET -->
<form action="" method="POST">
    <input type="submit" name="var1">
    <input type="submit" name="var2">
</form>

<!-- Тип кодирования данных, enctype, ДОЛЖЕН БЫТЬ указан ИМЕННО так -->
<form enctype="multipart/form-data" action="" method="POST">
    <!-- Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла (в байтах) -->
    <!-- <input type="hidden" name="MAX_FILE_SIZE" value="30000"/> -->
    <!-- Название элемента input определяет имя в массиве $_FILES -->
    Отправить файл: <input name="user_file" type="file"/><br>
    <input type="submit" value="Send File"/>
</form>

<!--    Тип кодирования данных, enctype, ДОЛЖЕН БЫТЬ указан ИМЕННО так -->
<!--    <form enctype="multipart/form-data" action="__URL__" method="POST"> -->
<!--    Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла (в байтах) -->
<!--    <input type="hidden" name="MAX_FILE_SIZE" value="30000"/> -->
<!--    Название элемента input определяет имя в массиве $_FILES -->
<!--    Отправить этот файл: <input name="user_file" type="file"/> -->
<!--    <input type="submit" value="Send File"/> -->
<!--    </form> -->

<!--    $_FILES['user_file']['name'] – оригинальное имя файла на компьютере клиента.-->
<!--    $_FILES['user_file']['type'] – Mime-тип файла, в случае, если браузер предоставил такую информацию.-->
<!--    Пример: "image/gif". Этот mime-тип не проверяется в PHP, так что не полагайтесь на его значение без проверки.-->
<!--    $_FILES['user_file']['size'] – размер в байтах принятого файла.-->
<!--    $_FILES['user_file']['tmp_name'] – временное имя, с которым принятый файл был сохранен на сервере.-->
<!--    $_FILES['user_file']['error'] – код ошибки, которая может возникнуть при загрузке файла.-->

<?php
//$upload_dir = __DIR__ . '/img/uploads/';
//$upload_file = $upload_dir . basename($_FILES['user_file']['name']);
//echo '<pre>';
//if (move_uploaded_file($_FILES['user_file']['tmp_name'], $upload_file)) {
//    echo "Файл корректен и был успешно загружен.\n";
//} else {
//    echo "Возможная атака с помощью файловой загрузки!\n";
//}
//?>

<!--    1) товары-->
<!--    1.1) каталог - все товары - /index.php-->
<!--    1.2) страница товара - /goods_item.php?id=13-->
<!--    2) админка-->
<!--    2.1) посмотреть товары как админ - /admin/index.php-->
<!--    2.2) добавить товар - /admin/create.php-->
<!--    2.3) редактировать товар-->
<!--    2.4) удалить товар-->
<!--    3) галерея из прошлых работ-->
<!--    4) страница отзывов-->