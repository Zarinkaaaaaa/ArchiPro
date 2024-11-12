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


                <div class="admin-panel">
                    <h2>Панель администратора</h2>
                    <div class="admin-panel-info">
                        <h3>Услуги</h3>
                        <div class="admin-panel-people">
                            <?php foreach ($uslugi as $uslug) { ?>
                                <div class="admin-panel-pers">
                                    <?php $uslug['id'] ?>
                                    <p><?= $uslug['name'] ?></p>
                                    <p><?= $uslug['price'] ?></p>
                                    <a style="text-decoration:underline" href="?page=edit&id=<?=$uslug['id']?>">Редактировать</a>
                                    <form action="actions/delete.php" method="post">
                                        <input type="hidden" name="id" value="<?=$uslug['id']?>">
                                        <button style="border:none; background:none; font-size:22px" type="submit">Удалить</button>
                                    </form>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--ADMIN-->

    <script src="assets/js/burger.js"></script>
</body>

</html>