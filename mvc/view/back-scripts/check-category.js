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
var botones = document.getElementsByName('add');
var bEnviar = botones[0];
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
    var smallError = elemento.nextElementSibling;
    switch (name) {
        case 'categoryName':
            let patron = /^[a-záéíóúüñç_]{2,20}$/i;
            let nameEntered = elemento.value;
            if(patron.test(nameEntered)) {
                smallError.innerHTML='';
            }else{
                smallError.innerHTML='Name field invalid. No numbers or special characters allowed. Min length: 2. Max length: 20.';
            }
            break;
        case 'categoryDescription':
            let descriptionEntered = elemento.value;
            if(descriptionEntered.length<1000){
                smallError.innerHTML='';
            }else{
                smallError.innerHTML='Description max length 1000 characters.'
            }
            break;
        case 'userTokens':
            if (typeof (eval(elemento.value))==='number') {
                smallError.innerHTML = '';
            } else {
                smallError.innerHTML = 'Tokens must be a number.';
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