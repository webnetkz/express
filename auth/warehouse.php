<?php
	session_start();
	if(empty($_SESSION['name'])) {
		header('Location: ../index.php');
	}
	require_once "../app/dataBase/connectDB.php";	

	// Получение всех манифестов
	$sql = 'SELECT * FROM manifests';
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
    <section id="content">
<!--===================================================/ New Manifest START /===================================================-->
		<div class="contentBlock">
			<button class="btn" id="manifest">Новый манифест</button>
<!--=================================================/ Form For Manifest START /=================================================-->

			<form action="../app/querys/newManifest.php" method="POST">
			<div class="manifest">
						<hr style="margin-top: 10px; margin-bottom: 10px;">
<!--===================================================/ Date START Manifest /===================================================-->
					<label for="fromDate">Дата создания: </label>
					<input type="date" id="fromDate" name="fromDate"  class="inp" required>
<!--===================================================/ Date END Manifest /===================================================-->
						<hr style="margin-top: 5px; margin-bottom: 5px;">
<!--=================================================/ Countries START Manifest /=================================================-->
					<label for="toCoutry">Страна доставки: </label>
					<input type="text" id="toCountries" name="toCountry" class="inp" placeholder="Страна" autocomplete="off" required>
						<ul id="res" style="position: relative; height: 50px; overflow: auto;">
							<?php
								foreach($resCountries as $k => $v) {
									foreach($v as $k => $v) {
										echo "<li onclick='getValueM(this);'>".$v."</li>";
									}
								}
							?>
						</ul>
<!--=================================================/ Countries END Manifest /=================================================-->
						<hr style="margin-top: 5px; margin-bottom: 5px;">
<!--=================================================/ Citys Start Manifest /=================================================-->
					<label for="toCity">Город доставки: </label>
					<input type="text" id="toCity" name="toCity" class="inp" placeholder="Город" autocomplete="off" required>
<!--=================================================/ Citys END Manifest /=================================================-->
						<hr style="margin-top: 5px; margin-bottom: 5px;">
<!--=================================================/ QR code START Manifest /=================================================-->
					<label for="qr">QR code: </label>
					<input type="text" id="qr" name="qr" class="inp" placeholder="QR code" autocomplete="off" required>
<!--=================================================/ QR code END Manifest /=================================================-->
						<hr style="margin-top: 5px; margin-bottom: 5px;">
<!--=================================================/ Seal START Manifest /=================================================-->
					<label for="seal">Пломба: </label>
					<input type="text" id="seal" name="seal" class="inp" placeholder="Пломба" autocomplete="off" required>
<!--=================================================/ Seal END Manifest /=================================================-->
						<hr style="margin-top: 5px; margin-bottom: 5px;">
					<button class="btn" name="newManifest">Создать</button>
			</div>
			</form>
<!--=================================================/ Form For Manifest END /=================================================-->
		</div>
<!--===================================================/ Manifest END /===================================================-->
<!--=================================================/ Show All Parcels START /=================================================-->
		<div id="showParcels">
			<?php
				foreach($res as $k => $v) {
					echo "<p class='showParcel' onclick='addNewParcelForManifest(this);'>".$v['qr_code']."</p>";
				}
			?>
		</div>
<!--=================================================/ Show All Parcels END /=================================================-->
    </section>
	<?php require_once 'template/footer.php'; ?>
    <script>
		let strGET = window.location.search.replace( '?', '');
		let track = strGET.slice(6);
		
		function addNewParcelForManifest(elem) {
			let manifest = elem;
			console.log(manifest);
			
		}
	</script>
    <script src="../public/js/main.js"></script>
	<script src="../public/js/manifest.js"></script>
	<script src="../public/js/autocomplete.js"></script>
</body>
</html>
