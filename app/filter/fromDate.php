<?php

	require_once '../dataBase/connectDB.php';

	$x = $_POST['fromDate'];

	$sql = 'SELECT * FROM dispatch WHERE fromDate = "'.$x.'"';
	$res = $pdo->query($sql);
	$res = $res->fetchAll(PDO::FETCH_ASSOC);

	if($res) {
		foreach($res as $k => $v) {
			switch($v['status']) {
				case "Новая": 
					$status = '';
					break;
				case "Прибыла на склад/Ожидает оплаты": 
					$status = 'statusRed';
					break;
				case "Отправление готово к отправке": 
					$status = 'statusYellow';
					break;
				case "Отправлена в страну назначения": 
					$status = 'statusYellow';
					break;
				case "Прибыла в сортировочный центр страны назначения": 
					$status = 'statusGreen';
					break;
				case "Идет вручение адресату": 
					$status = 'statusGreen';
					break;
				case "Доставлена адресату": 
					$status = 'statusGreen';
					break;
				case "Неудачная попытка вручения": 
					$status = 'statusBlue';
					break;
				default:
					$status = '';
					break;
			}
			echo "<p class='showParcel ".$status."' onclick='getAction(this);'>".$v['qr_name']."</p>";
		}
		} else {
			echo "<p class='showParcel'>Не найдено!</p>";
		}