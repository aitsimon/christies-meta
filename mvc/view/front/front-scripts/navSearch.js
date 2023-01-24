let formSearch = document.getElementById('navSearchForm');
let iSearch = document.getElementById('search');
console.log(iSearch);
console.log(formSearch);
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
        let objects = response.json();
        console.log(objects);
    });
});