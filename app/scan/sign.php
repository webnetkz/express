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
		session_start();
		$_SESSION['name'] = $name;
        echo '<meta http-equiv="refresh" content="0;URL=auth/index.php" />';
    }

