#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: user
#------------------------------------------------------------

CREATE TABLE user(
        id         int (11) Auto_increment  NOT NULL ,
        last_name  Char (255) NOT NULL ,
        first_name Char (255) NOT NULL ,
        mail       Varchar (255) NOT NULL ,
        password   Varchar (512) NOT NULL ,
        status     Int NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: sale
#------------------------------------------------------------

CREATE TABLE sale(
        id         int (11) Auto_increment  NOT NULL ,
        order      Char (25) NOT NULL ,
        dated_sale TimeStamp NOT NULL ,
        quantity   Int NOT NULL ,
        status     Char (25) NOT NULL ,
        id_produce Int NOT NULL ,
        id_user    Int NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: event
#------------------------------------------------------------

CREATE TABLE event(
        id            int (11) Auto_increment  NOT NULL ,
        description   Text NOT NULL ,
        finished      Bool NOT NULL ,
        validate      Bool NOT NULL ,
        event_date    Date ,
        publish_dated Date NOT NULL ,
        id_user       Int NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: comment
#------------------------------------------------------------

CREATE TABLE comment(
        id  int (11) Auto_increment  NOT NULL ,
        com Varchar (255) NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: produce_picture
#------------------------------------------------------------

CREATE TABLE produce_picture(
        id         int (11) Auto_increment  NOT NULL ,
        url        Varchar (255) NOT NULL ,
        id_produce Int NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: produce
#------------------------------------------------------------

CREATE TABLE produce(
        id          int (11) Auto_increment  NOT NULL ,
        name        Varchar (255) NOT NULL ,
        description Varchar (255) NOT NULL ,
        category    Varchar (255) NOT NULL ,
        price       Int NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: event_picture
#------------------------------------------------------------

CREATE TABLE event_picture(
        id  int (11) Auto_increment  NOT NULL ,
        url Varchar (255) NOT NULL ,
        ref Bool ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: like
#------------------------------------------------------------

CREATE TABLE like(
        id       Int NOT NULL ,
        id_event Int NOT NULL ,
        PRIMARY KEY (id ,id_event )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: post_comment
#------------------------------------------------------------

CREATE TABLE post_comment(
        id         Int NOT NULL ,
        id_comment Int NOT NULL ,
        PRIMARY KEY (id ,id_comment )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: contains
#------------------------------------------------------------

CREATE TABLE contains(
        id               Int NOT NULL ,
        id_event_picture Int NOT NULL ,
        PRIMARY KEY (id ,id_event_picture )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: register
#------------------------------------------------------------

CREATE TABLE register(
        id       Int NOT NULL ,
        id_event Int NOT NULL ,
        PRIMARY KEY (id ,id_event )
)ENGINE=InnoDB;

ALTER TABLE sale ADD CONSTRAINT FK_sale_id_produce FOREIGN KEY (id_produce) REFERENCES produce(id);
ALTER TABLE sale ADD CONSTRAINT FK_sale_id_user FOREIGN KEY (id_user) REFERENCES user(id);
ALTER TABLE event ADD CONSTRAINT FK_event_id_user FOREIGN KEY (id_user) REFERENCES user(id);
ALTER TABLE produce_picture ADD CONSTRAINT FK_produce_picture_id_produce FOREIGN KEY (id_produce) REFERENCES produce(id);
ALTER TABLE like ADD CONSTRAINT FK_like_id FOREIGN KEY (id) REFERENCES user(id);
ALTER TABLE like ADD CONSTRAINT FK_like_id_event FOREIGN KEY (id_event) REFERENCES event(id);
ALTER TABLE post_comment ADD CONSTRAINT FK_post_comment_id FOREIGN KEY (id) REFERENCES user(id);
ALTER TABLE post_comment ADD CONSTRAINT FK_post_comment_id_comment FOREIGN KEY (id_comment) REFERENCES comment(id);
ALTER TABLE contains ADD CONSTRAINT FK_contains_id FOREIGN KEY (id) REFERENCES event(id);
ALTER TABLE contains ADD CONSTRAINT FK_contains_id_event_picture FOREIGN KEY (id_event_picture) REFERENCES event_picture(id);
ALTER TABLE register ADD CONSTRAINT FK_register_id FOREIGN KEY (id) REFERENCES user(id);
ALTER TABLE register ADD CONSTRAINT FK_register_id_event FOREIGN KEY (id_event) REFERENCES event(id);
