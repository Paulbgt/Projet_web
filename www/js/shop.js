var btnCart = document.querySelector('.banner-cart');


// Delete the article from the cart
var btnDeleteCart = document.querySelectorAll('.line-delete');

for (var i=0; i<btnDeleteCart.length; i++) {
    btnDeleteCart[i].addEventListener('click', function() {
        btnCart.innerHTML = parseInt(btnCart.innerHTML) - parseInt(this.parentElement.querySelector('.line-quantity').innerHTML);
        this.parentElement.remove();
    });
}






/* ///////////// Modal //////////// */

var backgroundModal = document.querySelector('.backgroundModal');
var btnDelete = document.querySelector('.modal-infos-delete');


// Display modal to administrate the suggestion
btnCart.addEventListener('click', function() {
    backgroundModal.style.display = "flex";
//        document.querySelector('.wrapper').style.filter = "grayscale(100%) blur(3px)";
    document.querySelector('.wrapper').style.filter = "blur(5px)";
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