var navButton = document.getElementById('nav-btn-svg');
var navButtonPhone = document.querySelector('.navPhone-btn');
var navBloc = document.querySelector('.nav-blc');
var navBlocPhone = document.querySelector('.navPhone-blc');
var showMenu = false;
var right = true;


navButton.addEventListener('click', function() {
    if (!showMenu) {
        this.children[0].style.transform = "rotate(33deg)";
        this.children[1].style.transform = "scale(0)";
        this.children[2].style.transform = "rotate(-33deg)";
        right ? this.parentElement.style.backgroundColor = "var(--exia-red2)" : null;
//        navBloc.style.transform = "scale(1)";
        navBloc.style.height = "160px";
        navBloc.children[0].style.display = "block";
        showMenu = true;
    } else {
        this.children[0].style.transform = "rotate(0)";
        this.children[1].style.transform = "scale(1)";
        this.children[2].style.transform = "rotate(0)";
        this.parentElement.style.backgroundColor = "transparent";
//        navBloc.style.transform = "scale(0)";
        navBloc.style.height = "0";
        setTimeout(function() {
            navBloc.children[0].style.display = "none";
        }, 500);
        showMenu = false;
    }
});

navButtonPhone.addEventListener('click', function() {
    if (!showMenu) {
        this.children[0].children[0].style.transform = "rotate(33deg)";
        this.children[0].children[1].style.transform = "scale(0)";
        this.children[0].children[2].style.transform = "rotate(-33deg)";
        this.style.backgroundColor = "var(--exia-red2)";
//        navBloc.style.transform = "scale(1)";
        navBlocPhone.style.height = "auto";
        var h = navBlocPhone.offsetHeight;
        navBlocPhone.style.height = "0";
        setTimeout(function(){
            navBlocPhone.style.height = h + "px";
        }, 1);
        
//        navBlocPhone.children[0].style.display = "block";
        showMenu = true;
    } else {
        this.children[0].children[0].style.transform = "rotate(0)";
        this.children[0].children[1].style.transform = "scale(1)";
        this.children[0].children[2].style.transform = "rotate(0)";
        this.style.backgroundColor = "transparent";
//        navBloc.style.transform = "scale(0)";
        navBlocPhone.style.height = "0";
//        setTimeout(function() {
//            navBlocPhone.children[0].style.display = "none";
//        }, 500);
        showMenu = false;
    }
});