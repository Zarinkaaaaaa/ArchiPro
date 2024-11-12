<?php
// session_start();

// global $database;

// $roles = getRoles2();

// // Создаем массив для сбора фильтров
// $filters = [];

// // Добавляем фильтр
// if (!empty($_GET['role']))
//     $filters['projects_roles_id'] = $_GET['role'];

// // Получение пользователей
// $projects = getFilteredRecords2('projects', $filters);
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
                <h2>Проекты 2022 года</h2>
                <div class="year-group">
                    <p>до 2021</p>
                    <p>2022</p>
                    <p>2023</p>
                    <p>2024</p>
                </div>
            </div>
        </div>
        <div class="projects-page-line">
            <img class="none iphone-none" src="assets/media/projects-page/line-2-ipad.png" alt="#">
            <img class="none ipad-none" src="assets/media/projects-page/line-2-iphone.png" alt="#">
            <img class="media-none" src="assets/media/projects-page/line-2.png" alt="#">
            <a class="projects-page-ellipse-1 black page2" href="?page=project_1"></a>
            <a class="projects-page-ellipse-2 black page2" href="?page=project-2"></a>
            <a class="projects-page-ellipse-3 page2" href="?page=project-3"></a>
            <a class="projects-page-ellipse-4 page2" href="?page=project-4"></a>
        </div>
        <div class="content">
            <div class="projects-page-content">
                <div class="projects-page-filter">
                    <a href="#" class="everything">Все</a>
                    <a href="#">Жилые здания</a>
                    <a href="#">Интерьеры</a>
                    <a href="#">Архитектура</a>
                </div>
                <?php
                global $database;

                $sql = "SELECT * FROM `projects-2`";
                
                $query = $database -> query($sql);

                $projects = $query->fetchAll(PDO::FETCH_ASSOC);

                ?>
                <div class="projects-page-cards">
                    <?php foreach ($projects as $project) {?>
                        <div class="projects-page-card">
                            <p><?php $project['id'] ?></p>
                            <img src="<?php echo is_null($project['image']) ? 'assets/media/projects-page/' : $project['image']; ?>"
                                alt="#">
                            <p><?= $project['name'] ?></p>
                            <p class="projects-name"><?= $project['text'] ?></p>
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