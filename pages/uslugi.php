<?php
global $database;

$sql = "SELECT * FROM `uslugi`";

$query = $database->query($sql);

$uslugi = $query->fetchAll(PDO::FETCH_ASSOC);

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
    <!--USLUGI-->
    <div class="uslugi">
        <div class="content">
            <div class="uslugi-block">
                <a href="index.php" class="kroshki">Главная <span href="?page=uslugi" class="bold">/ Услуги</span></a>
                <img class="uslugi-img-glav" src="assets/media/uslugi/uslugi-glav.png" alt="#">
                <div class="uslugi-content">
                    <h2>Услуги</h2>
                    <div class="uslugi-cards">
                        <?php foreach ($uslugi as $uslug) { ?>
                            <div class="uslugi-card">
                                <img src="<?php echo is_null($uslug['image']) ? 'assets/media/uslugi/' : $uslug['image']; ?>"
                                    alt="#">
                                <div class="uslugi-card-text">
                                    <h3><?= $uslug['name'] ?></h3>
                                    <p>Стоимость — <?= $uslug['price']?>руб./м.кв.</p>
                                    <a href="?page=tovar&id=<?= $uslug['id'] ?>">Смотреть подробнее</a>
                                    <a class="btn-black" href="?page=oform&id=<?= $uslug['id'] ?>">Оформить</a>
                                </div>
                            </div>
                        <?php }
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--USLUGI-->

    <!--CONTACTS-->
    <div class="contacts">
        <div class="content">
            <div class="contacts-block">
                <div class="contacts-left">
                    <div class="revolution-title">
                        <img src="assets/media/revolution/revolution-ellipse.png" alt="#">
                        <h2>Контакты</h2>
                    </div>
                    <div class="contacts-info">
                        <div class="contacts-info-text">
                            <a href="tel:+7(987)655-54-65">Тeлeфон :
                                <br> <span class="bold"> + 7(987)655-54-65</span></a>
                            <a href="mail:Archipro@gmail.com">Почта :
                                <br><span class="bold">Archipro@gmail.com</span> </a>
                            <a href="#">Адрeс :
                                <br><span class="bold">г. Казань, ул. Гоголя, д. 3 </span> </a>
                        </div>
                        <img src="assets/media/contacts/map.png" alt="#">
                    </div>
                </div>
                <div class="contacts-right">
                    <div class="contacts-right-title">
                        <p>Свяжитесь с нами любым удобным для Вас способом</p>
                        <img src="assets/media/contacts/contacts-phone.png" alt="#">
                    </div>
                    <div class="contacts-form">
                        <input type="text" placeholder="Имя">
                        <input type="text" placeholder="Номер телефона">
                        <textarea name="text" id="" cols="20" rows="6">Сообщение</textarea>
                        <button>Заказать звонок</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--CONTACTS-->

    <script src="assets/js/burger.js"></script>
</body>

</html>