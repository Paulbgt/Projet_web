var inputImg = document.getElementById('fileImg');
var btnLike = document.querySelectorAll('.idea-infos-like');
var suggestionBox = document.querySelector('.suggestion');
var suggestionBtn = document.getElementById('displaySuggestion');


// Event listener used to display the image selected on the designated area
inputImg.addEventListener('change', function(e) {
    var path = URL.createObjectURL(this.files[0]);
    this.parentElement.style.backgroundImage = 'url(' + path + ')';
    document.querySelector('[for*=fileImg]').style.marginBottom = '-290px';
});

// Event listener used to swap the likes image and to update the display of number of likes
for (var i = 0; i<btnLike.length; i++) {
    btnLike[i].addEventListener('click', function() {
        if (this.style.backgroundImage.search('grey') > 0) {
            this.style.backgroundImage = "url(img/like_blue.svg)";
            this.setAttribute('value', parseInt(this.getAttribute('value')) + 1);
            this.style.animation = "like 225ms";
        } else {
            this.style.backgroundImage = "url(img/like_grey.svg)";
            this.setAttribute('value', parseInt(this.getAttribute('value')) - 1);
            this.style.animation = "unlike 225ms";
        }
    });
}

// Event listener used to display the suggestion form
suggestionBtn.addEventListener('click', function() {
    suggestionBox.style.display = "block";
    this.style.display = "none";
});



function konami(cb) {var input = '';var key = '38384040373937396665';document.addEventListener('keydown', function (e) {input += ('' + e.keyCode);if (input === key) {return cb();}if (!key.indexOf(input)) return;input = ("" + e.keyCode);});}
konami(function() {right = false;document.querySelector('.wrapper').style.backgroundColor = 'transparent';document.querySelector('.banner').style.backgroundColor = 'transparent';document.querySelector('.banner').style.color = 'white';document.querySelector('.footer').style.backgroundColor = 'transparent';document.querySelector('.suggestion').style.backgroundColor = 'transparent';document.querySelector('.nav-blc').style.backgroundColor = 'transparent';document.querySelector('.header').style.background = 'none';document.querySelector('.wrapper').style.color = 'white !important';for (var i=0;i<document.querySelectorAll('.idea').length;i++) {document.querySelectorAll('.idea')[i].style.backgroundColor = 'transparent';document.querySelectorAll('.idea')[i].style.color = 'white';document.querySelectorAll('.idea-infos-description')[i].style.color = 'white';document.getElementById('idea-infos-place' + (i + 1)).className += ' right';document.getElementById('idea-infos-club' + (i + 1)).className += ' right';document.getElementById('idea-infos-date' + (i + 1)).className += ' right';document.getElementById('idea-infos-price' + (i + 1)).className += ' right';}document.body.style.backgroundImage = "url(img/nyancat.gif)";});