<?php
 
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	$selectLastTracking = 'SELECT qr_name FROM dispatch ORDER BY qr_name DESC LIMIT 1 ';
	$resTracking = $pdo->query($selectLastTracking);
	$resTracking = $resTracking->fetch(PDO::FETCH_ASSOC);

	$newTrack = ++$resTracking['qr_name'];