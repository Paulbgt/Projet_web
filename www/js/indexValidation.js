var validationRegister = document.getElementById('submitRegister');
var validationConnection = document.getElementById('submitConnection');
var inputRegister = document.querySelectorAll('[class*=form-register-input]');
var inputConnection = document.querySelectorAll('[class*=form-connection-input]');
var formError = document.querySelectorAll('.form-error');

// *[English]* Verify if the field is correct when we click on the register button and check the type of field
// *[Français]* Vérifier si le champ est correcte quand on clique sur le bouton enregistrer et on vérifie le type de champ
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

// *[English]* Verify if the field is correct when we click on the connection button and check the type of field
// *[Français]* Vérifier si le champ est correcte quand on clique sur le bouton connexion et on vérifie le type de champ
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

// *[English]* Function that is used for check the text area and prevent the form to being sent
// *[Français]* Fonction qui permet de vérifier le champ texte et empêche l'envoi du formulaire
function checkText(element, e){
	var regex = /^[a-zA-Z][a-z]+([-'\s][a-zA-Z])?/;

	if(regex.test(element.value) == false && !element.value.length < 30){
		e.preventDefault();
		displayError(element);
	}
}

// *[English]* Function that is used for check the password area and prevent the form to being sent
// *[Français]* Fonction qui permet de vérifier le champ mot de passe et empêche l'envoi du formulaire
function checkPassword(element, e){
	var regex = /(?=.*[A-Z])(?=.*[0-9])/;

	if(regex.test(element.value) == false && !element.value.length < 30){
		e.preventDefault();
		displayError(element);
	}
}

// *[English]* Function that is used for check the mail area and prevent the form to being sent
// *[Français]* Fonction qui permet de vérifier le champ mail et empêche l'envoi du formulaire
function checkMail(element, e){
	var regex = /^[a-zA-Z0-9._-]+@(via){0,1}cesi\.fr/;

	if(regex.test(element.value) == false && !element.value.length < 70){
		e.preventDefault();
		displayError(element);
	}
}

// *[English]* Function that is used for display an error in the incorrect field
// *[Français]* Fonction qui permet d'afficher une erreur dans le champ incorrect
function displayError(element){
    document.querySelector('[for=' + element.id + ']').style.opacity = 1;
}