<?php

	require_once '../dataBase/connectDB.php';

	if(isset($_POST['newManifest'])) {
		$fromDate = trim($_POST['fromDate']);
		$fromDate = htmlentities($fromDate);
		
		$toCountry = trim($_POST['toCountry']);
		$toCountry = htmlentities($toCountry);
		
		$toCity = trim($_POST['toCity']);
		$toCity = htmlentities($toCity);
		
		$qr = trim($_POST['qr']);
		$qr = htmlentities($qr);
		
		$seal = trim($_POST['seal']);
		$seal = htmlentities($seal);
		
		
		//$sql = 'INSERT INTO `manifests`(`qr_code`, `fromDate`, `country`, `city`, `seal`) VALUES("'.$qr.'", "'.$fromDate.'", "'.$toCountry.'", "'.$toCity.'", "'.$seal.'",)';
		$sql = 'INSERT INTO manifests(qr_code, fromDate, country, city, seal) VALUES("'.$qr.'", "'.$fromDate.'", "'.$toCountry.'", "'.$toCity.'", "'.$seal.'")';
		$res = $pdo->query($sql);
		header('Location: ../../auth/warehouse.php');
	} else {
		header('Location: ../../auth/warehouse.php');
	}


	