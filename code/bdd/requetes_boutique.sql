


///////céer panier
insert into orders (statue, id_account) Values('panier',':idaccount');

:idaccount=$_SESSION['id_account'];



//////ajout item
insert into order_compsite (qantity, id_orders, id_produce) VALUES(':qantity',':idorder', ':idproduce');

:qantity=input qantity;
:idorder=$_SESSION['id_order'];
:idproduce:input produce;


/////afficher panier

Select oders.id, from orders INNER JOIN order_composite ON orders.id=orders.order_composite where orders.id=:idorder;

:idorder==$_SESSION['id_order'];



////// modifier quantite

ALTER TABLE order_compsite (qantit) VALUES(':qantity') where id_order=:idorder AND id_produce=:idproduce;

:qantity=input qantity;
:idorder=$_SESSION['id_order'];
:idproduce:input produce;

////suprimer contenu
