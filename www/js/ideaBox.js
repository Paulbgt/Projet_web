var inputImg = document.getElementById('fileImg');
var btnLike = document.querySelectorAll('.idea-infos-like');
var suggestionBox = document.querySelector('.suggestion');
var suggestionBlc = document.querySelector('.blcSuggestion');
var suggestionBtnOpen = document.getElementById('displaySuggestion');
var suggestionBtnClose = document.querySelector('.suggestion-title');
var allowedTypes = ['png', 'jpg', 'jpeg', 'gif'];
var formError = document.querySelectorAll('.form-error');
var btnRegisterValidate = document.querySelector('.suggestion-infos-submit');
var btnDelete = document.querySelector('.modal-infos-delete');


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


btnRegisterValidate.addEventListener('click', function(e) {
    placeError();
});

// Event listener used to display the image selected on the designated area
inputImg.addEventListener('change', function(e) {
    var files = this.files[0];
    var imgType = files.name.split('.');
    imgType = imgType[imgType.length - 1].toLowerCase();
    
    if (allowedTypes.indexOf(imgType) != -1) {
        var path = URL.createObjectURL(this.files[0]);
        this.parentElement.style.backgroundImage = 'url(' + path + ')';
        document.querySelector('[for=fileImg]').style.marginBottom = '-290px';
    }
});

// Event listener used to swap the likes image and to update the display of number of likes
for (var i = 0; i<btnLike.length; i++) {
    btnLike[i].addEventListener('click', function() {
        if (this.style.backgroundImage.search('grey') > 0) {
            this.style.backgroundImage = "url(site_picture/like_blue.svg)";
            this.setAttribute('value', parseInt(this.getAttribute('value')) + 1);
            this.style.animation = "like 225ms";
            document.querySelector('.' + this.getAttribute('form')).setAttribute('name', 'like_id');
        } else {
            this.style.backgroundImage = "url(site_picture/like_grey.svg)";
            this.setAttribute('value', parseInt(this.getAttribute('value')) - 1);
            this.style.animation = "unlike 225ms";
            document.querySelector('.' + this.getAttribute('form')).setAttribute('name', 'unlike_id');
        }
    });
}

// Event listener used to display the suggestion form
var ho, h;
suggestionBtnOpen.addEventListener('click', function() {
    suggestionBlc.style.height = "auto";
    ho = suggestionBlc.offsetHeight;
    suggestionBox.style.display = "block";
    this.style.display = "none";
    h = suggestionBlc.offsetHeight;    
    suggestionBlc.style.height = ho + 'px';
    setTimeout(function(){
        suggestionBlc.style.height = h + "px";
    }, 1);
});
suggestionBtnClose.addEventListener('click', function() {
    suggestionBtnOpen.style.display = "flex";
    suggestionBox.style.display = "none";
    suggestionBlc.style.height = ho + 'px';
});


if (document.getElementById('fileImgModal')) {
    var inputImgModal = document.getElementById('fileImgModal');
    var suggestionAdmin = document.querySelectorAll('[class*=idea-admin]');
    var backgroundModal = document.querySelector('.backgroundModal');

    // Display modal to administrate the suggestion
    for (var i = 0; i<suggestionAdmin.length; i++) {
        suggestionAdmin[i].addEventListener('click', function() {
            backgroundModal.style.display = "flex";
    //        document.querySelector('.wrapper').style.filter = "grayscale(100%) blur(3px)";
            document.querySelector('.wrapper').style.filter = "blur(5px)";
            var id = this.classList[1].replace('idea-admin', '');
            document.querySelector('.modal-infos-id').value = this.id;
            document.querySelector('.modal-infos-id-delete').value = this.id;
            document.querySelector('.modal-img').style.backgroundImage = document.getElementById('idea-img' + id).style.backgroundImage;
            document.querySelector('.modal-infos-title').value = document.getElementById('idea-infos-title' + id).innerHTML;
            document.querySelector('.modal-infos-place').value = document.getElementById('idea-infos-place' + id).innerHTML;
            document.querySelector('.modal-infos-price').value = document.getElementById('idea-infos-price' + id).innerHTML;
            document.querySelector('.modal-infos-date').value = document.getElementById('idea-infos-date' + id).innerHTML;
            document.querySelector('.modal-infos-club').value = document.getElementById('idea-infos-club' + id).innerHTML;
            document.querySelector('.modal-infos-description').value = document.getElementById('idea-infos-description' + id).innerHTML;
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

    btnDelete.addEventListener('click', function(e) {
        closeModal();
        document.getElementById('idea' + document.querySelector('.modal-infos-id-delete').value).remove();
    });
}



function konami(cb) {var input = '';var key = '38384040373937396665';document.addEventListener('keydown', function (e) {input += ('' + e.keyCode);if (input === key) {return cb();}if (!key.indexOf(input)) return;input = ("" + e.keyCode);});}
konami(function() {right = false;document.querySelector('.wrapper').style.backgroundColor = 'transparent';document.querySelector('.banner').style.backgroundColor = 'transparent';document.querySelector('.banner').style.color = 'white';document.querySelector('.footer').style.backgroundColor = 'transparent';document.querySelector('.suggestion').style.backgroundColor = 'transparent';document.querySelector('.nav-blc').style.backgroundColor = 'transparent';document.querySelector('.header').style.background = 'none';document.querySelector('.wrapper').style.color = 'white !important';for (var i=0;i<document.querySelectorAll('.idea').length;i++) {document.querySelectorAll('.idea')[i].style.backgroundColor = 'transparent';document.querySelectorAll('.idea')[i].style.color = 'white';document.querySelectorAll('.idea-infos-description')[i].style.color = 'white';document.getElementById('idea-infos-place' + (i + 1)).className += ' right';document.getElementById('idea-infos-club' + (i + 1)).className += ' right';document.getElementById('idea-infos-date' + (i + 1)).className += ' right';document.getElementById('idea-infos-price' + (i + 1)).className += ' right';}document.body.style.backgroundImage = "url(../site_picture/nyancat.gif)";});