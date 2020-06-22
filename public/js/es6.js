// Финкция вывода данных в консоль
function deb(elem) {
    console.log('############# ' + typeof elem + ' #############');
    console.log(elem);
    console.log('##################################');
}
///////////////////////////////////////////////////////////////////////////////////////////////
// Функция добавленя скрипта
function appendScript(name, e) {
    e = document.querySelector(`#${e}`);
    e.addEventListener('click', () => {

        let oldScript = document.querySelector(`#${name}S`);
        if(oldScript) {
            deb(oldScript);
        } else {
            let getAllInvoice = document.createElement('script');
            getAllInvoice.setAttribute('src', `public/js/${name}.js`);
            getAllInvoice.setAttribute('id', `${name}S`);
            document.body.append(getAllInvoice);
        }
    });
}
///////////////////////////////////////////////////////////////////////////////////////////////