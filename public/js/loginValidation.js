const form = document.querySelector("form");
const emailInput = form.querySelector('input[name="email"]');
const passwordInput = form.querySelector('input[name="password"]');

emailInput.addEventListener('blur', () => {
    markValidation(emailInput, isEmail(emailInput.value));
});

passwordInput.addEventListener('blur', () => {
    markValidation(passwordInput, validatePasswordLength(passwordInput.value));
});