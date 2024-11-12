<?php

require_once '../database/database.php';
global $database;

if(isset($_POST)){

    $id = $_POST['id'];
    
    $sql = "DELETE FROM uslugi WHERE `uslugi`.`id` = $id";

    $query = $database->query($sql);

    ?><script>alert('Вы успешно удалили услугу с id: ' + <?=$id?>)</script><?php

    ?><script>document.location.href="../index.php?page=admin-uslugi"</script><?php
}