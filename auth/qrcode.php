<?php

	session_start();
	if( empty($_SESSION['name']) ) {
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
		#qrcode {
			visibility: hidden;
		}
		#qrcode > img {
			width: 25mm;
			height: 25mm;
		}
		#downloadQR {
			width: 40%;
			margin-left: 30%;
		}
		@media only print {
			.btn, footer, #content {
				display: none;
			}
		}
	</style>
</head>
<body>
	<div id="qrcode"></div>
    <section id="content">
		
		<br>
		<br>
		<!--<a download id="linkQR" onclick="changeStatus();">-->
			<button class="btn" id="downloadQR">Скачать QR</button>
		<!--</a>-->
    </section>
	<?php require_once 'template/footer.php'; ?>
    <script src="../public/js/qrcode.min.js"></script>
    <script src="../public/js/main.js"></script>
	<script type="text/javascript">
		let strGET = window.location.search.replace( '?', '');
		let track = strGET.slice(6);	
		
		new QRCode(document.getElementById("qrcode"), track); 
		
		let qr = document.getElementById("downloadQR").onclick = () => {
			let qrCode = document.querySelector('#qrcode').style.visibility = 'visible';
			let qrImg = document.querySelector('#qrcode img');
			window.print() 
			//qrImg = qrImg.getAttribute('src');
			
			
			//let linkQR = document.getElementById("linkQR")
			//linkQR.setAttribute('href', qrImg);
			
			// Редирект для смены статуса посылки на Прибыла на склад/Ожидает оплаты
			location.href = '../app/querys/changeStatusTwo.php?track='+track;
		}
		
		

	</script>
</body>
</html>
