let inputs = document.getElementsByTagName('input');
let sendBtn = document.getElementById('signup');
sendBtn.disabled = true;

for (let i = 0; i < inputs.length; i++) {
    let input = inputs[i];
    input.setAttribute('oninput','checkInd(this)');
}
function checkAll(){
    let check = false;
    for (let i = 0; i < inputs.length; i++) {
        let input = inputs[i];
        if (input.classList.contains('is-valid')) {
            check = true;
        } else if (!input.classList.contains('is-valid') && !input.classList.contains('is-invalid')) {
            check = false
        } else {
            check = false;
        }
    }
        sendBtn.disabled = !check;
}
function checkInd(elm){
    let element = elm;
    let inputName = element.name;
    let smallError = element.nextElementSibling;
    let value = element.value;
    switch (inputName) {
        case 'userEmail':
            let regexx = /^((?!\.)[\w-_.]*[^.])(@\w+)(\.\w+(\.\w+)?[^.\W])$/gm;
            let emailEntered = element.value;
            if(regexx.test(value)) {
                smallError.textContent="";
                if(element.classList.contains('is-invalid')){
                    element.classList.remove('is-invalid');
                }
                element.classList.add('is-valid');
            }else{
                smallError.textContent="";
               if(element.classList.contains('is-valid')){
                   element.classList.remove('is-valid');
               }
               if(!element.classList.contains('is-invalid')){
                   element.classList.add('is-invalid');
               }
               smallError.textContent="Invalid email. Example: user@mail.com";
            }
            break;
        case 'userPassword':
            let patron = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
            let passwordEntered = element.value;
            if(patron.test(passwordEntered)) {
                smallError.textContent="";
                if(element.classList.contains('is-invalid')){
                    element.classList.remove('is-invalid');
                }
                element.classList.add('is-valid');
            }else{
                smallError.textContent="";
                if(element.classList.contains('is-valid')){
                    element.classList.remove('is-valid');
                }
                if(!element.classList.contains('is-invalid')){
                    element.classList.add('is-invalid');
                }
                smallError.textContent="Password field invalid. At least one of the following characters: lowercase, uppercase, number and length equal or greater than 8 characters.";
            }
            break;
        case 'userTelph':
            let regex = /^\+((?:9[679]|8[035789]|6[789]|5[90]|42|3[578]|2[1-689])|9[0-58]|8[1246]|6[0-6]|5[1-8]|4[013-9]|3[0-469]|2[70]|7|1)(?:\W*\d){0,13}\d$/;
            if (regex.test(element.value)) {
                smallError.textContent="";
                if(element.classList.contains('is-invalid')){
                    element.classList.remove('is-invalid');
                }
                element.classList.add('is-valid');
            }else {
                smallError.textContent="";
                if(element.classList.contains('is-valid')){
                    element.classList.remove('is-valid');
                }
                if(!element.classList.contains('is-invalid')){
                    element.classList.add('is-invalid');
                }
                smallError.textContent="Invalid number. Example:+34 654321234 or +34 666 666 666.";
            }
            break;
        default:
            element.classList.add('is-valid');
            break;
    }
    checkAll();
}