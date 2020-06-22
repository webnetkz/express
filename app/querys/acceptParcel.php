<?php

	require_once '../dataBase/connectDB.php';

	$track = trim($_GET['track']);

	$sql = 'UPDATE dispatch SET status = "Прибыла в сортировочный центр страны назначения" WHERE qr_name = "'.$track.'"';
	$res = $pdo->query($sql);

	if($res) {
		header('Location: ../../auth/');
	} else {
		echo 'Произошла обишка';
	}