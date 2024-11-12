<?php

// Запуск сессии
session_start();

// Проверка на наличие post запроса
if(!isset($_POST)) die('Поддерживается только метод post. Вы передаете get запрос');

// Очистка сессий
unset($_SESSION['user']);
//session_destroy();

// Перенаправление на страницу авторизации
header('Location: ../index.php?page=entry');

die();