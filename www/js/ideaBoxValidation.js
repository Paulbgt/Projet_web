var validationIdea = document.getElementById('submitIdea');
var inputTitle = document.querySelector('.suggestion-infos-title');
var inputDescription = document.querySelector('.suggestion-infos-description');
var formError = document.querySelectorAll('.form-error');

//Verify if the field is correct when we click on the register button and check the type of field
validationIdea.addEventListener('click', function(e) {
    for (var i = 0; i<formError.length; i++) {
        formError[i].style.opacity = 0;
    }
		checkText(inputTitle, e);
		checkText(inputDescription, e);
});

//Check the text field and prevent the form from being sent
function checkText(element, e){
	if(element.value == ""){
		e.preventDefault();
		displayError(element);
	}
}

//Display an error in the incorrect field
function displayError(element){
    document.querySelector('[for=' + element.id + ']').style.opacity = 1;
}