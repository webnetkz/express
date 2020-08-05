<?php
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	
	session_start();
	require_once '../app/dataBase/connectDB.php';

	$track = trim($_GET['track']);

	$sqlTrack = 'SELECT * FROM dispatch WHERE kuaidi = "'.$track.'"';
	$resTrack = $pdo->query($sqlTrack);
	$resTrack = $resTrack->fetch(PDO::FETCH_ASSOC);

	if($resTrack) {
		
		$sql = 'UPDATE dispatch SET status = "Прибыла на склад/Ожидает оплаты" WHERE kuaidi = "'.$track.'"';
		$res = $pdo->query($sql);
		
		if($res) {
			if($resTrack['status'] == "Прибыла на склад/Ожидает оплаты") {
				$_SESSION['msg'] = 'Посылка принята!';
				header('Location: parcel.php?track='.$resTrack['qr_name']);
			} else {
				$_SESSION['msg'] = 'Посылка принята, статус сменен!';
				header('Location: parcel.php?track='.$resTrack['qr_name']);
			}
		} else {
			$_SESSION['msg'] = 'Произошла обишка!';
			header('Location: acceptParcelsBARCODE.php?');
		}
		
	} else {
		$_SESSION['msg'] = 'KUAIDI номер не найден!';
		header('Location: acceptParcelsBARCODE.php');
	}

