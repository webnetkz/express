<?php

    require_once '../dataBase/connectDB.php';

    $scan = $_POST['scan'];

    $sql = 'SELECT * FROM dispatch WHERE qr_name = "'.$scan.'"';
    $result = $pdo->query($sql);
    $result = $result->fetch(PDO::FETCH_ASSOC);

    if(!$result) {
        echo 'Корреспонденция не найдена!';
    }

    if($result) {
        if($result['stat'] == 0) {
            $sqlNewStatus = 'UPDATE dispatch SET stat = 1 WHERE qr_name = "'.$scan.'"';
            $resultNewStatus = $pdo->query($sqlNewStatus);
            if($resultNewStatus !== false) {
                echo 'Корреспонденция принята!';
            }
        }
        if($result['stat'] == 1) {
            echo 'Корреспонденция уже была принята!';
        }
    }

