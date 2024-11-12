<?php

if(!isset($_POST)) die('Поддерживается только метод post');

require_once '../database/database.php';

global $database;

// Получение id пользователя и его преобразование в тип int
$user_id = (int) $_POST['id'];

// Подготовка запроса
$sql = "UPDATE `users` SET `role_id`= 3 WHERE `id` = :id";

$prepare = $database->prepare($sql);

$prepare->execute([
    ':id' => $user_id
]);

// Редирект
header('Location: ../index.php?page=admin');