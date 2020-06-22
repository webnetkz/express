let filter = document.querySelector('#filter');

filter.onclick = () => {
	let filterContent = document.querySelector('.filter');
	
	if(	filterContent.style.display == 'block') {
		filterContent.style.display = 'none';
	} else {
		filterContent.style.display = 'block';
	}
}

function FtoCountries(elem) {
	let xhr = new XMLHttpRequest();
	
	xhr.open('POST', '/app/filter/toCountries.php');
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

	xhr.onreadystatechange = function() {
		if(xhr.readyState === 4 && xhr.status === 200) {
			let resultQuery = xhr.responseText;

			let showParcels = document.querySelector('#showParcels');
			showParcels.innerHTML = resultQuery;
		}
	}
	xhr.send('toCountries=' + elem.value);
}

function FfromDate(elem) {
	var xhr = new XMLHttpRequest();

	xhr.open('POST', '/app/filter/fromDate.php');
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

	xhr.onreadystatechange = function() {
		if(xhr.readyState === 4 && xhr.status === 200) {
			let resultQuery = xhr.responseText;

			let showParcels = document.querySelector('#showParcels');
			showParcels.innerHTML = resultQuery;
		}
	}
	xhr.send('fromDate=' + elem.value);
}

function FtoCity(elem) {
	var xhr = new XMLHttpRequest();

	xhr.open('POST', '/app/filter/toCity.php');
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

	xhr.onreadystatechange = function() {
		if(xhr.readyState === 4 && xhr.status === 200) {
			let resultQuery = xhr.responseText;

			let showParcels = document.querySelector('#showParcels');
			showParcels.innerHTML = resultQuery;
		}
	}
	xhr.send('toCity=' + elem.value);
}

function Fstatus(elem) {
	var xhr = new XMLHttpRequest();

	xhr.open('POST', '/app/filter/status.php');
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

	xhr.onreadystatechange = function() {
		if(xhr.readyState === 4 && xhr.status === 200) {
			let resultQuery = xhr.responseText;

			let showParcels = document.querySelector('#showParcels');
			showParcels.innerHTML = resultQuery;
		}
	}
	xhr.send('status=' + elem.value);
}

let toCountries = document.getElementById('toCountries').onclick = () => {
	document.getElementById('res').style.display = 'block';
}
