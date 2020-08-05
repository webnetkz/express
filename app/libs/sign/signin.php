<?php

    session_start();
    require_once '../../dataBase/connectDB.php';

	if(isset($_POST['login']) && isset($_POST['pass'])) {
		$login = trim($_POST['login']);
		$login = htmlentities($login);

		$pass = trim($_POST['pass']);
		$pass = htmlentities($pass);

		$sql = 'SELECT * FROM users WHERE name = "'.$login.'"';
		$res = $pdo->query($sql);
		$res = $res->fetch(PDO::FETCH_ASSOC);

		if($pass == $res['pass']) {
			$_SESSION['name'] = $login;
			header('Location: ../../../auth/');
		} else {
			header('Location: ../../../index.php');
		}
	} else {
		header('Location: ../../../index.php');
	}
    