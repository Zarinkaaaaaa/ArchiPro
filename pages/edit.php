<?php

global $database;
// Получение пользователя по id

// Получаем id пользователя из $_GET запроса
if ((isset($_GET['page']) and $_GET['page'] === 'edit') and isset($_GET['id'])) {

    // Получаем id
    $id = $_GET['id'];

    // Формируем sql запрос
    $sql = "SELECT * FROM `uslugi` WHERE id = $id";

    // Выполняем sql запрос
    $query = $database->query($sql);

    // Получаем данные
    $uslugi = $query->fetch(PDO::FETCH_ASSOC);

} else {

    die('404. Page not found');

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/media/favicon/favicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>ArchiPro</title>
</head>

<body>
    <div class="content">
        <h3 style="text-align:center; margin-top:100px; font-size:35px;">Редактирование услуги</h3>
        <form style="margin:100px 0px; display:flex; align-items:center" class="admin-panel-info-add" action="actions/update.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $uslugi['id'] ?>">
            <input type="text" name="name" placeholder="Название услуги" id="name" autofocus
                value="<?= $uslugi['name'] ?>">
            <?php
            // Вывод ошибок
            if (isset($_SESSION['errors']['name'])) {
                ?>
                <p style="color: red"><?= $_SESSION['errors']['name']; ?></p><?php
                  unset($_SESSION['errors']['name']);
            }
            ?>

            <input type="text" name="price" placeholder="Цена услуги" id="price" value="<?= $uslugi['price'] ?>">
            <?php
            // Вывод ошибок
            if (isset($_SESSION['errors']['price'])) {
                ?>
                <p style="color: red"><?= $_SESSION['errors']['price']; ?></p><?php
                  unset($_SESSION['errors']['price']);
            }
            ?>

            <input type="text" name="opisanie" id="opisanie" placeholder="Описание" value="<?= $uslugi['opisanie'] ?>">
            <?php
            // Вывод ошибок
            if (isset($_SESSION['errors']['opisanie'])) {
                ?>
                <p style="color: red"><?= $_SESSION['errors']['opisanie']; ?></p><?php
                  unset($_SESSION['errors']['opisanie']);
            }
            ?>

            <input type="text" name="text" id="text" placeholder="Текст (дополнительный)" value="<?= $uslugi['text'] ?>">
            <?php
            // Вывод ошибок
            if (isset($_SESSION['errors']['text'])) {
                ?>
                <p style="color: red"><?= $_SESSION['errors']['text']; ?></p><?php
                  unset($_SESSION['errors']['text']);
            }
            ?>

            <input class="input" type="file" name="image" id="image" placeholder="Загрузите картинку"
                value="<?= $uslugi['image'] ?>">
            <?php

            //Вывод ошибок
            if (isset($_SESSION['errors']['image'])) {
                (array) $errors = $_SESSION['errors']['image'];
                foreach ($errors as $error) {
                    ?>
                    <p style="color: red"><?= $error; ?></p><?php

                }
                unset($_SESSION['errors']['image']);
            }
            ?>

            <input type="text" name="component1" id="component1" placeholder="Характеристика (1 компонент)"
                value="<?= $uslugi['component1'] ?>">
            <?php
            // Вывод ошибок
            if (isset($_SESSION['errors']['component1'])) {
                ?>
                <p style="color: red"><?= $_SESSION['errors']['component1']; ?></p><?php
                  unset($_SESSION['errors']['component1']);
            }
            ?>

            <input type="text" name="component2" id="component2" placeholder="Характеристика (2 компонент)"
                value="<?= $uslugi['component2'] ?>">
            <?php
            // Вывод ошибок
            if (isset($_SESSION['errors']['component2'])) {
                ?>
                <p style="color: red"><?= $_SESSION['errors']['component2']; ?></p><?php
                  unset($_SESSION['errors']['component2']);
            }
            ?>

            <input type="text" name="component3" id="component3" placeholder="Характеристика (3 компонент)"
                value="<?= $uslugi['component3'] ?>">
            <?php
            // Вывод ошибок
            if (isset($_SESSION['errors']['component3'])) {
                ?>
                <p style="color: red"><?= $_SESSION['errors']['component3']; ?></p><?php
                  unset($_SESSION['errors']['component3']);
            }
            ?>

            <input type="text" name="component4" id="component4" placeholder="Характеристика (4 компонент)"
                value="<?= $uslugi['component4'] ?>">
            <?php
            // Вывод ошибок
            if (isset($_SESSION['errors']['component4'])) {
                ?>
                <p style="color: red"><?= $_SESSION['errors']['component4']; ?></p><?php
                  unset($_SESSION['errors']['component4']);
            }
            ?>
            <button type="submit">Сохранить</button>
        </form>
    </div>
</body>

</html>