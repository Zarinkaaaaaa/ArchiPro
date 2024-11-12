<?php

session_start();

require_once 'database/database.php';

require_once 'functions/functions.php';

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
    <?php include 'components/header.php' ?>

    <?php
    if (isset($_GET['page'])) {
        if ($_GET['page'] === 'register')
            include 'pages/register.php';
        else if ($_GET['page'] === 'entry')
            include 'pages/entry.php';
        else if ($_GET['page'] === 'about-us')
            include 'pages/about-us.php';
        else if ($_GET['page'] === 'admin')
            include 'pages/admin.php';
        else if ($_GET['page'] === 'admin-uslugi')
            include 'pages/admin-uslugi.php';
        else if ($_GET['page'] === 'admin-add')
            include 'pages/admin-add.php';
        else if ($_GET['page'] === 'oform')
            include 'pages/oform.php';
        else if ($_GET['page'] === 'private-kab')
            include 'pages/private-kab.php';
        else if ($_GET['page'] === 'project_1')
            include 'pages/project_1.php';
        else if ($_GET['page'] === 'project-2')
            include 'pages/project-2.php';
        else if ($_GET['page'] === 'project-3')
            include 'pages/project-3.php';
        else if ($_GET['page'] === 'project-4')
            include 'pages/project-4.php';
        else if ($_GET['page'] === 'tovar')
            include 'pages/tovar.php';
        else if ($_GET['page'] === 'uslugi')
            include 'pages/uslugi.php';
        else if ($_GET['page'] === 'edit')
            include 'pages/edit.php';
        else {
            echo '404. error';
        }
    } else {
        include 'pages/start.php';
    }
    ?>

    <?php include 'components/footer.php' ?>
</body>

</html>