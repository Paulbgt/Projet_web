var wrapper = document.querySelector('.authentification');
var btnRegister = document.querySelector('.form-btnRegister');
var btnConnection = document.querySelector('.form-btnConnection');
var formError = document.querySelectorAll('.form-error');
var formConnection = document.querySelector('.form-connection');
var formRegister = document.querySelector('.form-register');
var formOnRegister = true;
var btnRegisterValidate = document.querySelector('.form-register-validate');
var btnConnectionValidate = document.querySelector('.form-connection-validate');


// *[English]* Functions used animate the exia logo
// *[Français]* Fonctions servant à animer le logo exia
function switchForm(element) {
    wrapper.children[3].style.transition = "all 225ms, opacity 100ms";
    wrapper.children[3].style.opacity = "0";
    if (window.innerWidth < 767) {
        wrapper.style.width = "210px"; //130 ou 210 pour croiser ou faire le logo
        wrapper.style.height = "220px"; //130 ou 220 pour croiser ou faire le logo
    } else {
        wrapper.style.width = "130px"; //130 ou 210 pour croiser ou faire le logo
        wrapper.style.height = "130px"; //130 ou 220 pour croiser ou faire le logo
    }
    
    setTimeout(function() {
        wrapper.children[3].style.transition = "all 225ms, opacity 800ms";
        wrapper.children[3].style.opacity = "1";
        wrapper.style.width = "500px";
        wrapper.style.height = "400px";
        element.style.display = "block";
    }, 800);
}

// *[English]* Function used to place the error message
// *[Français]* Fonction servant à placer le message d'erreur
function placeError() {
    for (var i = 0; i<formError.length; i++) {
        formError[i].style.width = '0px';
        var parentInput = document.getElementById(formError[i].getAttribute('for'));
        formError[i].style.top = parentInput.offsetTop + 'px';
        formError[i].style.left = parentInput.offsetLeft + 'px';
        formError[i].style.width = parentInput.offsetWidth - 1 + 'px';
        formError[i].style.height = parentInput.offsetHeight + 'px';
    }
}


// *[English]* Event listeners used to display the register/connection form
// *[Français]* Evénements servant à afficher les formulaires d'inscription/connexion
btnRegister.addEventListener('click', function() {
    if (!formOnRegister) {
        switchForm(formRegister);
        btnConnection.style.border = "1px solid grey";
        btnConnection.style.backgroundColor = "var(--exia-grey2)";
        this.style.border = "none";
        this.style.backgroundColor = "transparent";
        formConnection.style.display = "none";
        formOnRegister = true;
    }
});

btnConnection.addEventListener('click', function() {
    if (formOnRegister) {
        switchForm(formConnection);
        btnRegister.style.border = "1px solid grey";
        btnRegister.style.backgroundColor = "var(--exia-grey2)";
        this.style.border = "none";
        this.style.backgroundColor = "transparent";
        formRegister.style.display = "none";
        formOnRegister = false;
    }
});


btnRegisterValidate.addEventListener('click', function(e) {
    placeError();
});

btnConnectionValidate.addEventListener('click', function(e) {
    placeError();
});