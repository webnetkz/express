<?php

    require_once '../dataBase/connectDB.php';

    $sql = 'SELECT `name` FROM items';
    $result = $pdo->query($sql);
    $result = $result->fetchAll(PDO::FETCH_ASSOC);

    foreach($result as $key => $value) {
        echo $value['name'].',';
    }
