<?php

session_start();

require_once '../database/database.php';

global $database;

require '../functions/functions.php';

if (!isset($_POST))
    die('Поддерживается только метод post');

$image = $_FILES['image'];

$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$opisanie = $_POST['opisanie'];
$text = $_POST['text'];
$component1 = $_POST['component1'];
$component2 = $_POST['component2'];
$component3 = $_POST['component3'];
$component4 = $_POST['component4'];


if (empty($name)) {
    $_SESSION['errors']['name'] = 'Поле название обязательно для заполнения';
}
if (empty($price)) {
    $_SESSION['errors']['price'] = 'Поле стоимость обязательно для заполнения';
}
if (empty($opisanie)) {
    $_SESSION['errors']['opisanie'] = 'Поле описание обязательно для заполнения';
}
if (empty($text)) {
    $_SESSION['errors']['text'] = 'Поле текст обязательно для заполнения';
}
if (empty($component1)) {
    $_SESSION['errors']['component1'] = 'Поле component1 обязательно для заполнения';
}
if (empty($component2)) {
    $_SESSION['errors']['component2'] = 'Поле component2 обязательно для заполнения';
}
if (empty($component3)) {
    $_SESSION['errors']['component3'] = 'Поле component3 обязательно для заполнения';
}
if (empty($component4)) {
    $_SESSION['errors']['component4'] = 'Поле component4 обязательно для заполнения';
}
if (empty($image)) {
    $_SESSION['errors']['image'] = 'Загрузите фото';
}

$imageErrors = validateFile($image, [
    'maxSize' => 4,
    'types' => ['image/png', 'image/jpeg', 'image/gif', 'image/jpg'],
]);

$imagePath = '';

if (empty($imageErrors)) {
    $imagePath = uploadFile($image, 'assets/media/uslugi/');
}

if (!empty($_SESSION['errors'])) {

    header('Location: ../index.php?page=edit');
    die();
}

$sql = "UPDATE uslugi SET name = :name, price = :price, opisanie = :opisanie, text = :text, image = :image, component1 = :component1, component2 = :component2, component3 = :component3, component4 = :component4 WHERE id = :id";

$query = $database->prepare($sql);

$params = [
    ':name' => $name,
    ':price' => $price,
    ':opisanie' => $opisanie,
    ':text' => $text,
    ':image' => $imagePath,
    ':component1' => $component1,
    ':component2' => $component2,
    ':component3' => $component3,
    ':component4' => $component4,
    ':id' => $id
];

$query->execute($params);

$uslugiId = $database->lastInsertId();

$uslugi = getUslugi();

$oldPath = '../' . $uslugi['image'];

if (file_exists($oldPath))
    unlink($oldPath);

header('Location:../index.php?page=uslugi');



