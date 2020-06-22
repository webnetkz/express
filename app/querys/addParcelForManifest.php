<?php

	require_once '../dataBase/connectDB.php';
	require_once '../libs/dev.php';

	$manifest = trim($_GET['manifest']);
	$track = trim($_GET['track']);


	$sqlAddTrack = 'UPDATE dispatch SET manifest = "'.$manifest.'" WHERE qr_name = "'.$track.'"';
	$res = $pdo->query($sqlAddTrack);

	if($res) {
		header('Location: ../../auth/warehouse.php');
	} else {
		echo 'Произошла ошибка';
	}

