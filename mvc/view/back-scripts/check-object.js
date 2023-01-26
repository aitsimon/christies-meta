function previewFile(input,n){
    var file = $("input[type=file]").get(n).files[0];

    if(file){
        var reader = new FileReader();

        reader.onload = function(){
            $("#previewImg"+n).attr("src", reader.result);
        }

        reader.readAsDataURL(file);
    }
}
let latitudeInput = document.getElementById('objectLatitude');
let longitudeInput = document.getElementById('objectLongitude');
if(latitudeInput.value!==''){
   longitudeInput.classList.add('vfI')
}
if(longitudeInput.value!==''){
    latitudeInput.classList.add('vfI');
}
var inputs =document.getElementsByClassName('vfI');
var buttons = document.getElementsByClassName('bt-fo');
var sendBtn = buttons[0];
window.onload = function(){
    for (let i = 0; i <inputs.length; i++) {
        checkInd(inputs[i]);
    }

    checkAll();
}
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
        } else{
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
        case 'objectName':
            let regexx = /^[a-z\s\-]{3,20}$/gmi;
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
        case 'objectPrice':
            let regex = /^\d+\.?\d*$/;
            if(regex.test(value)&&parseFloat(value)>0) {
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
        case 'objectLatitude':
            let regex2 = /^\d+\.?\d*$/;
            if(regex2.test(value)&&parseFloat(value)>-90 && parseFloat(value)<90) {
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
        case 'objectLongitude':
            let regex3 = /^\d+\.?\d*$/;
            if(regex3.test(value)&&parseFloat(value)>-180&&parseFloat(value)<180) {
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
        default:
            element.classList.add('is-valid');
            break;
    }
    checkAll();
}