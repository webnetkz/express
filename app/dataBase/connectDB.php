<?php

    // Данные для подключения к базе данных
    $driver = 'mysql';
    $host = 'localhost';
    $db_name = 'easyfin';
    $db_user = 'root';
    $db_pass = '';
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
        die('Ошибка подключения к базе данных');
    }
