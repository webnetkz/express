// Обработчик при изменения значения input
document.querySelector('#toCountries').oninput = function() {
		
        // Значение input
        let inpVal = this.value.trim();
        // Все элементы списка по которому идет поиск
        let listItem = document.querySelectorAll('#res li');

        if(inpVal != '') {
            // Первую букву сделать заглавной
            inpVal = inpVal.toUpperCase();

            // Ищем вхождение
            listItem.forEach(function(elem) {
                if(elem.innerText.search(inpVal) == -1) {
                    elem.classList.add('hidden');
                } else {
                    elem.classList.remove('hidden');
                }
            });
    } else {
        // Очистка ввода в поле input
        listItem.forEach(function(elem) {
            elem.classList.remove('hidden');
        });
    }
}

// Выбор кликом страны из списка и оправка данных на сервер
function getValue(elem) {
	let countries = document.querySelector('#toCountries');
	countries.value = elem.textContent;
	
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
	xhr.send('toCountries=' + countries.value);
}
// Выбор кликом страны из списка для манифеста
function getValueM(elem) {
	let countries = document.querySelector('#toCountries');
	countries.value = elem.textContent;
}