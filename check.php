<?php
session_start();

$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$surname = filter_var(trim($_POST['surname']), FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
$number = filter_var(trim($_POST['number']), FILTER_SANITIZE_NUMBER_INT);
$country = filter_var(trim($_POST['country']), FILTER_SANITIZE_STRING);
$comment = filter_var(trim($_POST['comment']), FILTER_SANITIZE_STRING);

// Сравниваем два захешированных значения

if(trim(hash("sha256", $_SESSION['captcha'])) === trim(hash("sha256", $_POST['captcha']))) {

    // Подключаем базу данных

    $mysql = new mysqli('myproject.loc', 'root', '', 'regist-db');

    $mysql->query("INSERT INTO `users` (`name`, `surname`, `email`, `number`, `country`, `comment`) 
    VALUES ('$name', '$surname', '$email', '$number', '$country', '$comment')");

    $mysql->close();

    // Выводим SESSION с сообщением
    $_SESSION['success'] = 'Форма успешно отправлена!';
} else {
    $_SESSION['error'] = 'Вы неправильно ввели проверочный код!';
}


// Перенаправляемся к index.php

header('Location: index.php');
exit();