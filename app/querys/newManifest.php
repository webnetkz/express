<?php

	require_once '../dataBase/connectDB.php';
	require_once '../libs/express/lastManifest.php';

	if(isset($_POST['newManifest'])) {
		$fromDate = trim($_POST['fromDate']);
		$fromDate = htmlentities($fromDate);
		
		$toCountry = trim($_POST['toCountry']);
		$toCountry = htmlentities($toCountry);
		
		$toCity = trim($_POST['toCity']);
		$toCity = htmlentities($toCity);
		
		$seal = trim($_POST['seal']);
		$seal = htmlentities($seal);
		
		$qr = $newManifest;
		
		$sql = 'INSERT INTO manifests(qr_name, fromDate, country, city, seal) VALUES("'.$qr.'", "'.$fromDate.'", "'.$toCountry.'", "'.$toCity.'", "'.$seal.'")';
		$res = $pdo->query($sql);
		header('Location: ../../auth/warehouse.php');
	} else {
		header('Location: ../../auth/warehouse.php');
	}


	