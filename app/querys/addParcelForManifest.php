<?php

	require_once '../dataBase/connectDB.php';

	$manifest = trim($_GET['manifest']);
	$track = trim($_GET['track']);

	// Меняем статус посылки на "Отправлена в страну назначения"
	$sql = 'UPDATE dispatch SET status = "Отправлена в страну назначения" WHERE qr_name = "'.$track.'"';
	$pdo->query($sql);
	
	// Добавляем посылку в манифест
	$sqlAddTrack = 'UPDATE dispatch SET manifest = "'.$manifest.'" WHERE qr_name = "'.$track.'"';
	$res = $pdo->query($sqlAddTrack);

	if($res) {
		header('Location: ../../auth/warehouse.php');
	} else {
		echo 'Произошла ошибка';
	}

