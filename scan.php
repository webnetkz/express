<!DOCTYPE html>
<html>
  <head>
    <title>QRScan</title>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
	<style>
		#preview {
			width: 100vw;
			height: 100vh;
		}
		#goScan {
			position: fixed;
			top: 90vh;
			left: 40vw;
			width: 20vw;
			color: rgb(255, 255, 255);
			font-size: 2em;
			background: red;
		}
		.messages {
			position: fixed;
			top: 100px;
			left: 10px;
			font-size: 1.2em;
		}
	</style>
  </head>
  <body>
	<video id="preview"></video>
	<h1 class="messages"></h1>
	<button id="goScan">goScan</button>
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
		  
		  			function getResultScan() {

						var xhr = new XMLHttpRequest();

						xhr.open('POST', '/app/scan/getResultScan.php');
						xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

						xhr.onreadystatechange = function() {
							if(xhr.readyState === 4 && xhr.status === 200) {
								let resultQuery = xhr.responseText;
								console.log(resultQuery);

								let messagesBlock = document.querySelector('.messages');
								messagesBlock.innerHTML = resultQuery;
							}
						}
						xhr.send('scan=' + content);
					}
					getResultScan();
		  
		  
		  document.getElementById('goScan').onclick = function() {
			  
		  	scanner.start();

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