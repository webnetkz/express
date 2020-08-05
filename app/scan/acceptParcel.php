<?php
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	
	session_start();
	require_once '../dataBase/connectDB.php';

	$track = trim($_GET['track']);

	$sqlTrack = 'SELECT * FROM dispatch WHERE qr_name = "'.$track.'"';
	$resTrack = $pdo->query($sqlTrack);
	$resTrack = $resTrack->fetch(PDO::FETCH_ASSOC);

	if($resTrack) {
		
		$sql = 'UPDATE dispatch SET status = "Прибыла в сортировочный центр страны назначения" WHERE qr_name = "'.$track.'"';
		$res = $pdo->query($sql);
		
		if($res) {
			if($resTrack['status'] == "Прибыла в сортировочный центр страны назначения") {
				$_SESSION['msg'] = 'Посылка ранее была принята складом!';
				header('Location: ../../auth/acceptParcelsQR.php');
			} else {
				$_SESSION['msg'] = 'Посылка принята, статус сменен!';
				header('Location: ../../auth/acceptParcelsQR.php');
			}
		} else {
			$_SESSION['msg'] = 'Произошла обишка!';
			header('Location: ../../auth/acceptParcelsQR.php');
		}
		
	} else {
		$_SESSION['msg'] = 'Трек номер не найден!';
		header('Location: ../../auth/acceptParcels.php');
	}

