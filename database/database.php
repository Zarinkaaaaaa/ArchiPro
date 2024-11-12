<?php

try {
    $dsn = 'mysql:host=localhost;dbname=kursach';

    $database = new PDO($dsn, 'root', '');
} catch (PDOException $e) {

    echo "Ошибка подключения бд" . $e->getMessage();
}

