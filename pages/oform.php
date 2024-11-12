<?php

global $database;
if (isset($_GET['id']) && isset($_GET['page']) && $_GET['page'] == 'oform') {
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
    <!--OFORM-->
    <div class="oform">
        <div class="content">
            <div class="oform-block">
                <a href="?page=tovar" class="kroshki">Главная / Услуги <span href="?page=uslugi" class="bold">/ Полный
                        дизайн-проект</span></a>
                <div class="oform-block-content">
                    <div class="oform-block-media">
                    <img src="<?php echo is_null($uslug['image']) ? 'assets/media/tovar/tovar-top.png' : $uslug['image']; ?>"
                            alt="#">
                    </div>
                    <div class="oform-block-text">
                        <h2><?= $uslug['name']?></h2>
                        <p>Рассчитать стоимость <?= $uslug['name']?></p>
                        <form>
                            <input type="text" placeholder="Имя и фамилия">
                            <input type="text" placeholder="Номер телефона">
                            <div class="oform-choose">
                                <p>Выбeритe тип помeщeния</p>
                                <img src="assets/media/oform/Polygon.png" alt="#">
                            </div>
                            <textarea cols="60" rows="9">Напишите пожалуйста площадь объекта и город</textarea>
                            <button>Отправить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--OFORM-->
    
    <script src="assets/js/burger.js"></script>
</body>

</html>