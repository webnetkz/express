<?php

	require_once '../dataBase/connectDB.php';
	// Генерация следующего кода после последнего из базы
	require_once '../libs/express/lastTrack.php';

	$sql = 'INSERT INTO dispatch(qr_name, fromDate, fromCountrie, fromCity, fromContacts, fromPhone, toCountrie, toCity, toAdres, toContacts, toPhone, mass, status, `description`, price, pack, photo, kuaidi, obl, login) VALUES("'.$newTrack.'", "'.$_GET['fromDate'].'", "'.$_GET['fromCountrie'].'", "'.$_GET['fromCity'].'", "'.$_GET['fromContacts'].'", "'.$_GET['fromPhone'].'", "'.$_GET['toCountrie'].'", "'.$_GET['toCity'].'", "'.$_GET['toAdres'].'", "'.$_GET['toContacts'].'", "'.$_GET['toPhone'].'", "'.$_GET['mass'].'", "'.$_GET['status'].'",  "'.$_GET['description'].'", "'.$_GET['price'].'", "'.$_GET['pack'].'", "'.$_GET['photo'].'", "'.$_GET['kuaidi'].'", "'.$_GET['obl'].'", "'.$_GET['login'].'")';
	$res = $pdo->query($sql);
	
	header('Location: https://webnetads.kz/sign.php?login='.$_GET['login'].'');