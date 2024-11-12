<?php

session_start();

require_once '../database/database.php';

global $database;

require '../functions/functions.php';

if (isset($_POST)) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];


    if (empty($name)) {
        $_SESSION['errors']['name'] = 'Поле название обязательно для заполнения';
    }
    if (empty($fullname)) {
        $_SESSION['errors']['fullname'] = 'Поле стоимость обязательно для заполнения';
    }
    if (empty($email)) {
        $_SESSION['errors']['email'] = 'Поле описание обязательно для заполнения';
    }

    $sql = "UPDATE users SET name = :name, fullname = :fullname, email = :email WHERE id = :id";

    $query = $database->prepare($sql);

    $params = [
        ':name' => $name,
        ':fullname' => $fullname,
        ':email' => $email,
        ':id' => $id
    ];

    $query->execute($params);

    header('Location:../index.php?page=private-kab');
}