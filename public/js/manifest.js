let manifest = document.querySelector('#manifest');

manifest.onclick = () => {
	let filterContent = document.querySelector('.manifest');
	
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

let toCountries = document.getElementById('toCountries').onclick = () => {
	document.getElementById('res').style.display = 'block';
}
