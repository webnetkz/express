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
	<h1 class="messages">
		<?php
			if(!empty($_SESSION['msg'])) {
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
		?>
	</h1>
	<div class="scanBlock"></div>

	<!--<input type="text" name="quaidi" placeholder="quaidi" id="quaidi" style="position: fixed; width: 80%; left: 10%; top: 90%;font-size: 1.5em; text-align: center; border: 2px solid black;">
	<button style="position: fixed; width: 80%; left: 10%; top: 95%;font-size: 1.5em; text-align: center;" onclick="acceptParcel();">Принять</button>-->
	  
	<button id="changeCam">Поменять камеру</button>
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
		  location.href = '../app/scan/acceptParcel.php?track='+content;
		  		
		  
		  //function acceptParcel() {
		  //	let kuaidi = document.querySelector('#quaidi');
			//location.href = '../app/scan/acceptParcel.php?track='+kuaidi.value;
		  //}
		  
		  
		  document.getElementById('goScan').onclick = function() {
		  	scanner.start();
		    let messagesBlock = document.querySelector('.messages');
		    messagesBlock.innerHTML = '';  
		  }
      });
		
		


      Instascan.Camera.getCameras().then(function (cameras) {
		  
    
        if (cameras.length > 0) {
          scanner.start(cameras[0]);
        } else {
          console.error('No cameras found.');
        }
	
	  	// Смена камеры
		let changeCam = document.getElementById('changeCam').onclick = () => {
			 scanner.stop();
			 scanner.start(cameras[1]);
		}
		  
      }).catch(function (e) {
        console.error(e);
      });
    </script>
  </body>
</html>