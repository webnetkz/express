<?php

	session_start();
	require_once '../app/dataBase/connectDB.php';

	if(empty($_SESSION['name'])) {
		header('../index.php');
	}

	$sql = 'SELECT * FROM users WHERE name = "'.$_SESSION['name'].'"';
	$res = $pdo->query($sql);
	$res = $res->fetch(PDO::FETCH_ASSOC);	

	$_SESSION['privileges'] = $res['role'];