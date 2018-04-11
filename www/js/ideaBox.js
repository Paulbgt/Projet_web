var inputImg = document.getElementById('fileImg');

inputImg.addEventListener('change', function(e) {
    console.log(this.files[0]);
    var path = URL.createObjectURL(this.files[0]);
    console.log(path);
    this.parentElement.style.backgroundImage = 'url(' + path + ')';
});