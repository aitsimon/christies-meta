let inputs = document.getElementsByTagName('input');
let sendBtn = document.getElementById('submitBtn');
let commentTextArea = document.getElementById('userComment');
commentTextArea.setAttribute('oninput','checkInd(this)');
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
    let value = element.value;
    switch (inputName) {
        case 'userEmail':
            let regexx = /^((?!\.)[\w-_.]*[^.])(@\w+)(\.\w+(\.\w+)?[^.\W])$/gm;
            let emailEntered = element.value;
            if(regexx.test(value)) {
                if(element.classList.contains('is-invalid')){
                    element.classList.remove('is-invalid');
                }
                element.classList.add('is-valid');
            }else{
               if(element.classList.contains('is-valid')){
                   element.classList.remove('is-valid');
               }
               if(!element.classList.contains('is-invalid')){
                   element.classList.add('is-invalid');
               }
            }
            break;
        case 'userName':
            let patron = /^[a-z\s]{3,}$/i;
            let passwordEntered = element.value;
            if(patron.test(passwordEntered)) {
                if(element.classList.contains('is-invalid')){
                    element.classList.remove('is-invalid');
                }
                element.classList.add('is-valid');
            }else{
                if(element.classList.contains('is-valid')){
                    element.classList.remove('is-valid');
                }
                if(!element.classList.contains('is-invalid')){
                    element.classList.add('is-invalid');
                }
            }
            break;
        case 'userComment':
            let regex = /^[\s\w]{10,500}$/;
            if (regex.test(element.value)) {
                if(element.classList.contains('is-invalid')){
                    element.classList.remove('is-invalid');
                }
                element.classList.add('is-valid');
            }else {
                if(element.classList.contains('is-valid')){
                    element.classList.remove('is-valid');
                }
                if(!element.classList.contains('is-invalid')){
                    element.classList.add('is-invalid');
                }
            }
            break;
        default:
            element.classList.add('is-valid');
            break;
    }
    checkAll();
}