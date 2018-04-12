var validationIdea = document.getElementById('submitIdea');
var inputTitle = document.querySelectorAll('[class*=suggestion-infos-title]');
var inputDescription = document.querySelectorAll('[class*=suggestion-infos-description]');
var formError = document.querySelectorAll('.form-error');

validationIdea.addEventListener('click', function(e) {

        formError[i].style.opacity = 0;
		checkText(inputTitle[i], e);
		checkText(inputDescription[i], e);
	}
});

function checkText(element, e){
	var regex = /^[a-zA-Z][a-z]+([-'\s][a-zA-Z])?/;

	if(regex.test(element.value) == false){
		e.preventDefault();
		displayError(element);
	}
}

function displayError(element){
    document.querySelector('[for=' + element.id + ']').style.opacity = 1;
}