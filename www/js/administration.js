var btnChangeStatus = document.querySelectorAll('.btnChangeStatus');

for (var i=0; i<btnChangeStatus.length; i++) {
    if (btnChangeStatus[i].parentElement.innerHTML.search('BDE') > -1) {
        btnChangeStatus[i].style.backgroundImage = "url(site_picture/down.svg)";
        btnChangeStatus[i].style.backgroundColor = "var(--exia-red1)";
    }
}