var btnChangeStatus = document.querySelectorAll('.btnChangeStatus');


// *[English]* Loop used to display the good icone for buttons of administration of status
// *[Français]* Boucle utilisée pour afficher le bon icône sur les boutons d'administration des statuts
for (var i=0; i<btnChangeStatus.length; i++) {
//    if (btnChangeStatus[i].parentElement.innerHTML.search('BDE') > -1 || btnChangeStatus[i].parentElement.innerHTML.search('Etudiant') > -1) {
//        btnChangeStatus[i].addEventListener('click', function() {
//            var that = this;
//            setTimeout(function() {
//                if (that.style.backgroundColor == "var(--exia-red1)") {
//                    that.style.backgroundImage = "url(site_picture/up.svg)";
//                    that.style.backgroundColor = "green";
//                    that.parentElement.innerHTML = that.parentElement.innerHTML.replace("BDE", "Etudiant");
//                } else {
//                    that.style.backgroundImage = "url(site_picture/down.svg)";
//                    that.style.backgroundColor = "var(--exia-red1)";
//                    that.parentElement.innerHTML = that.parentElement.innerHTML.replace("Etudiant", "BDE");
//                }
//            }, 20);
//        });
//    }
    
    if (btnChangeStatus[i].parentElement.innerHTML.search('BDE') > -1) {
        btnChangeStatus[i].style.backgroundImage = "url(site_picture/down.svg)";
        btnChangeStatus[i].style.backgroundColor = "var(--exia-red1)";
    } else if (btnChangeStatus[i].parentElement.innerHTML.search('Salarié') > -1) {
        btnChangeStatus[i].remove();
    }
}