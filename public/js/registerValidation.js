const form = document.querySelector("form");
const emailInput = form.querySelector('input[name="email"]');
const cityInput = form.querySelector('input[name="city"]');
const profileName = form.querySelector('input[name="profile-name"]');
const password = form.querySelector('input[name="password"]');
const confirmedPasswordInput = form.querySelector('input[name="confirm-password"]');
const signUpButton = form.querySelector('button[name="sign-up"]');


const allInputs = form.querySelectorAll('input');
//const description = form.querySelector('textarea["profile-description"]');
const description = form.getElementsByTagName('textarea');
function isEmail(email) {
    return /\S+@\S+\.\S+/.test(email);
}

function validatePasswordLength(password){
    return password.length >= 8;
}

function arePasswordsSame(password, confirmPassword){
    return password === confirmPassword;
}

function validateCity(city){
    return city.length >= 4;
}

function validateProfileName(profileName){
    return profileName.length > 5;
}

function validateDescription(description){
    return description.length >= 40;
}

function markValidation(element, condition){
    if(!condition){
        element.classList.add('no-valid');
        signUpButton.disabled = true;
    }else
        element.classList.remove('no-valid');
}

function isAllCorrect(){
    if(description[0].classList.contains('no-valid'))
        return;
    for(i = 0; i < allInputs.length; i++){
        if(allInputs[i].classList.contains('no-valid'))
            return;
    }
    signUpButton.disabled = false;
}

cityInput.addEventListener('keyup', () => {
    setTimeout(() => {
        markValidation(cityInput, validateCity(cityInput.value))
    }, 1000);
    isAllCorrect();
});

description[0].addEventListener('keyup', () => {
    setTimeout(() => {
        markValidation(description[0], validateDescription(description[0].value))
    }, 1000);
    isAllCorrect();
});

emailInput.addEventListener('keyup', () => {
    setTimeout(() => {
        markValidation(emailInput, isEmail(emailInput.value))
    }, 1000);
    isAllCorrect();
});

confirmedPasswordInput.addEventListener('keyup', () => {
    setTimeout(() => {
        const condition = arePasswordsSame(
           password.value, confirmedPasswordInput.value
        );
        markValidation(confirmedPasswordInput, condition)
    }, 1000);
});

profileName.addEventListener('keyup', () => {
    setTimeout(() => {
        markValidation(profileName, validateProfileName(profileName.value))
    }, 1000);
    isAllCorrect();
});

password.addEventListener('keyup', () => {
    setTimeout(() => {
        markValidation(password, validatePasswordLength(password.value))
    }, 1000);
    isAllCorrect();
});


function routeToLogin(){
    window.location.href = window.location.href.substr(0, window.location.href.lastIndexOf('/')) + "/login";
}
