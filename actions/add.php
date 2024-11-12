<?php

session_start();

if (!isset($_POST))
    die('Поддерживается только метод post');

require_once '../database/database.php';

global $database;

require '../functions/functions.php';

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


if (!empty($imageErrors)) {
    $_SESSION['errors']['image'] = $imageErrors;
}

$imagePath = '';

if (!isset($_SESSION['errors']) || empty($_SESSION['errors']['image'])) {
    $imagePath = uploadFile($image, 'assets/media/uslugi/');
}


if (!empty($_SESSION['errors'])) {

    header('Location: ../index.php?page=admin-add');

    die();
}

$sql = 'INSERT INTO `uslugi`(`id`, `name`, `price`, `opisanie`, `text`, `image`, `component1`, `component2`, `component3`, `component4`) VALUES (NULL, :name, :price, :opisanie, :text, :image, :component1, :component2, :component3, :component4)';

$query = $database->prepare($sql);

$uslugi = $query->execute([
    ':name' => $name,
    ':price' => $price,
    ':opisanie' => $opisanie,
    ':text' => $text,
    ':image' => $imagePath,
    ':component1' => $component1,
    ':component2' => $component2,
    ':component3' => $component3,
    ':component4' => $component4,
]);

$uslugiId = $database->lastInsertId();

$sql = '';

header('Location:../index.php?page=admin-uslugi');

