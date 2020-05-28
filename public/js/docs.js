let docs = document.querySelector('#docs');


docs.addEventListener('click', () => {

    let newScript = document.createElement('script');
    newScript.setAttribute('src', 'public/js/getAllInvoice.js');
    document.body.append(newScript);
});