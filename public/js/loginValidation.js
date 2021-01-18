const form = document.querySelector("form");
const emailInput = form.querySelector('input[name="email"]');
const passwordInput = form.querySelector('input[name="password"]');

emailInput.addEventListener('blur', () => {
    markValidation(emailInput, isEmail(emailInput.value));
});

passwordInput.addEventListener('blur', () => {
    markValidation(passwordInput, validatePasswordLength(passwordInput.value));
});

function markValidation(element, condition){
    if(!condition){
        element.classList.add('no-valid');
    }else
		element.classList.remove('no-valid');
}

function isEmail(email) {
    return /\S+@\S+\.\S+/.test(email);
}