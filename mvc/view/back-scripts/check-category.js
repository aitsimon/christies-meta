function previewFile(input){
    var file = $("input[type=file]").get(0).files[0];

    if(file){
        var reader = new FileReader();

        reader.onload = function(){
            $("#previewImg").attr("src", reader.result);
        }

        reader.readAsDataURL(file);
    }
}
var todosI =document.getElementsByTagName('input');
var todosTextArea = document.getElementsByTagName('textarea');
var botones = document.getElementsByClassName('bt-fo');
var bEnviar = botones[0];
bEnviar.classList.remove('btn-primary');

bEnviar.removeAttribute('aria-disabled','false');

bEnviar.disabled = true;

bEnviar.disabled = 'true';
for (let i = 0; i < 2; i++) {
    todosI[i].setAttribute('required', '');
    todosI[i].addEventListener('blur;',comprobar);
}
for (let i = 0; i < todosI.length; i++) {
    todosI[i].setAttribute('onblur', 'comprobar(event,this), comprobarTodos()');

}
for (let i = 0; i < todosTextArea.length; i++) {
    todosTextArea[i].setAttribute('required', '');
    todosTextArea[i].setAttribute('onblur', 'comprobar(event,this), comprobarTodos()');

}
function dateIsValid(date) {
    return date instanceof Date && !isNaN(date);
}
function comprobar(evt) {
    var elemento = evt.currentTarget;
    var name = elemento.name;
    let valor = elemento.value;
    var smallError = elemento.nextElementSibling;
    switch (name) {
        case 'categoryName':
            let patron = /^[a-zA-Z0-9]+(?:[\s.]+[a-zA-Z0-9]+)*$/g;
            if(patron.test(valor) && valor.length>=3) {
                smallError.innerHTML='';
            }else{
                smallError.innerHTML='Name field invalid. No special characters allowed. Min length: 2. Max length: 20.';
            }
            break;
        case 'categoryDescription':
            let patron2 = /^[a-zA-Z0-9]+(?:[\s.]+[a-zA-Z0-9]+)*$/g;
            let descriptionEntered = elemento.value;
            if(patron2.test(descriptionEntered) && descriptionEntered.length<600 && descriptionEntered.length>3){
                smallError.innerHTML='';
            }else{
                smallError.innerHTML='Description max length 1000 characters.'
            }
            break;
    }
}
function comprobarTodos() {
    smalls = document.getElementsByClassName('text-muted');
    let vacios = true;
    for (let i = 0; i < smalls.length; i++) {
        const element = smalls[i];
        if (element.innerText.length > 0) {
            vacios = false;
            break;
        }
    }
    if (vacios) {
        bEnviar.disabled = false;
        bEnviar.classList.add('btn-primary');

        bEnviar.removeAttribute('aria-disabled','true');
    } else {
        bEnviar.classList.remove('btn-primary');

        bEnviar.removeAttribute('aria-disabled','false');

        bEnviar.disabled = true;
    }
}