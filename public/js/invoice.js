var content = document.querySelector('.container');
// Получение всех контрагентов
function getAllAgents() {

    var xhr = new XMLHttpRequest();

    xhr.open('GET', '/app/querys/getAllAgents.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            let resultQuery = xhr.responseText;
            // Разбить строку, разделителем ',' на элементы массива
            resultQuery = resultQuery.split(',');

            // Событие при создании счета на оплату
            let invoice = document.querySelector('#invoice');

                    let docs = document.querySelector('#docs');
                    docs.classList.remove('menuItemActive');
                    invoice.classList.add('menuItemActive');
                    // Компонент счета на оплату
                    content.innerHTML = "<div class='component'>" +
                    "<form name='invoice'>" +
                        "<p class='title'>Новый счет на оплату <button type='reset' class='btn right' onclick='newAgent();'>Новый контрагент</button></p>" +
                            "<hr>" +
                            "<div class='invoice'>" +
                                "<p class='titleLitle'>Выбрать контрагента</p>" +
                                "<select id='allAgents' name='agent'>" +
                                    "<option>Выбрать</option>" +
                                "</select>" +
                                "<p class='titleLitle'>Выбрать услугу/товар</p>" +
                                "<select id='allItems' name='item'>" +
                                    "<option>Выбрать</option>" +
                                    "<input type='number' class='inp' placeholder='количество' style='margin-left: 10px;' name='itemQuantity'>" +
                                "</select>" +
                                    //"<button class='btn' onclick='newItem(this);return false;'>Добавить услугу/товар</button>" +
                                "<p style='margin-top: 20px;'><button class='btn' onclick='newInvoice();'>Создать счет на оплату</button></p>" +
                            "</div>";
                    "</form>" +
                    "</div>";

                    // Получение списка
                    let allAgents = document.querySelector('#allAgents');
                    // Добавление всех компаний в список
                    for(let i = 0; i < resultQuery.length && i != resultQuery.length -1; i++) {
                        allAgents.innerHTML += "<option>"+resultQuery[i]+"</option>";     
                    }
        }
    }
    xhr.send();
}
getAllAgents();

// Получение всех услуг\товаров
function getAllItems() {
    var xhr = new XMLHttpRequest();

    xhr.open('GET', '/app/querys/getAllItems.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            let resultQueryItems = xhr.responseText;
            // Разбить строку, разделителем ',' на элементы массива
            resultQueryItems = resultQueryItems.split(',');

            // Событие при создании счета на оплату
            let invoice = document.querySelector('#invoice');
            invoice.addEventListener('click', () => {

                function hiddenF() {
                    // Получение списка
                    let allAgents = document.querySelector('#allItems');
                    // Добавление всех услуг\товаров в список
                    for(let i = 0; i < resultQueryItems.length && i != resultQueryItems.length -1; i++) {
                        allAgents.innerHTML += "<option>"+resultQueryItems[i]+"</option>";     
                    }
                }
                setTimeout(hiddenF, 500);
            });
        }
    }
    xhr.send();
}
getAllItems();

function newInvoice() {
    document.forms.invoice.onsubmit = function (e) {
        // Отключить стандартное поведение формы
        e.preventDefault();
        // Сбор всех значений
        let agent = document.forms.invoice.agent.value;
        let item = document.forms.invoice.item.value;
        let itemQuantity = document.forms.invoice.itemQuantity.value;
    
    
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/app/querys/invoice.php');
    
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
        // Обработка запроса на сервер
        xhr.onreadystatechange = function() {
            if(xhr.readyState === 4 && xhr.status === 200) {
                content.textContent = xhr.responseText;
            }
        }
    
        // Отправка запроса на сервер
        xhr.send('agent=' + agent + '&item=' + item + '&itemQuantity=' + itemQuantity);
    }
}