<?php

// Запуск сессии
session_start();

// Подключение к БД
require_once '../database/database.php';
require_once '../functions/functions.php';

// Получение глобальное значение
global $database;

// Проверка на наличие post запроса
if (!isset($_POST))
    die('Поддерживается только метод post. Вы передаете get запрос');

// Получение данных из формы
$name = trim($_POST['name']);
$fullname = trim($_POST['fullname']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$password_r = trim($_POST['password_r']);

// Сохраняем данные в сессию для вывода в поле value
$_SESSION['name'] = $name;
$_SESSION['fullname'] = $fullname;
$_SESSION['email'] = $email;


// Если поле email пустое, то сохраняем ошибку в сессии
if (empty($name))
    $_SESSION['errors']['name'] = 'Поле name является обязательным';
if (empty($fullname))
    $_SESSION['errors']['fullname'] = 'Поле fullname является обязательным';
if (empty($email))
    $_SESSION['errors']['email'] = 'Поле email является обязательным';

// Проверка на email
else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    $_SESSION['errors']['email'] = 'Поле email некорректно';

// Проверка на уникальность email
else {

    // Получение email из БД
    $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
    $query = $database->query($sql);
    $isReg = $query->fetch(PDO::FETCH_ASSOC);

    // Проверка есть ли данный email в БД и если есть, то выводим ошибку
    if (!empty($isReg))
        $_SESSION['errors']['email'] = 'Поле email должно быть уникальным';

}

// Проверка на пустоту
if (empty($password))
    $_SESSION['errors']['password'] = 'Поле password является обязательным';

// Проверка на количество символов
else if (strlen($password) > 6)
    $_SESSION['errors']['password'] = 'Максимальное кол-во символов - 6';

// Проверка на пустоту
if (empty($password_r))
    $_SESSION['errors']['password_rep'] = 'Подтвердите пароль';

// Проверка на совпадение паролей
else if ($password !== $password_r)
    $_SESSION['errors']['password_rep'] = 'Пароли не совпадают';

// Если массив ошибок не пустой, то возвращаем пользователя обратно
if (!empty($_SESSION['errors'])) {
    header('Location: ../index.php?page=register');
    die();
}

// Шифрование пароля
$password = password_hash($password, PASSWORD_DEFAULT);

// Регистрация пользователя
$sql = "INSERT INTO `users`( `name`, `fullname`, `email`, `password`) VALUES (:name,:fullname,:email,:password)";


// Параметры
$params = [
    ':name' => $name,
    ':fullname' => $fullname,
    ':email' => $email,
    ':password' => $password,
];

// Подготовка запроса
$prepare = $database->prepare($sql);


// Выполнение запроса
$prepare->execute($params);


// Очистка значения email
unset($_SESSION['email']);
// unset($_SESSION['name']);
// unset($_SESSION['fullname']);

// Редирект пользователя
 header('Location: ../index.php?page=entry');