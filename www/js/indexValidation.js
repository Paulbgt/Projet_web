var validationRegister = document.getElementById('submitRegister');
var validationConnection = document.getElementById('submitConnection');
var inputRegister = document.querySelectorAll('[class*=form-register-input]');
var lastName = document.getElementById('lastName');
var firstName = document.getElementById('firstName');
var passwordRegister = document.getElementById('passwordRegister');
var mailRegister = document.getElementById('mailRegister');

validationRegister.addEventListener('click', function(e) {
	for(var i = 0 ; i<inputRegister.length ; i++ ){
		console.log(i);
		switch(inputRegister[i].type) {
		case 'text' : checkText(inputRegister[i], e); break;
		case 'password' : checkPassword(inputRegister[i], e); break;
		case 'email' : checkMail(inputRegister[i], e); break;
		}

	}
});

function checkText(element, e){
	var regex = /^[a-zA-Z][a-z]+([-'\s][a-zA-Z])?/;

	if(regex.test(element.value) == false && !element.value.length < 30){
		e.preventDefault();
		displayError(element);
	}
}

function checkPassword(element, e){
	var regex = /^[a-zA-Z0-9.\\\!\^\$\(\)\_-]/;

	if(regex.test(element.value) == false && !element.value.length < 30){
		e.preventDefault();
		displayError(element);
	}
}

function checkMail(element, e){
	var regex = /^[a-zA-Z0-9._-]+@(via){0,1}cesi\.fr/;

	if(regex.test(element.value) == false && !element.value.length < 70){
		e.preventDefault();
		displayError(element);
	}
}

function displayError(element, e){
	element.classList.add(element.classList[1].replace('input', 'input--error'));
	element.classList.remove(element.classList[1]);
}