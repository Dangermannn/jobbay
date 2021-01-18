const form = document.querySelector("form");
const emailInput = form.querySelector('input[name="email"]');
const cityInput = form.querySelector('input[name="city"]');
const profileName = form.querySelector('input[name="profile-name"]');
const password = form.querySelector('input[name="password"]');
const confirmedPasswordInput = form.querySelector('input[name="confirm-password"]');
const signUpButton = form.querySelector('button[name="sign-up"]');


const allInputs = form.querySelectorAll('input');
const description = form.getElementsByTagName('textarea');


cityInput.addEventListener('blur', () => {
    markValidation(cityInput, validateCity(cityInput.value));
    isAllCorrect();
});

description[0].addEventListener('blur', () => {
    markValidation(description[0], validateDescription(description[0].value));
    isAllCorrect();
});

emailInput.addEventListener('blur', () => {
    markValidation(emailInput, isEmail(emailInput.value))
    isAllCorrect();
});

confirmedPasswordInput.addEventListener('blur', () => {
    const condition = arePasswordsSame(
        password.value, confirmedPasswordInput.value
    );
    markValidation(confirmedPasswordInput, condition)
});

profileName.addEventListener('blur', () => {
    markValidation(profileName, validateProfileName(profileName.value));
    isAllCorrect();
});

password.addEventListener('blur', () => {
    markValidation(password, validatePasswordLength(password.value));
    isAllCorrect();
});

function isAllCorrect(){
    if(description[0].classList.contains('no-valid'))
        return;
    for(i = 0; i < allInputs.length; i++){
        if(allInputs[i].classList.contains('no-valid'))
            return;
    }
    signUpButton.disabled = false;
}


function routeToLogin(){
    window.location.href = window.location.href.substr(0, window.location.href.lastIndexOf('/')) + "/login";
}

function markValidation(element, condition){
    if(!condition){
        element.classList.add('no-valid');
    }else
        element.classList.remove('no-valid');
}

