<?php

    // Данные для подключения к базе данных
    $driver = 'mysql';
    $host = 'srv-pleskdb28.ps.kz:3306';
    $db_name = 'webnetkz_express';
    $db_user = 'webnetkz_e';
    $db_pass = '!36Aksz1';
    $charset = 'utf8';
    $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

    try{
        // Создание обьекта PDO и передача данных
        // для подключения в конструктор класса
        $pdo = new PDO(
                        "$driver:host=$host;
                        dbname=$db_name;
                        charset=$charset",
                        $db_user,
                        $db_pass,
                        $options
                    );
    // Отладка ошибок подключения
    }catch(PDOException $e) {
        die('Ошибка подключения к базе данных'.$e);
    }

    /*
    $host = 'srv-pleskdb28.ps.kz:3306';
    $db_name = 'webnetkz_express';
    $db_user = 'webnetkz_e';
    $db_pass = '!36Aksz1';
    */