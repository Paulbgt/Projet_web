var validationIdea = document.getElementById('submitIdea');
var inputTitle = document.querySelector('.suggestion-infos-title');
var inputDescription = document.querySelector('.suggestion-infos-description');
var formError = document.querySelectorAll('.form-error');

// *[English]* Verify if the field is correct when we click on the register button and check the type of field
// *[Français]* Vérifier si le champ est correcte quand on clique sur le bouton enregistrer et on vérifie le type de champ
validationIdea.addEventListener('click', function(e) {
    for (var i = 0; i<formError.length; i++) {
        formError[i].style.opacity = 0;
    }
		checkText(inputTitle, e);
		checkText(inputDescription, e);
});

// *[English]* Function that is used for check the text area and prevent the form to being sent
// *[Français]* Fonction qui permet de vérifier le champ texte et empêche l'envoi du formulaire
function checkText(element, e){
	if(element.value == ""){
		e.preventDefault();
		displayError(element);
	}
}

// *[English]* Function that is used for display an error in the incorrect field
// *[Français]* Fonction qui permet d'afficher une erreur dans le champ incorrect
function displayError(element){
    document.querySelector('[for=' + element.id + ']').style.opacity = 1;
}