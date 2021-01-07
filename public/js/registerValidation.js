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
    return password.length >= 8 || password.value != null;
}

function arePasswordsSame(password, confirmPassword){
    console.log(password + "      " + confirmPassword);
    return confirmPassword != "" && password === confirmPassword;
}

function validateCity(city){
    return city.length >= 4 || city.value != null;
}

function validateProfileName(profileName){
    return profileName.length > 5 || profileName.value != null;
}

function validateDescription(description){
    return description.length >= 40 || description.value != null;
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
    console.log("COND: " + condition);
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


function routeToLogin(){
    window.location.href = window.location.href.substr(0, window.location.href.lastIndexOf('/')) + "/login";
}
