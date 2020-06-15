<?php

    require_once '../dataBase/connectDB.php';

    $name = $_POST['name'];

    $sql = 'SELECT * FROM users WHERE name = "'.$name.'"';
    $result = $pdo->query($sql);
    $result = $result->fetch(PDO::FETCH_ASSOC);

    if(!$result) {
        echo 'Вы не зарегистрированы!';
    }

    if($result) {
        header('Location: ../../index.php');
    }

