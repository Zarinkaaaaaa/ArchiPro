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
    <!--REGISTER-->
    <div class="entry">
        <div class="content">
            <div class="entry-block register">
                <img src="assets/media/entry/logo.png" alt="#">

                <form style="display:flex; flex-direction:column; align-items:center; gap:33px"
                    action="actions/register.php" method="post">
                    <input type="text" name="name" placeholder="Имя" class="input" value="<?php
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


                    <input type="text" name="fullname" placeholder="Фамилия" class="input" value="<?php
                    if (isset($_SESSION['fullname'])) {
                        echo $_SESSION['fullname'];
                        unset($_SESSION['fullname']);
                    }
                    ?>">
                    <?php
                    // Вывод ошибок
                    if (isset($_SESSION['errors']['fullname'])) {
                        ?>
                        <p style="color: red"><?= $_SESSION['errors']['fullname']; ?></p><?php
                          unset($_SESSION['errors']['fullname']);
                    }
                    ?>


                    <input type="text" name="email" placeholder="Email" class="input" value="<?php
                    // Вывод прежнего значения в поле
                    if (isset($_SESSION['email'])) {
                        echo $_SESSION['email'];
                        unset($_SESSION['email']);
                    }
                    ?>">
                    <?php
                    // Вывод ошибок
                    if (isset($_SESSION['errors']['email'])) {
                        ?>
                        <p style="color: red"><?= $_SESSION['errors']['email']; ?></p><?php
                          unset($_SESSION['errors']['email']);
                    }
                    ?>


                    <input type="password" name="password" placeholder="Введите пароль" class="input">
                    <?php
                    // Вывод ошибок
                    if (isset($_SESSION['errors']['password'])) {
                        ?>
                        <p style="color: red"><?= $_SESSION['errors']['password']; ?></p><?php
                          unset($_SESSION['errors']['password']);
                    }
                    ?>


                    <input type="password" name="password_r" placeholder="Подтвердите пароль" class="input">
                    <?php
                    // Вывод ошибок
                    if (isset($_SESSION['errors']['password_rep'])) {
                        ?>
                        <p style="color: red"><?= $_SESSION['errors']['password_rep']; ?></p><?php
                          unset($_SESSION['errors']['password_rep']);
                    }
                    ?>

                    <button type="submit" class="entry-btn">Зарегистрироваться</button>
                    <a href="?page=entry">Войти</a>
                </form>
            </div>
        </div>
    </div>
    <!--REGISTER-->

    <script src="assets/js/burger.js"></script>
</body>

</html>