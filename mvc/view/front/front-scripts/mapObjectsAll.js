$.ajax({
    url: 'http://localhost/christies-meta/mvc/view/front/jsonExchanger.php',
    type: 'POST',
    dataType: 'json',
    data: {
        'action' : 'productsMap',
    },
    async: true
}).done((response) => {
    console.log(response)
    let arrProducts = response;
    arrProducts.forEach(product => {
        if (product.lat === null || product.lon === null) {
            arrProducts.splice(arrProducts.indexOf(product), 1);
        }
    });
    var map = L.map('map').setView([0, 0], 1);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    arrProducts.forEach(product => {
        let marker = L.marker([product.lat, product.lon]).addTo(map);
        marker.bindPopup(`
            <div class="cardMapObject d-flex flex-row flex-wrap justify-content-around">
            <img src="${product.img1}" class="col-12">
            <a class="col-12 text-break text-decoration-none" href="./index.php/list/${product.object_id}">${product.name}</a>  
            </div>
        `, {
            width: 700
        });
    });
});

