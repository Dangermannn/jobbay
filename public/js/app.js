const hamburger = document.querySelector('.nav .nav-bar .nav-list .hamburger');
const mobileMenu = document.querySelector('.nav .nav-bar .nav-list ul');
const menuItem = document.querySelectorAll('.nav .nav-bar .nav-list ul li a');
const header = document.querySelector('.nav.nav-bar');


hamburger.addEventListener('click', () => {
	hamburger.classList.toggle('active');
	mobileMenu.classList.toggle('active');
});

document.addEventListener('scroll', () => {
	var scrollPosition = window.scrollY;
	if(scrollPosition > 250){
		header.style.backgroundColor = "#29323c";
	} else{
		header.style.backgroundColor = "transparent";
	}
})

menuItem.forEach(element => {
  	element.addEventListener('click', () => {
		hamburger.classList.toggle('active');
		mobileMenu.classList.toggle('active');
	  });
});
