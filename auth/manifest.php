<?php

	session_start();
	if(empty($_SESSION['name'])) {
		header('Location: ../index.php');
	}

	require_once '../app/dataBase/connectDB.php';

	if(!empty($_GET['manifest'])) {
		$sql = 'SELECT qr_name, status FROM dispatch WHERE manifest = "'.$_GET['manifest'].'"';
		$res = $pdo->query($sql);
		$res = $res->fetchAll(PDO::FETCH_ASSOC);
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
    <section id="content">
		<div id="showParcels">
			<?php
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
					echo "<p class='showParcel ".$status."' onclick='showParcel(this);'>".$v['qr_name']."</p>";
				}
			?>
		</div>
    </section>
	<?php require_once 'template/footer.php'; ?>
	<script>
		function showParcel(elem) {
			let track = elem.textContent;
			location.href = 'parcel.php?track='+track;
		}
	</script>
    <script src="../public/js/es6.js"></script>
    <script src="../public/js/main.js"></script>
</body>
</html>