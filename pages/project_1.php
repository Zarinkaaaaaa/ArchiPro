<?php
session_start();

global $database;

$roles = getRoles();

// Создаем массив для сбора фильтров
$filters = [];

// Добавляем фильтр
if (!empty($_GET['role']))
    $filters['projects_roles_id'] = $_GET['role'];

// Получение пользователей
$projects = getFilteredRecords('projects', $filters);
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
    <!--PROJECTS-PAGE-->
    <div class="project-page">
        <div class="content">
            <div class="projects-page-title">
                <h2>Проекты 2021 года</h2>
                <div class="year-group">
                    <p>до 2021</p>
                    <p>2022</p>
                    <p>2023</p>
                    <p>2024</p>
                </div>
            </div>
        </div>
        <div class="projects-page-line">
            <img class="none iphone-none" src="assets/media/projects-page/line-ipad.png" alt="#">
            <img class="none ipad-none" src="assets/media/projects-page/line-iphone.png" alt="#">
            <img class="media-none" src="assets/media/projects-page/line.png" alt="#">
            <a class="projects-page-ellipse-1 black" href="?page=project_1"></a>
            <a class="projects-page-ellipse-2" href="?page=project-2"></a>
            <a class="projects-page-ellipse-3" href="?page=project-3"></a>
            <a class="projects-page-ellipse-4" href="?page=project-4"></a>
        </div>
        <div class="content">
            <div class="projects-page-content">
                <div class="projects-page-filter">
                    <a href="?page=project_1" class="everything <?php
                    // Добавляем активный класс, который будет перекрашывать кнопку
                    if (!isset($_GET['role']) || empty($_GET['role'])) {
                        echo 'bg-white text-black';
                    }
                    ?>">Все</a>
                    <?php
                    foreach ($roles as $role) { ?>
                        <a style="" href="?page=project_1&role=<?= $role['id'] ?>" class="button
                       <?php
                       // Добавляем активный класс, который будет перекрашывать кнопку
                       if (isset($_GET['role']) && !empty($_GET['role']) && $role['id'] == $_GET['role']) {
                           echo 'bg-white text-black';
                       }
                       ?>"><?= $role['name'] ?></a>
                    <?php }
                    ?>
                </div>
                <div class="projects-page-cards">
                    <?php foreach ($projects as $project) {

                        $sql = "SELECT * FROM `projects_roles` WHERE id = :id";
                        // Подготовка запроса
                        $prepare = $database->prepare($sql);
                        // Выполнение запроса с подставкой значений
                        $prepare->execute([
                            ':id' => $project['projects_roles_id']
                        ]);
                        // Получение роли
                        $role = $prepare->fetch(2); ?>
                        <div class="projects-page-card">
                            <img src="<?php echo is_null($project['image']) ? 'assets/media/projects-page/' : $project['image']; ?>"
                                alt="#">
                            <p><?= $project['name']?></p>
                            <p class="projects-name"><?= $project['text']?></p>
                        </div>
                    <?php } ?>
                </div>
                <a href="#" class="open-more">Посмотреть ещё</a>
            </div>
        </div>
    </div>
    <!--PROJECTS-PAGE-->

    <script src="assets/js/burger.js"></script>

</body>

</html>




<!-- <div class="projects-page-card">
                        <img src="assets/media/projects-page/photo-1.png" alt="#">
                        <p> Интерьеры</p>
                        <p class="projects-name">Квартира в ЖК «КРИСТАЛЛ»</p>
                    </div>
                    <div class="projects-page-card">
                        <img src="assets/media/projects-page/photo-2.png" alt="#">
                        <p> Интерьеры</p>
                        <p class="projects-name">Квартира Еропкинский</p>
                    </div>
                    <div class="projects-page-card">
                        <img src="assets/media/projects-page/photo-3.png" alt="#">
                        <p>Архитектура</p>
                        <p class="projects-name">Эскизный проeкт фасадов базы отдыха</p>
                    </div>
                    <div class="projects-page-card">
                        <img src="assets/media/projects-page/photo-4.png" alt="#">
                        <p>Жилые здания</p>
                        <p class="projects-name">Фасад загородного дома</p>
                    </div> -->