


///////céer panier
insert into orders (statue, id_account) Values('panier',':idaccount');

:idaccount=$_SESSION['id_account'];



//////ajout item
insert into order_compsite (qantity, id_orders, id_produce) VALUES(':qantity',':idorder', ':idproduce');

:qantity=input qantity;
:idorder=$_SESSION['id_order'];
:idproduce:input produce;



////// modifier quantite

ALTER TABLE order_compsite (qantit) VALUES(':qantity') where id_orders=:idorder AND id_produce=:idproduce;

:qantity=input qantity;
:idorder=$_SESSION['id_order'];
:idproduce:input produce;

////suprimer un item du panier contenu
DELETE FROM order_compsite where id_orders=:idorder AND id_produce=:idproduce; 

:idorder==$_SESSION['id_order'];
:idproduce:input produce;


///suprimer un panier !!! attention il y a deux requetes 
DELETE FROM order_compsite where id_orders=:idorder ; 
DELETE FROM orders where id_orders=:idorder; 

:idorder==$_SESSION['id_order'];



////modifier le status 
ALTER TABLE orders (statute) VALUES('attante') where id_orders=:idorder;
:idorder==$_SESSION['id_order'];


////voir le panier : 
SELECT * from orders LEFT JOIN order_compsite ON orders.id=order_compsite.id_order WHERE orders.id=:idorder;
:idorder==$_SESSION['id_order'];

