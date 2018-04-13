#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: account
#------------------------------------------------------------

CREATE TABLE account(
        id         int (11) Auto_increment  NOT NULL ,
        last_name  Char (255) NOT NULL ,
        first_name Char (255) NOT NULL ,
        mail       Varchar (255) NOT NULL ,
        pwd        Varchar (255) NOT NULL ,
        statute    Int (11) DEFAULT 0 ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: happening
#------------------------------------------------------------

CREATE TABLE happening(
        id            int (11) Auto_increment  NOT NULL ,
        title         Varchar (255) NOT NULL ,
        description   Text NOT NULL ,
        event_date    Varchar (255) ,
        place         Varchar (255) ,
        club          Varchar (255) ,
        price         Varchar (255) ,
        validate      Boolean NOT NULL ,
        finished      Int ,
        publish_dated TimeStamp NOT NULL ,
        id_account    Int NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: commentary
#------------------------------------------------------------

CREATE TABLE commentary(
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
        ref        Boolean ,
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
        id_category Int NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: event_picture
#------------------------------------------------------------

CREATE TABLE event_picture(
        id           int (11) Auto_increment  NOT NULL ,
        url          Varchar (255) NOT NULL ,
        ref          Boolean ,
        id_happening Int NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: orders
#------------------------------------------------------------

CREATE TABLE orders(
        id            int (11) Auto_increment  NOT NULL ,
        statute       Char (25) NOT NULL ,
        purchase_date TimeStamp NOT NULL ,
        id_account    Int NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: category
#------------------------------------------------------------

CREATE TABLE category(
        id   int (11) Auto_increment  NOT NULL ,
        name Varchar (255) NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: love
#------------------------------------------------------------

CREATE TABLE love(
        id           int (11) Auto_increment  NOT NULL ,
        id_account   Int NOT NULL ,
        id_happening Int NOT NULL ,
        PRIMARY KEY (id_account ,id_happening )
)ENGINE=InnoDB;

#------------------------------------------------------------
# Table: post_comment
#------------------------------------------------------------

CREATE TABLE post_comment(
        comment_date  TimeStamp NOT NULL ,
        id            Int NOT NULL ,
        id_commentary Int NOT NULL ,
        PRIMARY KEY (id ,id_commentary )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: register
#------------------------------------------------------------

CREATE TABLE register(
        id           Int NOT NULL ,
        id_happening Int NOT NULL ,
        PRIMARY KEY (id ,id_happening )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: order_composite
#------------------------------------------------------------

CREATE TABLE order_composite(
        qantity    Int NOT NULL ,
        id         Int NOT NULL ,
        id_produce Int NOT NULL ,
        PRIMARY KEY (id ,id_produce )
)ENGINE=InnoDB;

ALTER TABLE happening ADD CONSTRAINT FK_happening_id_account FOREIGN KEY (id_account) REFERENCES account(id);
ALTER TABLE produce_picture ADD CONSTRAINT FK_produce_picture_id_produce FOREIGN KEY (id_produce) REFERENCES produce(id);
ALTER TABLE produce ADD CONSTRAINT FK_produce_id_category FOREIGN KEY (id_category) REFERENCES category(id);
ALTER TABLE event_picture ADD CONSTRAINT FK_event_picture_id_happening FOREIGN KEY (id_happening) REFERENCES happening(id);
ALTER TABLE orders ADD CONSTRAINT FK_orders_id_account FOREIGN KEY (id_account) REFERENCES account(id);
ALTER TABLE love ADD CONSTRAINT FK_love_id FOREIGN KEY (id_account) REFERENCES account(id);
ALTER TABLE love ADD CONSTRAINT FK_love_id_happening FOREIGN KEY (id_happening) REFERENCES happening(id);
ALTER TABLE post_comment ADD CONSTRAINT FK_post_comment_id FOREIGN KEY (id) REFERENCES account(id);
ALTER TABLE post_comment ADD CONSTRAINT FK_post_comment_id_commentary FOREIGN KEY (id_commentary) REFERENCES commentary(id);
ALTER TABLE register ADD CONSTRAINT FK_register_id FOREIGN KEY (id) REFERENCES account(id);
ALTER TABLE register ADD CONSTRAINT FK_register_id_happening FOREIGN KEY (id_happening) REFERENCES happening(id);
ALTER TABLE order_composite ADD CONSTRAINT FK_order_composite_id FOREIGN KEY (id) REFERENCES orders(id);
ALTER TABLE order_composite ADD CONSTRAINT FK_order_composite_id_produce FOREIGN KEY (id_produce) REFERENCES produce(id);
