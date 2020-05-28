// Сканирование QR кода
function getQRscanner() {

    let xhr = new XMLHttpRequest();
    let content = document.querySelector('#content');

    xhr.open('GET', '/app/getQRscanner.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            content.innerHTML = xhr.responseText;
        }
    }
    xhr.send();
}
getQRscanner();