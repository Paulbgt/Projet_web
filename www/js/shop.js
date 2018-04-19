var btnCart = document.querySelector('.banner-cart');


// *[English]* Delete the article from the cart
// *[Français]* Supprime l'article du panier
//var btnDeleteCart = document.querySelectorAll('.line-delete');
//var btnAddCart = document.querySelectorAll('.article-infos-btnAdd');
//
//for (var i=0; i<btnDeleteCart.length; i++) {
//    btnDeleteCart[i].addEventListener('click', function() {
//        btnCart.innerHTML = parseInt(btnCart.innerHTML) - parseInt(this.parentElement.querySelector('.line-quantity').innerHTML);
//        this.parentElement.remove();
//    });
//}
//for (var i=0; i<btnAddCart.length; i++) {
//    btnAddCart[i].addEventListener('click', function() {
//        btnCart.innerHTML = parseInt(btnCart.innerHTML) + 1;
//        this.parentElement.remove();
//    });
//}



// *[English]* Display the add article form and the add category form
// *[Français]* Affiche les formulaires d'ajout de catégorie et de produit
var rightSide = document.querySelectorAll('.searchNav-rightSide');
if (rightSide.length > 0) {
    document.querySelector('.addArticle-title').addEventListener('click', function() {
        if (this.parentElement.querySelector('.addArticle-blc').style.display == 'flex') {
            this.parentElement.querySelector('.addArticle-blc').style.display = 'none';
        } else {
            this.parentElement.querySelector('.addArticle-blc').style.display = 'flex';
        }
    });
    document.querySelector('.addCategory-title').addEventListener('click', function() {
        if (this.parentElement.querySelector('.addCategory-blc').style.display == 'flex') {
            this.parentElement.querySelector('.addCategory-blc').style.display = 'none';
        } else {
            this.parentElement.querySelector('.addCategory-blc').style.display = 'flex';
        }
    });
}





/* ///////////// Modal //////////// */

var backgroundModal = document.querySelector('.backgroundModal');
var btnDelete = document.querySelector('.modal-infos-delete');


// *[English]* Display modal to see the cart
// *[Français]* Affiche le modal du panier
btnCart.addEventListener('click', function() {
    backgroundModal.style.display = "flex";
//        document.querySelector('.wrapper').style.filter = "grayscale(100%) blur(3px)";
    document.querySelector('.wrapper').style.filter = "blur(5px)";
});


// *[English]* Functions used to clase the modal
// *[Français]* Fonctions servant à fermer le modal
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