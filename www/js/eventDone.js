var btnLike = document.querySelectorAll('.event-swap-like');
var btnPrevious = document.querySelectorAll('.event-swap-previous');
var btnNext = document.querySelectorAll('.event-swap-next');
var btnCloseModalComment = document.querySelector('.modalComment-close');
var allowedTypes = ['png', 'jpg', 'jpeg', 'gif'];
//var inputImg = document.querySelectorAll('.modalPhoto-input');


// Event listener to display the comment modal
var btnComment = document.querySelectorAll('.event-infos-comment');
for (var i=0; i<btnComment.length; i++) {
    btnComment[i].addEventListener('click', function() {
        this.parentElement.parentElement.parentElement.querySelector('.modalComment').style.display = 'block';
        this.parentElement.parentElement.parentElement.querySelector('.modalComment-close').addEventListener('click', function() {
            this.parentElement.style.display = 'none';
            
            this.parentElement.querySelector('.modalComment-post-input').style.display = 'none';
            this.parentElement.querySelector('.modalComment-post-btn').style.display = 'none';
            this.parentElement.querySelector('.modalComment-comment-plus').style.display = 'inline-block';
        });
        
        this.parentElement.parentElement.parentElement.querySelector('.modalComment-comment-plus').addEventListener('click', function() {
            this.parentElement.querySelector('.modalComment-post-input').style.display = 'block';
            this.parentElement.querySelector('.modalComment-post-btn').style.display = 'block';
            this.style.display = 'none';
            
            this.parentElement.querySelector('.modalComment-post-btn').addEventListener('click', function() {
                var div = document.createElement('div');
                div.className = 'modalComment-comment';
                
                var span = document.createElement('span');
                span.className = 'modalComment-comment-span';
                span.innerHTML = document.querySelector('.header-log-name').innerHTML;
                div.appendChild(span);
                
                var p = document.createElement('p');
                p.className = 'modamComment-comment-p';
                p.innerHTML = this.parentElement.querySelector('.modalComment-post-input').value;
                div.appendChild(p);
                this.parentElement.parentElement.parentElement.insertBefore(div, this.parentElement.parentElement.parentElement.childNodes[4]);
            
                this.parentElement.parentElement.querySelector('.modalComment-post-input').style.display = 'none';
                this.parentElement.parentElement.querySelector('.modalComment-post-btn').style.display = 'none';
                this.parentElement.parentElement.querySelector('.modalComment-comment-plus').style.display = 'inline-block';
            })
        });
    });
}

// Event listener to display the photo modal and to used to display the image selected on the designated area
var btnPhoto = document.querySelectorAll('.event-infos-sendPhoto');
for (var i=0; i<btnPhoto.length; i++) {
    btnPhoto[i].addEventListener('click', function() {
        if (this.innerHTML == 'Déposer une photo') {
            this.innerHTML = 'Annuler';
            this.parentElement.parentElement.parentElement.querySelector('.modalPhoto').style.display = 'flex';

            this.parentElement.parentElement.parentElement.querySelector('.modalPhoto').children[1].addEventListener('change', function(e) {
                var files = this.files[0];
                var imgType = files.name.split('.');
                imgType = imgType[imgType.length - 1].toLowerCase();

                if (allowedTypes.indexOf(imgType) != -1) {
                    var path = URL.createObjectURL(this.files[0]);
                    this.parentElement.style.backgroundImage = 'url(' + path + ')';
                    this.parentElement.querySelector('.modalPhoto-inputLabel').style.marginBottom = '-290px';
                    this.parentElement.querySelector('.modalPhoto-inputLabel').style.boxShadow = '0 0 5px black';
                    this.parentElement.querySelector('.modalPhoto-submit').style.display = 'block';
                }
            });
        } else {
            this.parentElement.parentElement.parentElement.querySelector('.modalPhoto').style.display = 'none';
            this.innerHTML = 'Déposer une photo';
        }
    });
}


// Event to delete a comment
var btnDeleteComment = document.querySelectorAll('.modalComment-delete');
for (var i=0; i<btnDeleteComment.length; i++) {
    btnDeleteComment[i].addEventListener('click', function() {
        this.parentElement.remove();
    });
}




// buttons used for the caroussel
for (var i=0; i<btnNext.length; i++) {
    btnNext[i].addEventListener('click', function() {
        var img = this.parentElement.parentElement.children[0].querySelectorAll('[class*=event-img-]');
        var position = parseInt(this.parentElement.getAttribute('step'));
        img[position].setAttribute('value', this.parentElement.querySelector('.event-swap-like').getAttribute('value'));
        for (var m=0; m<img.length; m++) {
            img[m].style.opacity = 0;
        }
        position == img.length-1 ? position = 0 : position += 1;
        img[position].style.opacity = 1;
        this.parentElement.setAttribute('step', position);
        this.parentElement.querySelector('.event-swap-like').setAttribute('value', img[position].getAttribute('value'));
        img[position].getAttribute('liked') == "true" ? this.parentElement.querySelector('.event-swap-like').style.backgroundImage = "url(site_picture/like_blue.svg)" : this.parentElement.querySelector('.event-swap-like').style.backgroundImage = "url(site_picture/like_grey.svg)";
        this.parentElement.querySelector('.event-swap-like').style.animation = "none";
    });
    btnPrevious[i].addEventListener('click', function() {
        var img = this.parentElement.parentElement.children[0].querySelectorAll('[class*=event-img-]');
        var position = parseInt(this.parentElement.getAttribute('step'));
        img[position].setAttribute('value', this.parentElement.querySelector('.event-swap-like').getAttribute('value'));
        for (var m=0; m<img.length; m++) {
            img[m].style.opacity = 0;
        }
        position == 0 ? position = img.length-1 : position -= 1;
        img[position].style.opacity = 1;
        this.parentElement.setAttribute('step', position);
        this.parentElement.querySelector('.event-swap-like').setAttribute('value', img[position].getAttribute('value'));
        img[position].getAttribute('liked') == "true" ? this.parentElement.querySelector('.event-swap-like').style.backgroundImage = "url(site_picture/like_blue.svg)" : this.parentElement.querySelector('.event-swap-like').style.backgroundImage = "url(site_picture/like_grey.svg)";
        this.parentElement.querySelector('.event-swap-like').style.animation = "none";
    });
}




// Event listener used to swap the likes image and to update the display of number of likes
for (var i = 0; i<btnLike.length; i++) {
    btnLike[i].addEventListener('click', function() {
        var img = this.parentElement.parentElement.children[0].querySelectorAll('[class*=event-img-]');
        var position = parseInt(this.parentElement.getAttribute('step'));
        if (this.style.backgroundImage.search('grey') > 0) {
            this.style.backgroundImage = "url(site_picture/like_blue.svg)";
            this.setAttribute('value', parseInt(this.getAttribute('value')) + 1);
            this.style.animation = "like 225ms";
            img[position].setAttribute('liked', true);
//            document.querySelector('.' + this.getAttribute('form')).setAttribute('name', 'like_id');
        } else {
            this.style.backgroundImage = "url(site_picture/like_grey.svg)";
            this.setAttribute('value', parseInt(this.getAttribute('value')) - 1);
            this.style.animation = "unlike 225ms";
            img[position].setAttribute('liked', false);
//            document.querySelector('.' + this.getAttribute('form')).setAttribute('name', 'unlike_id');
        }
    });
}





/* ///////////// Modal //////////// */

if (document.getElementById('fileImgModal')) {
    var inputImgModal = document.getElementById('fileImgModal');
    var eventAdmin = document.querySelectorAll('[class*=event-admin]');
    var backgroundModal = document.querySelector('.backgroundModal');
    var btnDelete = document.querySelector('.modal-infos-delete');


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
//            document.querySelector('.modal-infos-price').value = document.getElementById('event-infos-price' + id).innerHTML;
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

    btnDelete.addEventListener('click', function(e) {
        closeModal();
        document.getElementById('event' + document.querySelector('.modal-infos-id-delete').value).remove();
    });
}