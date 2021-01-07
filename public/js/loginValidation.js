const form = document.querySelector("form");
const emailInput = form.querySelector('input[name="email"]');
const passwordInput = form.querySelector('input[name="password"]');

function isEmail(email) {
    return /\S+@\S+\.\S+/.test(email);
}

function validatePasswordLength(password){
    return password.length >= 8;
}

function markValidation(element, condition){
    if(!condition){
        element.classList.add('no-valid');
    }else
        element.classList.remove('no-valid');
}

emailInput.addEventListener('blur', () => {
    console.log('leaving');
    markValidation(emailInput, isEmail(emailInput.value));
});

passwordInput.addEventListener('blur', () => {
    console.log('password leave');
    markValidation(passwordInput, validatePasswordLength(passwordInput.value));
});