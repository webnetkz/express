// Отображает дополнительные функций для посылок
function getAction(elem) {
	
	let val = elem.textContent;
	// Увеличивает блок посылки
	elem.classList.add('getAction');
	// Создает контейнер для доп. кнопок
	let addGetAction = document.createElement('div');
	addGetAction.classList.add('addGetAction');
	// Создает кнопку просмотра посылки
	let showImg = document.createElement('img');
	showImg.setAttribute('src', '../public/img/showAction/eye.png');
	showImg.setAttribute('id', val);
	showImg.setAttribute('onclick', "showParcel(this.id)");
	showImg.classList.add('miniImg');
	// Добовляем в контейнер кнопку просмотра посылки
	addGetAction.appendChild(showImg);

	// Создаем кнопку просмотра QRcode
	let showQR = document.createElement('img');
	showQR.setAttribute('src', '../public/img/showAction/qr.png');
	showQR.setAttribute('id', val);
	showQR.setAttribute('onclick', "showQR(this.id)");
	showQR.classList.add('miniImg');
	// Добовляем в контейнер кнопку просмотра QR code
	addGetAction.appendChild(showQR);
	
	// Создаем кнопку добавления посылки в манифест
	let showAdd = document.createElement('img');
	showAdd.setAttribute('src', '../public/img/showAction/add.png');
	showAdd.setAttribute('id', val);
	showAdd.setAttribute('onclick', "addManifest(this.id)");
	showAdd.classList.add('miniImg');
	// Добовляем в контейнер кнопку просмотра QR code
	addGetAction.appendChild(showAdd);
	
	// Создаем кнопку принятия посылки
	let showAccept = document.createElement('img');
	showAccept.setAttribute('src', '../public/img/showAction/download.png');
	showAccept.setAttribute('id', val);
	showAccept.setAttribute('onclick', "acceptParcel(this.id)");
	showAccept.classList.add('miniImg');
	// Добовляем в контейнер кнопку принятия посылки
	addGetAction.appendChild(showAccept);
	
	
	// Добовляем контейнер с кнопками навигации в блок посылки
	elem.appendChild(addGetAction);
	// Удаляем прослушку события на посылке
	elem.removeAttribute('onclick');
}

// Переадресация на посылку
function showParcel(elem) {
	location.href = 'parcel.php?track='+elem;
}
// Переадресация на QR code
function showQR(elem) {
	location.href = 'qrcode.php?track='+elem;
}
// Добавление посылки в манифест
function addManifest(elem) {
	location.href = 'addParcelForManifest.php?track='+elem;
}
// Добавление посылки в манифест
function acceptParcel(elem) {
	location.href = '../../auth/acceptParcel.php?track='+elem;
}
