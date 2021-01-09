const titleInput = document.querySelector('input[name="title"]');
const localizationInput = document.querySelector('input[name="localization"]');
const experienceInput = document.querySelector('input[name="experience"]');
const addButton = document.querySelector('button[name="addAnnouncement"]');

const allInputs = document.querySelectorAll('input');
const description = document.getElementsByTagName('textarea');

function isAllCorrect(){
    if(description[0].classList.contains('no-valid'))
        return;
    for(i = 0; i < allInputs.length; i++){
        if(allInputs[i].classList.contains('no-valid'))
            return;
    }
    addButton.disabled = false;
}


titleInput.addEventListener('blur', () => {
    markValidation(titleInput, validateTitle(titleInput.value));
    isAllCorrect();
});

localizationInput.addEventListener('blur', () => {
    markValidation(localizationInput, validateCity(localizationInput.value));
    isAllCorrect();
});

experienceInput.addEventListener('blur', () => {
    markValidation(experienceInput, validateExperience(experienceInput.value));
    isAllCorrect();
});

description[0].addEventListener('blur', () => {
    markValidation(description[0], validateTitle(description[0].value));
    isAllCorrect();
});


