<?php

	require_once '../dataBase/connectDB.php';
	$track = $_GET['track'];

	// Меняем статус посылки на "Прибыла на склад/Ожидает оплаты"
	$sql = 'UPDATE dispatch SET status = "Прибыла на склад/Ожидает оплаты" WHERE qr_name = "'.$track.'"';
	$pdo->query($sql);
	
	header("Location: ../../auth/qrcode.php?track=$track");