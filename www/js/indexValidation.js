var validationRegister = document.getElementById('submitRegister');
var validationConnection = document.getElementById('submitConnection');
var inputRegister = document.querySelectorAll('[class*=form-register-input]');
var inputConnection = document.querySelectorAll('[class*=form-connection-input]');
var formError = document.querySelectorAll('.form-error');

validationRegister.addEventListener('click', function(e) {
    for (var i = 0; i<formError.length; i++) {
        formError[i].style.opacity = 0;
    }
	for(var i = 0 ; i<inputRegister.length ; i++ ){
		switch(inputRegister[i].type) {
		case 'text' : checkText(inputRegister[i], e); break;
		case 'password' : checkPassword(inputRegister[i], e); break;
		case 'email' : checkMail(inputRegister[i], e); break;
		}
	}
});

validationConnection.addEventListener('click', function(e) {
    for (var i = 0; i<formError.length; i++) {
        formError[i].style.opacity = 0;
    }
	for(var i = 0 ; i<inputConnection.length ; i++ ){
		switch(inputConnection[i].type) {
		case 'password' : checkPassword(inputConnection[i], e); break;
		case 'email' : checkMail(inputConnection[i], e); break;
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
	var regex = /^[a-zA-Z0-9.\\\!\^\$\(\)\+\*\}\{\[\]\?\/\|\_-]/;

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

function displayError(element){
    document.querySelector('[for=' + element.id + ']').style.opacity = 1;
}