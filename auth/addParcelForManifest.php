<?php
	session_start();
	if( empty($_SESSION['name']) ) {
		header('Location: ../index.php');
	}
	require_once "../app/dataBase/connectDB.php";	

	// Получение всех манифестов
	$sql = 'SELECT * FROM manifests';
	$res = $pdo->query($sql);
	$res = $res->fetchAll(PDO::FETCH_ASSOC);
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
<!--=================================================/ Show All Parcels START /=================================================-->
		<div id="showParcels">
			<?php
				foreach($res as $k => $v) {
					echo "<p class='showParcel' onclick='addNewParcelForManifest(this);'>".$v['qr_name']."</p>";
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
			location.href = '../app/querys/addParcelForManifest.php?track='+track+'&manifest='+elem.textContent;
		}
	</script>
    <script src="../../public/js/main.js"></script>
</body>
</html>
