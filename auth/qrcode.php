<?php

	session_start();
	if(empty($_SESSION['name'])) {
		header('Location: ../index.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Express</title>
    <link rel="stylesheet" href="../public/css/style.css">
	<style>
		#qrcode > img {
			width: 50mm;
			height: 50mm;
		}
	</style>
</head>
<body>
    <section id="content">
		<div id="qrcode"></div>
		<br>
		<br>
		<a download id="linkQR">
			<button class="btn" id="downloadQR">Скачать QR</button>
		</a>
    </section>
	<?php require_once 'template/footer.php'; ?>
    <script src="../public/js/qrcode.min.js"></script>
    <script src="../public/js/main.js"></script>
	<script type="text/javascript">
		let strGET = window.location.search.replace( '?', '');
		let track = strGET.slice(6);
		new QRCode(document.getElementById("qrcode"), track); 
		
		let qr = document.getElementById("downloadQR").onclick = () => {
			let qrImg = document.querySelector('#qrcode img');
			qrImg = qrImg.getAttribute('src');
			
			let linkQR = document.getElementById("linkQR")
			linkQR.setAttribute('href', qrImg);
		}
	</script>
</body>
</html>
