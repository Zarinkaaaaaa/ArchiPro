<?php

global $database;
if (isset($_GET['id']) && isset($_GET['page']) && $_GET['page'] == 'tovar') {
    $sql = "SELECT * FROM uslugi WHERE id = {$_GET['id']}";
    $query = $database->query($sql);
    $uslug = $query->fetch(PDO::FETCH_ASSOC);

    if (!$uslug) {
        die('не найден');
    }
} else {
    echo '404 error';
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
    <!--TOVAR-->
    <div class="tovar">
        <div class="content">
            <div class="tovar-block">
                <a href="?page=uslugi" class="kroshki">Главная / Услуги <span href="?page=tovar" class="bold">/ Полный
                        дизайн-проект</span></a>
                <div class="tovar-top">
                    <img src="<?php echo is_null($uslug['image']) ? 'assets/media/tovar/tovar-top.png' : $uslug['image']; ?>"
                        alt="#">
                    <div class="tovar-top-content">
                        <div class="tovar-top-content-title">
                            <h2><?= $uslug['name'] ?></h2>
                            <p>Стоимость — <?= $uslug['price'] ?>руб./м.кв.</p>
                        </div>

                        <div class="tovar-top-content-text">
                            <p><?= $uslug['opisanie'] ?></p>
                            <a href="?page=oform&id=<?= $uslug['id'] ?>">Оформить</a>
                            <p class="tovar-light">*просчет коммерческих помещений производится индивидуально;</p>
                        </div>
                    </div>
                </div>

                <div class="tovar-mood">
                    <p><?= $uslug['component1'] ?> </p>
                    <img src="assets/media/tovar/Line.png" alt="#">
                    <p class="mood-big"><?= $uslug['component2'] ?></p>
                    <img class="media-none" src="assets/media/tovar/Line.png" alt="#">
                    <p><?= $uslug['component3'] ?></p>
                    <img src="assets/media/tovar/Line.png" alt="#">
                    <p class="mood-right"><?= $uslug['component4'] ?></p>
                </div>

                <div class="tovar-experience">
                    <div class="tovar-experience-title">
                        <h2>Опыт 65+ проектов</h2>
                        <p>ВНИМАНИЕ К ДЕТАЛЯМ</p>
                        <img src="<?php echo is_null($uslug['image']) ? 'assets/media/tovar/tovar-top.png' : $uslug['image']; ?>"
                            alt="#">
                    </div>

                    <div class="tovar-experience-content">
                        <img src="assets/media/tovar/line-2.png" alt="#">
                        <div class="tovar-experience-text">
                            <div class="tovar-experience-text-left">
                                <p><?= $uslug['text'] ?></p>
                            </div>
                            <!-- <div class="tovar-experience-text-left">
                                    <p>1. Индивидуальная эргономика вашего жилья;</p>
                                    <p>2. Комплект строительных чертежей;</p>
                                    <p>3. Комплектация отделочных материалов;</p>
                                </div>
                                <div class="tovar-experience-text-right">
                                    <p class="tovar-two">4. 3Д визуализации и виртуальный тур;</p>
                                    <p>5. Чертежи индивидуальной мебели;</p>
                                    <p>6. Личный кабинет на нашем сайте;</p>
                                </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--TOVAR-->

    <script src="assets/js/burger.js"></script>
</body>

</html>