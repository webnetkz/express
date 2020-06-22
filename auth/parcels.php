<?php

	session_start();
	if(empty($_SESSION['name'])) {
		header('Location: ../index.php');
	}

	require_once "../app/dataBase/connectDB.php";	

	// Получение все посылок
	$sql = 'SELECT * FROM dispatch';
	$res = $pdo->query($sql);
	$res = $res->fetchAll(PDO::FETCH_ASSOC);
	// Получение всех стран
	$sqlCountries = 'SELECT `name` FROM countries';
	$resCountries = $pdo->query($sqlCountries);
	$resCountries = $resCountries->fetchAll(PDO::FETCH_ASSOC);
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
<!--===================================================/ Content START /===================================================-->
    <section id="content">
<!--===================================================/ Filter START /===================================================-->
		<div class="contentBlock">
			<button class="btn" id="filter">Фильтр</button>
				<div class="filter">
						<hr style="margin-top: 10px; margin-bottom: 10px;">
<!--===================================================/ Date START filter /===================================================-->
					<label for="fromDate">Дата создания: </label>
					<input type="date" id="fromDate" oninput="FfromDate(this);" name="fromDate"  class="inp">
<!--===================================================/ Date END filter /===================================================-->
						<hr style="margin-top: 5px; margin-bottom: 5px;">
<!--=================================================/ Countries START filter /=================================================-->
					<label for="toCoutry">Страна доставки: </label>
					<input type="text" id="toCountries" name="toCountries" onchange="FtoCountries(this);" class="inp" placeholder="Страна"  autocomplete="off">
						<ul id="res" style="position: relative; height: 50px; overflow: auto;">
							<?php
								foreach($resCountries as $k => $v) {
									foreach($v as $k => $v) {
										echo "<li onclick='getValue(this);'>".$v."</li>";
									}
								}
							?>
						</ul>
<!--=================================================/ Countries END filter /=================================================-->
						<hr style="margin-top: 5px; margin-bottom: 5px;">
<!--=================================================/ Citys Start filter /=================================================-->
					<label for="toCity">Город доставки: </label>
					<input type="text" id="toCity" onchange="FtoCity(this);" name="toCity" class="inp" placeholder="Город"  autocomplete="off">
<!--=================================================/ Citys END filter /=================================================-->
						<hr style="margin-top: 5px; margin-bottom: 5px;">
<!--=================================================/ Status START filter /=================================================-->
					<label for="status">Статус: </label>
					<select class="inp" id="status" onchange="Fstatus(this);" name="status">
						<option>Новая</option>
						<option>Прибыла на склад/Ожидает оплаты</option>
						<option>Отправление готово к отправке</option>
						<option>Отправлена в страну назначения</option>
						<option>Прибыла в сортировочный центр страны назначения</option>
						<option>Идет вручение адресату</option>
						<option>Доставлена адресату</option>
						<option>Неудачная попытка вручения</option>
					</select>
<!--=================================================/ Status END filter /=================================================-->
			</div>
		</div>
<!--===================================================/ Filter END /===================================================-->
<!--=================================================/ Show All Parcels START /=================================================-->
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
					echo "<p class='showParcel ".$status."' onclick='getAction(this);'>".$v['qr_name']."</p>";
				}
			?>
		</div>
<!--=================================================/ Show All Parcels END /=================================================-->
    </section>
	<?php require_once 'template/footer.php'; ?>
    <script src="../public/js/main.js"></script>
	<script src="../public/js/addFunctionForParcel.js"></script>
	<script src="../public/js/filter.js"></script>
	<script src="../public/js/autocomplete.js"></script>
</body>
</html>