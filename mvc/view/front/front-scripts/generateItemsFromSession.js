let objects = JSON.parse(sessionStorage.getItem('productsSearchedNav'));
if(objects!=null && objects.length> 0){
    for (const object of objects) {
        let divAccordeon = document.getElementById('accordionObjects');
        let divAccordeonItem = document.createElement('div');
        divAccordeonItem.classList.add('accordion-item');

        let accordeonHeader = document.createElement('h2');
        let classesAccHeader = ["accordion-header", "col-12", "w-100"];
        accordeonHeader.classList.add(...classesAccHeader);

        let button  = document.createElement('button');
        let buttonClasses = ["btn", "col-12", "collapsed","py-5","d-flex","flex-row", "justify-content-center","align-items-center"];
        button.classList.add(...buttonClasses);
        button.type = "button";
        button.setAttribute("data-bs-toggle","collapse" );
        button.setAttribute("data-bs-target",`#collapse${object.object_id}`);

        let divPriceName = document.createElement('div');
        let classesDivPriceName = ["d-flex","flex-column", "col-5", "justify-content-start", "align-items-center", "text-break", "text-uppercase"];
        divPriceName.classList.add(...classesDivPriceName);
        let h4Name = document.createElement('h4');
        h4Name.innerText = object.name;
        h4Name.classList.add('col-6');
        divPriceName.appendChild(h4Name);
        let aPrice = document.createElement('a');
        aPrice.innerText=object.price;
        let aPriceClasses =["btn", "price-tag","col-6","my-3"];
        aPrice.classList.add(...aPriceClasses);
        divPriceName.appendChild(aPrice);
        button.appendChild(divPriceName);


        let divImageProduct = document.createElement('div');
        let classesImageProduct = ["d-flex", "flex-column", "col-7", "justify-content-start", "align-items-center"];
        divImageProduct.classList.add(...classesImageProduct);
        let divCarouselFlickity = document.createElement('div');
        let classesDivCarouselFlickity = ["carousel","js-flickity","w-100"];
        divCarouselFlickity.classList.add(...classesDivCarouselFlickity);
        let carouselCell  = document.createElement('div');
        carouselCell.classList.add("carousel-cell");
        let img1 = document.createElement('img');
        img1.src = object.img1;
        carouselCell.appendChild(img1);
        divCarouselFlickity.appendChild(carouselCell);
        if(object.img2!==null){
            let carouselCell2  = document.createElement('div');
            carouselCell2.classList.add("carousel-cell");
            let img2 = document.createElement('img');
            img2.src = object.img2;
            carouselCell2.appendChild(img2);
            divCarouselFlickity.appendChild(carouselCell2);
        }
        if(object.img3!==null){
            let carouselCell3  = document.createElement('div');
            carouselCell3.classList.add("carousel-cell");
            let img3 = document.createElement('img');
            img3.src = object.img3;
            carouselCell3.appendChild(img3);
            divCarouselFlickity.appendChild(carouselCell3);
        }
        divImageProduct.appendChild(divCarouselFlickity);
        button.appendChild(divImageProduct);
        accordeonHeader.appendChild(button);


        let divCollapse = document.createElement('div');
        divCollapse.id = `collapse${object.object_id}`;
        let classesDivCollapse = ["accordion-collapse","collapse"];
        divCollapse.classList.add(...classesDivCollapse);
        divCollapse.setAttribute("aria-labelledby",`heading${object.object_id}`);
        divCollapse.setAttribute("data-bs-parent","#accordionObjects");

        let divAccordeonBody = document.createElement('div');
        let classesAccordeonBody = ["accordion-body", "d-flex", "justify-content-center", "align-content-center"];
        divAccordeonBody.classList.add(...classesAccordeonBody);
        let aViewObject = document.createElement('a');
        aViewObject.href = `./index.php/list/${object.object_id}`;
        let classesAViewObject = ["btn","price-label", "text-white", "mb-4"];
        aViewObject.classList.add(...classesAViewObject);
        aViewObject.innerHTML = 'View Product <i class="fas fa-object-group"></i>';

        divAccordeonBody.appendChild(aViewObject);
        divCollapse.appendChild(divAccordeonBody);

        divAccordeonItem.appendChild(accordeonHeader);
        divAccordeonItem.appendChild(divCollapse);

        divAccordeon.appendChild(divAccordeonItem);

    }
    sessionStorage.setItem('currentObjects',objects);
    sessionStorage.removeItem('productsSearchedNav')
}


