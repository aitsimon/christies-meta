let cardsCategories = document.getElementsByClassName('cardCat');
let divCards = document.getElementById('divCards');
let filterName = document.getElementById('filterCategoryName');
let filterDescription = document.getElementById('filterCategoryDescription');
let filterScore = document.getElementById('filterPopularityBtn');

for (let i = 0; i < cardsCategories.length; i++) {
    cardsCategories[i].addEventListener('click',()=>{
        let idCat = event.currentTarget.firstElementChild.value;
        redirectToPtsCat(idCat);
    })
}
function reloadCards(data) {
    for (const category of data) {
        let divBtn = document.createElement('div');
        let classesDivBtn = ["btn", "cardCat", "text-decoration-none", "col-lg-5", "d-flex", "flex-wrap", "my-5", "align-items-stretch"];
        divBtn.classList.add(...classesDivBtn);

        let iHidden = document.createElement('input');
        iHidden.type = 'hidden';
        iHidden.name = 'idCat';
        iHidden.value = category.cat_id;

        let divCard = document.createElement('div');
        divCard.classList.add('card');

        let imgCard = document.createElement('img');
        imgCard.src = category.img;

        let divCardBody = document.createElement('div');
        let classesDivCardBody = ["card-body", "d-flex", "flex-column"];
        divCardBody.classList.add(...classesDivCardBody);

        let titleCard = document.createElement('h5');
        let classesTitleCard =["card-title", "text-dark", "text-uppercase", "text-start"];
        titleCard.classList.add(...classesTitleCard);
        titleCard.innerText = category.name;
        let descriptionCard = document.createElement('p');
        let classesDescriptionCard = ["card-text", "text-secondary", "mb-4"];
        descriptionCard.classList.add(...classesDescriptionCard);
        descriptionCard.innerText = category.description;

        divCardBody.appendChild(titleCard);
        divCardBody.appendChild(descriptionCard);

        divCard.appendChild(imgCard);
        divCard.appendChild(divCardBody);

        divBtn.appendChild(iHidden);
        divBtn.appendChild(divCard);

        divCards.appendChild(divBtn);
    }
}

function redirectToPtsCat (idCat){
    $.ajax({
            url: 'http://localhost/christies-meta/mvc/view/front/jsonExchanger.php',
            type: 'POST',
            dataType: 'json',
            data: {
                'action' : 'ptosByCat',
                'categoryId' : idCat
            },
            async: true
        }).done((response) => {
            let r = JSON.stringify(response);
            sessionStorage.setItem('productsSearchedNav',r);
            window.location.href = 'http://localhost/christies-meta/mvc/index.php/list';
        })
}
filterName.addEventListener('keyup', () => {
    $.ajax({
        url: 'http://localhost/christies-meta/mvc/view/front/jsonExchanger.php',
        type: 'POST',
        dataType: 'json',
        data: {
            'action': 'categoriesByName',
            'text':  filterName.value
        }
    }).done((response) => {
        divCards.innerHTML = "";
        reloadCards(response);
    });
});
filterDescription.addEventListener('keyup', () => {
    $.ajax({
        url: 'http://localhost/christies-meta/mvc/view/front/jsonExchanger.php',
        type: 'POST',
        dataType: 'json',
        data: {
            'action': 'categoriesByDescription',
            'text':  filterDescription.value
        }
    }).done((response) => {
        divCards.innerHTML = "";
        reloadCards(response);
    });
});
filterScore.addEventListener('click',() =>{
    let order = undefined;
    let icon = event.target;
    if(icon.classList.contains('fa-arrow-alt-circle-down')){
        order='desc';
    }else{
        order = 'asc';
    }
    $.ajax({
        url: 'http://localhost/christies-meta/mvc/view/front/jsonExchanger.php',
        type: 'POST',
        dataType: 'json',
        data: {
            'action': 'scoreCat',
            'text':  '',
            'order': order
        }
    }).done((response) => {
        divCards.innerHTML = "";
        reloadCards(response);
        if(order==='desc'){
            icon.classList.remove('fa-arrow-alt-circle-down');
            icon.classList.add('fa-arrow-alt-circle-up');
        }else{
            icon.classList.remove('fa-arrow-alt-circle-up');
            icon.classList.add('fa-arrow-alt-circle-down');
        }
    });
})