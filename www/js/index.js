var wrapper = document.querySelector('.authentication');
var btnRegister = document.querySelector('.form-btnRegister');
var btnConnection = document.querySelector('.form-btnConnection');
var formConnection = document.querySelector('.form-connection');
var formRegister = document.querySelector('.form-register');
var formOnRegister = true;


function switchForm(element) {
    wrapper.children[3].style.transition = "all 225ms, opacity 100ms";
    wrapper.children[3].style.opacity = "0";
    wrapper.style.width = "130px"; //130 ou 210 pour croiser ou faire le logo
    wrapper.style.height = "130px"; //130 ou 220 pour croiser ou faire le logo
    
    setTimeout(function() {
        wrapper.children[3].style.transition = "all 225ms, opacity 800ms";
        wrapper.children[3].style.opacity = "1";
        wrapper.style.width = "500px";
        wrapper.style.height = "400px";
        element.style.display = "block";
    }, 800);
}



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