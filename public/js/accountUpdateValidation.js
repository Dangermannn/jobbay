const passwordInput = document.querySelector('input[name="password"]');
const confirmedPasswordInput = document.querySelector('input[name="confirm-password"]');
const cityInput = document.querySelector('input[name="city"]');
const description = document.getElementsByTagName('textarea');
const saveButton = document.querySelector('button[name="save"]');
const allInputs = document.querySelectorAll('input');


function isAllCorrect(){
    if(description[0].classList.contains('no-valid'))
        return;
    for(i = 0; i < allInputs.length; i++){
        if(allInputs[i].classList.contains('no-valid'))
            return;
    }
    saveButton.disabled = false;
}

passwordInput.addEventListener('blur', () => {
markValidationForUpdate(passwordInput, validatePasswordLength(passwordInput.value));
isAllCorrect();
});

confirmedPasswordInput.addEventListener('blur', () => {
const condition = arePasswordsSame(
    passwordInput.value, confirmedPasswordInput.value
);
markValidationForUpdate(confirmedPasswordInput, condition);
});

cityInput.addEventListener('blur', () => {
markValidationForUpdate(cityInput, validateCity(cityInput.value));
isAllCorrect();
});

description[0].addEventListener('blur', () => {
markValidationForUpdate(description[0], validateDescription(description[0].value));
isAllCorrect();
});

function markValidationForUpdate(element, condition){
    console.log("COND 1: " + !condition + " COND 2: " + checkIfFieldIsEmpty(element.value));
    if(!condition && !checkIfFieldIsEmpty(element.value)){
        element.classList.add('no-valid');
        saveButton.disabled = true;
    }else
		element.classList.remove('no-valid');
}


