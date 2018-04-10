#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: utilisateur
#------------------------------------------------------------

CREATE TABLE utilisateur(
        id     int (11) Auto_increment  NOT NULL ,
        nom    Char (255) NOT NULL ,
        prenom Char (255) NOT NULL ,
        mail   Varchar (255) NOT NULL ,
        mdp    Varchar (512) NOT NULL ,
        statut Int NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: vente
#------------------------------------------------------------

CREATE TABLE vente(
        id             int (11) Auto_increment  NOT NULL ,
        quantite       Int NOT NULL ,
        date_vente     TimeStamp NOT NULL ,
        statut         Char (25) NOT NULL ,
        commande       Char (25) NOT NULL ,
        id_produit     Int NOT NULL ,
        id_utilisateur Int NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: evenement
#------------------------------------------------------------

CREATE TABLE evenement(
        id             int (11) Auto_increment  NOT NULL ,
        texte          Longtext NOT NULL ,
        fini           Bool NOT NULL ,
        valide         Bool NOT NULL ,
        id_utilisateur Int NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: commentaire
#------------------------------------------------------------

CREATE TABLE commentaire(
        id             int (11) Auto_increment  NOT NULL ,
        com            Varchar (255) NOT NULL ,
        id_utilisateur Int NOT NULL ,
        id_evenement   Int NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: photo_produit
#------------------------------------------------------------

CREATE TABLE photo_produit(
        id         int (11) Auto_increment  NOT NULL ,
        url        Varchar (255) NOT NULL ,
        id_produit Int NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: produit
#------------------------------------------------------------

CREATE TABLE produit(
        id          int (11) Auto_increment  NOT NULL ,
        nom         Varchar (255) NOT NULL ,
        description Varchar (255) NOT NULL ,
        categorie   Varchar (255) NOT NULL ,
        prix        Int NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: photo_evenement
#------------------------------------------------------------

CREATE TABLE photo_evenement(
        id           int (11) Auto_increment  NOT NULL ,
        url          Varchar (255) NOT NULL ,
        id_evenement Int NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: aime
#------------------------------------------------------------

CREATE TABLE aime(
        id           Int NOT NULL ,
        id_evenement Int NOT NULL ,
        PRIMARY KEY (id ,id_evenement )
)ENGINE=InnoDB;

ALTER TABLE vente ADD CONSTRAINT FK_vente_id_produit FOREIGN KEY (id_produit) REFERENCES produit(id);
ALTER TABLE vente ADD CONSTRAINT FK_vente_id_utilisateur FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id);
ALTER TABLE evenement ADD CONSTRAINT FK_evenement_id_utilisateur FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id);
ALTER TABLE commentaire ADD CONSTRAINT FK_commentaire_id_utilisateur FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id);
ALTER TABLE commentaire ADD CONSTRAINT FK_commentaire_id_evenement FOREIGN KEY (id_evenement) REFERENCES evenement(id);
ALTER TABLE photo_produit ADD CONSTRAINT FK_photo_produit_id_produit FOREIGN KEY (id_produit) REFERENCES produit(id);
ALTER TABLE photo_evenement ADD CONSTRAINT FK_photo_evenement_id_evenement FOREIGN KEY (id_evenement) REFERENCES evenement(id);
ALTER TABLE aime ADD CONSTRAINT FK_aime_id FOREIGN KEY (id) REFERENCES utilisateur(id);
ALTER TABLE aime ADD CONSTRAINT FK_aime_id_evenement FOREIGN KEY (id_evenement) REFERENCES evenement(id);
