<?php

	session_start();
	if(empty($_SESSION['name'])) {
		header('Location: ../index.php');
	}

?>
<!DOCTYPE html>
<html>
  <head>
    <title>QRScan</title>
    <script type="text/javascript" src="../scan.min.js"></script>
	<link rel="stylesheet" href="../public/css/scan.css">
  </head>
  <body>
	<video id="preview"></video>
	<h1 class="messages"></h1>
	<div class="scanBlock"></div>
	<button id="goScan">Повторить</button>
    <script type="text/javascript">
	  let opts = {
		  continuous: true,
		  video: document.getElementById('preview'),
		  mirror: false,
		  captureImage: false,
		  backgroundScan: true,
		  refractoryPeriod: 15000,
		  scanPeriod: 5
		};
		
      let scanner = new Instascan.Scanner(opts, { video: document.getElementById('preview') });
      scanner.addListener('scan', function (content) {
		  
		  console.log(content);
		  scanner.stop();
		  location.href = '../app/querys/acceptParcel.php?track='+content;
		  			
		  
		  
		  document.getElementById('goScan').onclick = function() {
		  	scanner.start();
		    let messagesBlock = document.querySelector('.messages');
		    messagesBlock.innerHTML = '';  
		  }
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[1]);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });
    </script>
  </body>
</html>