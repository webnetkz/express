<?php

    require_once '../dataBase/connectDB.php';

    $sql = 'SELECT `name` FROM agents';
    $result = $pdo->query($sql);
    $result = $result->fetchAll(PDO::FETCH_ASSOC);

    foreach($result as $key => $value) {
        echo $value['name'].',';
    }