<?php
global $database;

$sql = "SELECT * FROM `users` WHERE id = 3";

$query = $database->query($sql);

$users = $query->fetchAll(PDO::FETCH_ASSOC);

?>



<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/media/favicon/favicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>ArchiPro</title>
</head>

<body>
    <!--ADMIN-->
    <div class="admin">
        <div class="content">
            <div class="admin-block">
                <div class="admin-info">
                    <?php foreach ($users as $user) { ?>
                        <img class="admin-face"
                            src="<?php echo is_null($user['avatar']) ? 'assets/media/admin/ava.webp' : $user['avatar']; ?>"
                            alt="#">
                        <p><?php $user['id'] ?></p>
                        <h3><?= $user['name'] ?><span> </span><?= $user['fullname'] ?></h3>
                        <p style="font-size:24px"><?= $user['email'] ?></p>

                    <?php } ?>
                    <div class="admin-info-links">
                        <div class="admin-info-link">
                            <img src="assets/media/admin/people.png" alt="#">
                            <a href="?page=admin">Пользователи</a>
                        </div>
                        <div class="admin-info-link">
                            <img src="assets/media/admin/uslugi.png" alt="#">
                            <a href="?page=admin-uslugi">Услуги</a>
                        </div>
                        <div class="admin-info-link">
                            <img src="assets/media/admin/add.png" alt="#">
                            <a href="?page=admin-add">Добавить услугу</a>
                        </div>
                    </div>
                </div>

                <?php

                global $database;

                $sql = "SELECT * FROM `uslugi`";

                $query = $database->query($sql);

                $uslugi = $query->fetchAll(PDO::FETCH_ASSOC);

                ?>


                <div class="admin-panel-add">
                    <h2>Панель администратора</h2>
                    <div class="admin-panel-info">
                        <h3>Добавление услуги</h3>
                        <form class="admin-panel-info-add" action="actions/add.php" method="post"
                            enctype="multipart/form-data">
                            <input type="text" name="name" placeholder="Название услуги" id="name" autofocus value="<?php
                            if (isset($_SESSION['name'])) {
                                echo $_SESSION['name'];
                                unset($_SESSION['name']);
                            }
                            ?>">
                            <?php
                            // Вывод ошибок
                            if (isset($_SESSION['errors']['name'])) {
                                ?>
                                <p style="color: red"><?= $_SESSION['errors']['name']; ?></p><?php
                                  unset($_SESSION['errors']['name']);
                            }
                            ?>

                            <input type="text" name="price" placeholder="Цена услуги" id="price" value="<?php
                            if (isset($_SESSION['price'])) {
                                echo $_SESSION['price'];
                                unset($_SESSION['price']);
                            }
                            ?>">
                            <?php
                            // Вывод ошибок
                            if (isset($_SESSION['errors']['price'])) {
                                ?>
                                <p style="color: red"><?= $_SESSION['errors']['price']; ?></p><?php
                                  unset($_SESSION['errors']['price']);
                            }
                            ?>

                            <textarea type="text" name="opisanie" id="opisanie" placeholder="Описание" n cols="30"
                                rows="10" value="<?php
                                if (isset($_SESSION['opisanie'])) {
                                    echo $_SESSION['opisanie'];
                                    unset($_SESSION['opisanie']);
                                }
                                ?>"></textarea>
                            <?php
                            // Вывод ошибок
                            if (isset($_SESSION['errors']['opisanie'])) {
                                ?>
                                <p style="color: red"><?= $_SESSION['errors']['opisanie']; ?></p><?php
                                  unset($_SESSION['errors']['opisanie']);
                            }
                            ?>

                            <input type="text" name="text" id="text" placeholder="Текст (дополнительный)" value="<?php
                            if (isset($_SESSION['text'])) {
                                echo $_SESSION['text'];
                                unset($_SESSION['text']);
                            }
                            ?>">
                            <?php
                            // Вывод ошибок
                            if (isset($_SESSION['errors']['text'])) {
                                ?>
                                <p style="color: red"><?= $_SESSION['errors']['text']; ?></p><?php
                                  unset($_SESSION['errors']['text']);
                            }
                            ?>

                            <input class="input" type="file" name="image" id="image" placeholder="Загрузите картинку">
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

                            <input type="text" name="component1" id="component1"
                                placeholder="Характеристика (1 компонент)" value="<?php
                                if (isset($_SESSION['component1'])) {
                                    echo $_SESSION['component1'];
                                    unset($_SESSION['component1']);
                                }
                                ?>">
                            <?php
                            // Вывод ошибок
                            if (isset($_SESSION['errors']['component1'])) {
                                ?>
                                <p style="color: red"><?= $_SESSION['errors']['component1']; ?></p><?php
                                  unset($_SESSION['errors']['component1']);
                            }
                            ?>

                            <input type="text" name="component2" id="component2"
                                placeholder="Характеристика (2 компонент)" value="<?php
                                if (isset($_SESSION['component2'])) {
                                    echo $_SESSION['component2'];
                                    unset($_SESSION['component2']);
                                }
                                ?>">
                            <?php
                            // Вывод ошибок
                            if (isset($_SESSION['errors']['component2'])) {
                                ?>
                                <p style="color: red"><?= $_SESSION['errors']['component2']; ?></p><?php
                                  unset($_SESSION['errors']['component2']);
                            }
                            ?>

                            <input type="text" name="component3" id="component3"
                                placeholder="Характеристика (3 компонент)" value="<?php
                                if (isset($_SESSION['component3'])) {
                                    echo $_SESSION['component3'];
                                    unset($_SESSION['component3']);
                                }
                                ?>">
                            <?php
                            // Вывод ошибок
                            if (isset($_SESSION['errors']['component3'])) {
                                ?>
                                <p style="color: red"><?= $_SESSION['errors']['component3']; ?></p><?php
                                  unset($_SESSION['errors']['component3']);
                            }
                            ?>

                            <input type="text" name="component4" id="component4"
                                placeholder="Характеристика (4 компонент)" value="<?php
                                if (isset($_SESSION['component4'])) {
                                    echo $_SESSION['component4'];
                                    unset($_SESSION['component4']);
                                }
                                ?>">
                            <?php
                            // Вывод ошибок
                            if (isset($_SESSION['errors']['component4'])) {
                                ?>
                                <p style="color: red"><?= $_SESSION['errors']['component4']; ?></p><?php
                                  unset($_SESSION['errors']['component4']);
                            }
                            ?>
                            <button type="submit">Опубликовать</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--ADMIN-->

    <script src="assets/js/burger.js"></script>
</body>

</html>