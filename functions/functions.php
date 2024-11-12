<?php

const adminId = 2;

function getUser()
{
    global $database;

    $sql = 'SELECT * FROM `users` WHERE id = :id';

    $prepare = $database->prepare($sql);

    $prepare->execute([
        ':id' => $_SESSION['user']['id']
    ]);
    
    return $prepare->fetch(PDO::FETCH_ASSOC);
}

function isAdmin()
{


}

function getUslugi()
{
    global $database;
    $sql = 'SELECT * FROM `uslugi` WHERE id = :id';
    $prepare = $database->prepare($sql);

    $prepare->execute([
        ':id' => $_SESSION['uslugi']['id']
    ]);
    
    return $prepare->fetchAll(PDO::FETCH_ASSOC);
}

function dd($value)
{
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    die();
}

function dump($value)
{
    echo '<pre>';
    print_r($value);
    echo '</pre>';
}

function sortFiles(array $files)
{
    $sortedFiles = [];

    foreach ($files as $key => $values) {
        foreach ($values as $index => $value) {
            $sortedFiles[$index][$key] = $value;
        }
    }

    return $sortedFiles;
}

function validateFile($file, $rules)
{
    $errors = [];

    if($file['size'] > 1024 * 1024 * $rules['maxSize']) $errors[] = 'Максимальный размер картинки: ' . 'size';

    if(!in_array($file['type'], $rules['types'])) $errors[] = 'Неверный формат картинки.';

    if($file['error'] !== UPLOAD_ERR_OK) $errors[] = 'Файл поврежден.';
    
    return $errors;
}

// Удаление файла
function deleteFile($filePath)
{
    if(file_exists($filePath)) {
        unlink($filePath);
        return true;
    }

    return false;
}

// Загрузка файла
function uploadFile($file, $uploadPath)
{
    // Расширение файла
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);

    // Название файла
    // $filename = pathinfo($file['name'], PATHINFO_FILENAME);

    // Формируем название для файла
    $fileName = uniqid() . '.' . $extension;

    // Формируем путь к нашему файлу
    $path = $uploadPath . $fileName;

    // Загружаем файл
    if(!move_uploaded_file($file['tmp_name'], '../' . $path)) {
        // Если файл не загрузился, то мы возвращаем false
        return false;
    }

    // Иначе возвращаем путь к картинке
    return $path;
}

function getRoles()
{
    global $database;

    $sql = 'SELECT * FROM `projects_roles`';

    $prepare = $database->prepare($sql);

    $prepare->execute();

    return $prepare->fetchAll(PDO::FETCH_ASSOC);
}

function getRoles2()
{
    global $database;

    $sql = 'SELECT * FROM `projects_roles`';

    $prepare = $database->prepare($sql);

    $prepare->execute();

    return $prepare->fetchAll(PDO::FETCH_ASSOC);
}

function getUsersByRoleId($id)
{
    global $database;

    $sql = 'SELECT * FROM `projects` WHERE projects_roles_id = :id';

    $prepare = $database->prepare($sql);

    $prepare->execute([
        ':id' => $id
    ]);

    return $prepare->fetchAll(PDO::FETCH_ASSOC);
}


function getUsersByRoleId2($id)
{
    global $database;

    $sql = 'SELECT * FROM `projects-2` WHERE projects_roles_id = :id';

    $prepare = $database->prepare($sql);

    $prepare->execute([
        ':id' => $id
    ]);

    return $prepare->fetchAll(PDO::FETCH_ASSOC);
}

function getFilteredRecords($table, $filters = [])
{
    // Получаем глобальный экземпляр объекта $database
    global $database;

    // Начальное построение SQL-запроса
    $sql = "SELECT * FROM $table ";

    // Параметры для сбора ключей для защиты от sql-инъекций
    $params = [];

    // Если есть фильтры, добавляем их в SQL-запрос
    if (!empty($filters)) {

        // Условия
        $conditions = [];

        // Перебор фильтров
        foreach ($filters as $column => $value) {

            // Добавляем условие для каждого фильтра
            $conditions[] = "$column = :$column";

            // Сохраняем параметры для передачи в execute
            $params[":$column"] = $value;

        }

        // Функция implode в PHP объединяет элементы массива в строку, используя указанный разделитель.

        // Объединяем условия фильтрации в SQL-запрос
        $sql .= ' WHERE ' . implode(' AND ', $conditions);

    }

    // Подготовка запроса
    $prepare = $database->prepare($sql);

    // Выполнение запроса
    $prepare->execute($params);

    // Возвращаем результат
    return $prepare->fetchAll(PDO::FETCH_ASSOC);
}

function getFilteredRecords2($table, $filters = [])
{
    // Получаем глобальный экземпляр объекта $database
    global $database;

    // Начальное построение SQL-запроса
    $sql = "SELECT * FROM $table ";

    // Параметры для сбора ключей для защиты от sql-инъекций
    $params = [];

    // Если есть фильтры, добавляем их в SQL-запрос
    if (!empty($filters)) {

        // Условия
        $conditions = [];

        // Перебор фильтров
        foreach ($filters as $column => $value) {

            // Добавляем условие для каждого фильтра
            $conditions[] = "$column = :$column";

            // Сохраняем параметры для передачи в execute
            $params[":$column"] = $value;

        }

        // Функция implode в PHP объединяет элементы массива в строку, используя указанный разделитель.

        // Объединяем условия фильтрации в SQL-запрос
        $sql .= ' WHERE ' . implode(' AND ', $conditions);

    }

    // Подготовка запроса
    $prepare = $database->prepare($sql);

    // Выполнение запроса
    $prepare->execute($params);

    // Возвращаем результат
    return $prepare->fetchAll(PDO::FETCH_ASSOC);
}