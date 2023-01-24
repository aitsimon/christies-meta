let formSearch = document.getElementById('navSearchForm');
let iSearch = document.getElementById('search');
formSearch.addEventListener('submit', () => {
    event.stopPropagation();
    event.preventDefault();

    $.ajax({
        url: 'http://localhost/christies-meta/mvc/view/front/jsonExchanger.php',
        type: 'POST',
        dataType: 'json',
        data: {
            'action' : 'searchProducts',
            'text' : iSearch.value
        },
        async: true
    }).done((response) => {
        console.log(response);
        let r = JSON.stringify(response);
        console.log(r);
        sessionStorage.setItem('productsSearchedNav',r);
        window.location.href = 'http://localhost/christies-meta/mvc/index.php/list';
    })
});

