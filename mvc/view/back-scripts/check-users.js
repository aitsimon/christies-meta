var todosI =document.getElementsByTagName('input');
var botones = document.getElementsByClassName('bt-fo');
var bEnviar = botones[0];
bEnviar.classList.remove('btn-primary');

bEnviar.removeAttribute('aria-disabled','false');

bEnviar.disabled = true;

for (let i = 0; i < 2; i++) {
    todosI[i].setAttribute('required', '');
    todosI[i].addEventListener('blur;',comprobar);
}
for (let i = 0; i < todosI.length; i++) {
    todosI[i].setAttribute('onblur', 'comprobar(event,this), comprobarTodos()');

}
function dateIsValid(date) {
    return date instanceof Date && !isNaN(date);
}
function comprobar(evt) {
    var elemento = evt.currentTarget;
    var name = elemento.name;
    var smallError = elemento.nextElementSibling;
    switch (name) {
        case 'userEmail':
            let regexx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            let emailEntered = elemento.value;
            if(regexx.test(emailEntered)) {
                smallError.innerHTML="";
            }else{
                smallError.innerHTML= "Enter a valid email address."
            }
            break;
        case 'userPassword':
            let patron = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
            let passwordEntered = elemento.value;
            if(patron.test(passwordEntered)) {
                smallError.innerHTML='';
            }else{
                smallError.innerHTML='Password field invalid. At least one of the following characters: lowercase, uppercase, number and length equal or greater than 8 characters.'
            }
            break;
        case 'user-rol':
        case 'userRol':
           let rolEntered = elemento.value;
           let options = document.getElementsByTagName('option');
           let roles = [];
            for (let i = 0; i <options.length ; i++) {
                roles.push(options[i].value);
            }
           if(roles.includes(rolEntered)){
               smallError.innerHTML='';
           }else{
               smallError.innerHTML='Rol field invalid. Choose one of the select options'

           }
            break;
        case 'userTokens':
            if (typeof (eval(elemento.value))==='number') {
                smallError.innerHTML = '';
            } else {
                smallError.innerHTML = 'Tokens must be a number.';
            }
            break;
        case 'userTelph':
            let regex = /^\+((?:9[679]|8[035789]|6[789]|5[90]|42|3[578]|2[1-689])|9[0-58]|8[1246]|6[0-6]|5[1-8]|4[013-9]|3[0-469]|2[70]|7|1)(?:\W*\d){0,13}\d$/;

            if (!regex.test(elemento.value)) {
                smallError.innerHTML = 'Telephone number field must contain a telephone number with international prefix. Example: +34 999 999 999.';
            }else {
                smallError.innerHTML = '';
            }
            break;
    }
}
function comprobarTodos() {
    smalls = document.getElementsByTagName('small');
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