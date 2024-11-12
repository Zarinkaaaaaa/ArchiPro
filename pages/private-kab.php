<?php

global $database;
// Получение пользователя по id

// Получаем id пользователя из $_GET запроса
if (isset($_GET['page']) and $_GET['page'] === 'private-kab') {

    // Получаем id
    $user = getUser();

} else {

    die('404. Page not found');

}

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
    <!--PRIVATE-->
    <div class="private">
        <div class="content">
            <div class="private-block">
                <div class="private-block-title">
                    <h2>Личный кабинет</h2>
                    <div class="private-block-title-text">
                        <p>ИМЕННО ЗДЕСЬ, ТОЛЬКО ВЫ УВИДИТЕ СВОЙ ПРОЕКТ<br>
                            С АКТУАЛЬНЫМИ ВИЗУАЛИЗАЦИЯМИ И ПРОЕКТНУЮ ДОКУМЕНТАЦИЮ.</p>
                        <img src="assets/media/private-kab/Line.png" alt="#">
                    </div>
                </div>
                <div class="private-block-info">
                    <h3>Личные данные</h3>
                    <form action="actions/update-user.php"  method="post" >
                        <input type="hidden" name="id" value="<?= $user['id'] ?>">
                        <input type="text" name="name" placeholder="Имя" value="<?=($user['name'])?>">
                        <input type="text" name="fullname" placeholder="Фамилия"  value="<?=($user['fullname']) ?>">
                        <input type="text" name="email" placeholder="Почта" autofocus value="<?=($user['email']) ?>">
                        <button style="background:none; border:none; text-decoration: underline; font-size:22px; width:130px" type="submit">Изменить</button>
                    </form>
                </div>
                <div class="private-block-projects">
                    <h2>Ваши проекты</h2>
                    <div class="private-kab-projects">
                        <div class="private-block-projects-left">
                            <button>Последние</button>
                            <div class="private-block-projects-img">
                                <img class="private-img-glav" src="assets/media/private-kab/private-img1.png" alt="#">
                                <div class="private-block-projects-img-text">
                                    <div class="private-text-part">
                                        <p class="light">Местоположение</p>
                                        <p>Москва</p>
                                    </div>
                                    <img src="assets/media/private-kab/Line-small.png" alt="#">
                                    <div class="private-text-part">
                                        <p class="light">Завершение</p>
                                        <p>2023</p>
                                    </div>
                                    <img src="assets/media/private-kab/Line-small.png" alt="#">
                                    <div class="private-text-part">
                                        <p class="light">Пeриод</p>
                                        <p>1 год</p>
                                    </div>
                                </div>
                            </div>
                            <div class="private-projects-media">
                                <img src="assets/media/private-kab/private-img2.png" alt="#">
                                <img src="assets/media/private-kab/private.img3.png" alt="#">
                            </div>
                        </div>

                        <div class="private-block-projects-right">
                            <h3>"The Escape"</h3>
                            <p>"The Escape" сочетает современный дизайн с природой, создавая уединенное место,
                                которое омолаживает и вдохновляет.</p>
                            <h3>Итоговая стоимость проeкта </h3>
                            <p class="private-price">20 млн ₽</p>
                            <div class="private-documents">
                                <h3>Документация</h3>
                                <div class="private-document">
                                    <p>Тз на проeктированиe</p>
                                    <img src="assets/media/private-kab/Arrow.png" alt="#">
                                </div>
                                <div class="private-document">
                                    <p>Этапы проeктирования</p>
                                    <img src="assets/media/private-kab/Arrow.png" alt="#">
                                </div>
                                <div class="private-document">
                                    <p>Технико-экономическое обоснование (ТЭО)</p>
                                    <img src="assets/media/private-kab/Arrow.png" alt="#">
                                </div>
                                <div class="private-document">
                                    <p>Рабочая документация</p>
                                    <img src="assets/media/private-kab/Arrow.png" alt="#">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="private-open">Посмотреть все проекты</button>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--PRIVATE-->

    <script src="assets/js/burger.js"></script>
</body>

</html>