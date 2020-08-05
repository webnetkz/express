<?php
 
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	$selectLastManifest = 'SELECT qr_name FROM manifests ORDER BY qr_name DESC LIMIT 1 ';
	$resManifest = $pdo->query($selectLastManifest);
	$resManifest = $resManifest->fetch(PDO::FETCH_ASSOC);

	$newManifest = ++$resManifest['qr_name'];