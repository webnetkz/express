<footer>
	<img class="menuItem" src="../public/img/box.png" onclick="location.href = 'parcels.php'">
	<img class="menuItem" src="../public/img/warehouse.png" onclick="location.href = 'warehouse.php'">
	<img class="menuItem" src="../public/img/search.png" onclick="location.href = 'search.php'">
	<div>
		<img class="menuItem" src="../public/img/inbox.png" onclick="showAcceptParcels();">
		<div class="hideAcceptParcels" id="acceptParcels">
			<p class="acceptElem">
				<img class="menuItem" src="../public/img/camera.png" onclick="location.href = 'acceptParcelsQR.php'">
			</p>
			<p class="acceptElem">
				<img class="menuItem" src="../public/img/barcode.png" onclick="location.href = 'acceptParcelsBARCODE.php'">
			</p>
		</div>
	</div>
	<img class="menuItem" src="../public/img/arrowLeft.png" onclick="window.history.back();">
	<img class="menuItem" src="../public/img/arrowRight.png" onclick="window.history.forward();">
</footer>

<script>
	function showAcceptParcels() {
		let acceptParcels = document.querySelector('#acceptParcels');
		
		if(acceptParcels.getAttribute('class') == 'hideAcceptParcels') {
			acceptParcels.removeAttribute('class');
		    acceptParcels.setAttribute('class', 'acceptParcels');
		} else {
			acceptParcels.removeAttribute('class');
		    acceptParcels.setAttribute('class', 'hideAcceptParcels');
		}
	}
</script>

<style>
	.acceptParcels {
		position: absolute;
		top: calc(100% - 8% - 150px);
		left: 52.5%;
		z-index: 9999;
		background: rgb(74, 74, 74);
		padding: 8px;
		padding-top: 0;
		height: 100px;
		transition-duration: 600ms;
	}
	.hideAcceptParcels {
		top: 130%;
	}
	.acceptElem {
		
	}
</style>