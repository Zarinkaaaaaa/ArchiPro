<?php

// Запуск сессии
session_start();

// Подключение к БД
require_once '../database/database.php';

// Получение глобальное значение
global $database;

// Проверка на наличие post запроса
if(!isset($_POST)) die('Поддерживается только метод post. Вы передаете get запрос');

// Получение данных из формы
$email = trim($_POST['email']);
$password = trim($_POST['password']);

// Сохраняем данные в сессию для вывода в поле value
$_SESSION['email'] = $email;

// Получение пользователя
$sql = "SELECT * FROM `users` WHERE `email` = '$email'";
$query = $database->query($sql);
$user = $query->fetch(PDO::FETCH_ASSOC);

// Если поле email пустое, то сохраняем ошибку в сессии
if(empty($email)) $_SESSION['errors']['email'] = 'Поле email является обязательным';
if(empty($password)) $_SESSION['errors']['password'] = 'Поле password является обязательным';

// Проверка на email
else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) $_SESSION['errors']['email'] = 'Поле email некорректно';

// Проверка на уникальность email
else {

    // Проверка есть ли данный email в БД и если нет, то выводим ошибку
    if(empty($user)) $_SESSION['errors']['email'] = 'Вы не зарегистрированы';
    if($user['role_id'] === 3)$_SESSION['errors']['email'] = 'Вы заблокированы!🤣';

}

if(!empty($password) && empty($_SESSION['errors']['email']) && !password_verify($password, $user['password'])) {

    $_SESSION['errors']['password'] = 'Неверный пароль';

}

// Если массив ошибок не пустой, то возвращаем пользователя обратно
if(!empty($_SESSION['errors'])) {

    header('Location: ../index.php?page=entry');

    die();

}

// Авторизация пользователя
$_SESSION['user'] = $user;

// Очистка значения email
unset($_SESSION['email']);

// Редирект пользователя
header('Location: ../index.php');