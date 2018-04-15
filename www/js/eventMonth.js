var btnSubsCount = document.querySelectorAll('.event-infos-subsCount');
var btnSubscribe= document.querySelectorAll('.event-infos-subscribe');

// Event listener used to swap the subscribe image and to update the display of number of subscribe
for (var i = 0; i<btnSubsCount.length; i++) {
    btnSubsCount[i].addEventListener('click', function() {
        if (this.style.backgroundImage.search('empty') > 0) {
            this.style.backgroundImage = "url(img/subscribe_full.svg)";
            this.setAttribute('value', parseInt(this.getAttribute('value')) + 1);
            document.getElementById("subscribe" + this.id.replace('subsCount', '')).value = "Se désinscrire";
        } else {
            this.style.backgroundImage = "url(img/subscribe_empty.svg)";
            this.setAttribute('value', parseInt(this.getAttribute('value')) - 1);
            document.getElementById("subscribe" + this.id.replace('subsCount', '')).value = "S'inscrire";
        }
    });
}

for (var i = 0; i<btnSubscribe.length; i++) {
    btnSubscribe[i].addEventListener('click', function() {
        var icone = document.getElementById("subsCount" + this.id.replace('subscribe', ''));
        if (this.value == "S'inscrire") {
            icone.style.backgroundImage = "url(img/subscribe_full.svg)";
            icone.setAttribute('value', parseInt(icone.getAttribute('value')) + 1);
            this.value = "Se désinscrire";
        } else {
            icone.style.backgroundImage = "url(img/subscribe_empty.svg)";
            icone.setAttribute('value', parseInt(icone.getAttribute('value')) - 1);
            this.value = "S'inscrire";
        }
    });
}






if (document.getElementById('fileImgModal')) {
    var inputImgModal = document.getElementById('fileImgModal');
    var eventAdmin = document.querySelectorAll('[class*=event-admin]');
    var backgroundModal = document.querySelector('.backgroundModal');


    // Display modal to administrate the suggestion
    for (var i = 0; i<eventAdmin.length; i++) {
        eventAdmin[i].addEventListener('click', function() {
            backgroundModal.style.display = "flex";
    //        document.querySelector('.wrapper').style.filter = "grayscale(100%) blur(3px)";
            document.querySelector('.wrapper').style.filter = "blur(5px)";
            var id = this.classList[1].replace('event-admin', '');
            document.querySelector('.modal-infos-id').value = this.id;
            document.querySelector('.modal-infos-id-delete').value = this.id;
            document.querySelector('.modal-img').style.backgroundImage = document.getElementById('event-img' + id).style.backgroundImage;
            document.querySelector('.modal-infos-title').value = document.getElementById('event-infos-title' + id).innerHTML;
            document.querySelector('.modal-infos-place').value = document.getElementById('event-infos-place' + id).innerHTML;
            document.querySelector('.modal-infos-price').value = document.getElementById('event-infos-price' + id).innerHTML;
            document.querySelector('.modal-infos-date').value = document.getElementById('event-infos-date' + id).innerHTML;
            document.querySelector('.modal-infos-club').value = document.getElementById('event-infos-club' + id).innerHTML;
            document.querySelector('.modal-infos-description').value = document.getElementById('event-infos-description' + id).innerHTML;
        });
    }

    inputImgModal.addEventListener('change', function(e) {
        var files = this.files[0];
        var imgType = files.name.split('.');
        imgType = imgType[imgType.length - 1].toLowerCase();

        if (allowedTypes.indexOf(imgType) != -1) {
            var path = URL.createObjectURL(this.files[0]);
            this.parentElement.style.backgroundImage = 'url(' + path + ')';
        }
    });



    function closeModal() {
        backgroundModal.style.display = "none";
        document.querySelector('.wrapper').style.filter = "none";
    }

    document.querySelector('.modal-close').addEventListener('click', function() {
        closeModal();
    });

    backgroundModal.addEventListener('click', function(e) {
        if (e.clientX < this.children[0].offsetLeft || e.clientX > this.children[0].offsetLeft + this.children[0].offsetWidth || e.clientY < this.children[0].offsetTop || e.clientY > this.children[0].offsetTop + this.children[0].offsetHeight) {
            closeModal();
        }
    });
}
