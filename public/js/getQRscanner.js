// Сканирование QR кода
function getQRscanner() {

    let xhr = new XMLHttpRequest();
    let x = document.querySelector('.resultQR');

    xhr.open('GET', '/app/getQRscanner.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            x.innerHTML = xhr.responseText;
        }
    }
    xhr.send();
}
getQRscanner();