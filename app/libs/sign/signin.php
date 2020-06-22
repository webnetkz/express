<?php

    session_start();
    require_once '../../dataBase/connectDB.php';

    $login = trim($_POST['login']);
    $login = htmlentities($login);

    $pass = trim($_POST['pass']);
    $pass = htmlentities($pass);

    $sql = 'SELECT * FROM users WHERE name = "'.$login.'"';
    $res = $pdo->query($sql);
    $res = $res->fetchAll(PDO::FETCH_ASSOC);

    if($pass == $res['pass']) {
        $_SESSION['name'] = $login;
        header('Location: ../../../auth/');
    } else {
        header('Location: ../../../index.php');
    }