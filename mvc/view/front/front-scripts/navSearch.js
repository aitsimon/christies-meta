//let formSearch = document.getElementById('navSearchForm');
$('.navbarName').on('submit', function(){
        event.stopPropagation();
        event.preventDefault();

        $.ajax({
            url: 'http://localhost/christies-meta/mvc/view/front/jsonExchanger.php',
            type: 'POST',
            dataType: 'json',
            data: {
                'action' : 'searchProducts',
                'text' : event.currentTarget.firstElementChild.value
            },
            async: true
        }).done((response) => {
            let r = JSON.stringify(response);
            sessionStorage.setItem('productsSearchedNav',r);
            window.location.href = 'http://localhost/christies-meta/mvc/index.php/list';
        })
})


