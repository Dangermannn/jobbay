const hamburger = document.querySelector('.nav .nav-bar .nav-list .hamburger');
const mobileMenu = document.querySelector('.nav .nav-bar .nav-list ul');
const menuItem = document.querySelectorAll('.nav .nav-bar .nav-list ul li a');
const header = document.querySelector('.nav .nav-bar');


hamburger.addEventListener('click', () => {
	hamburger.classList.toggle('active');
	mobileMenu.classList.toggle('active');
	//header.style.height = "100vh";
	header.classList.toggle('active-nav');
});

/*
document.addEventListener('scroll', () => {
	var scrollPosition = window.scrollY;
	if(scrollPosition > 250){
		header.style.backgroundColor = "#29323c";
	} else{
		header.style.backgroundColor = "transparent";
	}
})
*/
menuItem.forEach(element => {
  	element.addEventListener('click', () => {
		hamburger.classList.toggle('active');
		mobileMenu.classList.toggle('active');
	  });
});



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
    }else
		element.classList.remove('no-valid');
}

function checkIfFieldIsEmpty(value){
	let temp = value.trim();
	return temp.length == 0 ? true : false;
}