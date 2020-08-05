<?php

	require_once '../app/libs/sign/privileges.php';

	if(!empty($_GET['track'])) {
		$sql = 'SELECT * FROM dispatch WHERE qr_name = "'.$_GET['track'].'"';
		$res = $pdo->query($sql);
		$res = $res->fetch(PDO::FETCH_ASSOC);
	}

	switch($res['status']) {
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Express</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <section id="content" class="<?=$status;?>">
		<?php
			if($res) {
				echo '<p class="info"><span class="infoDes">Трек номер: </span>' .$res['qr_name'].'</p><hr>';
				echo '<p class="info"><span class="infoDes">Дата создания: </span>' .$res['fromDate'].'</p><hr>';
				echo '<p class="info"><span class="infoDes">Страна отправления: </span>' .$res['fromCountrie'].'</p><hr>';
				echo '<p class="info"><span class="infoDes">Город отправления: </span>' .$res['fromCity'].'</p><hr>';
				echo '<p class="info"><span class="infoDes">Адрес отправления: </span>' .$res['fromAdres'].'</p><hr>';
				echo '<p class="info"><span class="infoDes">Котакты отправителя: </span>' .$res['fromContacts'].'</p><hr>';
				echo '<p class="info"><span class="infoDes">Телефон отправителя: </span>' .$res['fromPhone'].'</p><hr>';
				echo '<p class="info"><span class="infoDes">Страна: </span>' .$res['toCountrie'].'</p><hr>';
				echo '<p class="info"><span class="infoDes">Область: </span>' .$res['obl'].'</p><hr>';
				echo '<p class="info"><span class="infoDes">Город: </span>' .$res['toCity'].'</p><hr>';
				echo '<p class="info"><span class="infoDes">Почтовый индекс: </span>' .$res['toZipcode'].'</p><hr>';
				echo '<p class="info"><span class="infoDes">Адрес: </span>' .$res['toAdres'].'</p><hr>';
				echo '<p class="info"><span class="infoDes">Котакты: </span>' .$res['toContacts'].'</p><hr>';
				echo '<p class="info"><span class="infoDes">Телефон: </span>' .$res['toPhone'].'</p><hr>';
				echo '<p class="info"><span class="infoDes">Статус: </span>' .$res['status'].'</p>';
				if(!empty($_SESSION['privileges'] == 0)) {
					echo '<form action="../app/querys/newStatus.php" style="margin: 10px;>
							<label for="status">Статус: </label>
							<select class="inp" id="status" name="status">
								<option>Новая</option>
								<option>Прибыла на склад/Ожидает оплаты</option>
								<option>Отправление готово к отправке</option>
								<option>Отправлена в страну назначения</option>
								<option>Прибыла в сортировочный центр страны назначения</option>
								<option>Идет вручение адресату</option>
								<option>Доставлена адресату</option>
								<option>Неудачная попытка вручения</option>
							</select>
							<input type="hidden" name="track" value="'.$res['qr_name'].'">
							<button type="submit" name="send" value="send" class="btn" style="margin-top: 5px;">Изменить</button>
						</form>';
				}
				echo '<hr>';
				echo '<p class="info"><span class="infoDes">Манифест: </span>' .$res['manifest'].'</p><hr>';
				echo '<p class="info"><span class="infoDes">Примичание: </span>' .$res['prim'].'</p><hr>';
				echo '<p class="info"><span class="infoDes">Описание: </span>' .$res['description'].'</p><hr>';
				echo '<p class="info"><span class="infoDes">Обьявленая стоимость: </span>' .$res['price'].'</p><hr>';
				echo '<p class="info"><span class="infoDes">Упаковка: </span>' .$res['pack'].'</p><hr>';
				echo '<p class="info"><span class="infoDes">Фото отчет: </span>' .$res['photo'].'</p><hr>';
				echo '<p class="info"><span class="infoDes">Kuaidi: </span>' .$res['kuaidi'].'</p><hr>';
				echo '<p class="info"><span class="infoDes">Трек 2: </span>' .$res['code2'].'</p><hr>';
				echo '<p class="info"><span class="infoDes">Трек 3: </span>' .$res['code3'].'</p><hr>';
			} else {
				echo 'Трек номер не найден';
			}
			
		?>
    </section>
	<?php require_once 'template/footer.php'; ?>
    <script src="../public/js/es6.js"></script>
    <script src="../public/js/main.js"></script>
</body>
</html>