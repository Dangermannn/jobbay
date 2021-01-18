const hamburger = document.querySelector('.nav .nav-bar .nav-list .hamburger');
const mobileMenu = document.querySelector('.nav .nav-bar .nav-list ul');
const menuItem = document.querySelectorAll('.nav .nav-bar .nav-list ul li a');
const header = document.querySelector('.nav .nav-bar');

const MAX_INACTIVITY = 900;
let logoutTimer = MAX_INACTIVITY; // in seconds

setInterval(updateTimer, 1000);

hamburger.addEventListener('click', () => {
	hamburger.classList.toggle('active');
	mobileMenu.classList.toggle('active');
	header.classList.toggle('active-nav');
});

menuItem.forEach(element => {
  	element.addEventListener('click', () => {
		hamburger.classList.toggle('active');
		mobileMenu.classList.toggle('active');
	  });
});

function updateTimer(){
	logoutTimer--;
	if(logoutTimer < 1)
		window.location = 'logout';
}

function isEmail(email) {
    return /\S+@\S+\.\S+/.test(email);
}

function validatePasswordLength(password){
    return password.length >= 8 || password.value != null;
}

function arePasswordsSame(password, confirmPassword){
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

function validateTitle(title){
	return title.length > 4;
}

function validateExperience(experience){
	return !isNaN(experience) && 
        	parseInt(Number(experience)) == experience && 
        	!isNaN(parseInt(experience, 10));
}

function markValidation(element, condition){
    if(!condition){
        element.classList.add('no-valid');
    }else
		element.classList.remove('no-valid');
}

function checkIfFieldIsEmpty(value){
	let temp = value.trim();
	return temp.length == 0 ? true : false;
}

function routeToAddingAnnouncement(){
	window.location.href = 
	window.location.href.substr(0, window.location.href.lastIndexOf('/'))
		 + "/announcementForm";
}