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
    <!--ENTRY-->
    <div class="entry">
        <div class="content">
            <div class="entry-block">
                <img src="assets/media/entry/logo.png" alt="#">

                <form style="display:flex; flex-direction:column; align-items:center; gap:33px" action="actions/login.php" method="post">
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
                    <?php
                    // Вывод ошибок
                    if (isset($_SESSION['errors']['invalid_credentials'])) {
                        ?>
                        <p style="color: red"><?= $_SESSION['errors']['invalid_credentials']; ?></p><?php
                        unset($_SESSION['errors']['invalid_credentials']);
                    }
                    ?>
                    
                    <button class="entry-btn" type="submit">Войти</button>
                    <a href="?page=register">Зарегистрироваться</a>
                </form>
            </div>
        </div>
    </div>
    <!--ENTRY-->

    <script src="assets/js/burger.js"></script>
</body>

</html>