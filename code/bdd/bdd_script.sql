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
        statute    Int (10) DEFAULT 0,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: selling
#------------------------------------------------------------

CREATE TABLE selling(
        id         int (11) Auto_increment  NOT NULL ,
        indent     Char (25) NOT NULL ,
        dated_sale TimeStamp NOT NULL ,
        quantity   Int NOT NULL ,
        statute    Char (25) NOT NULL ,
        id_produce Int NOT NULL ,
        id_account Int NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: happening
#------------------------------------------------------------

CREATE TABLE happening(
        id            int (11) Auto_increment  NOT NULL ,
        title         Varchar (255) NOT NULL ,
        description   Text NOT NULL ,
        finished      Bool ,
        validate      Bool NOT NULL ,
        event_date    Date ,
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
        id           int (11) Auto_increment  NOT NULL ,
        url          Varchar (255) NOT NULL ,
        ref          Bool ,
        id_happening Int NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: love
#------------------------------------------------------------

CREATE TABLE love(
        id           Int NOT NULL ,
        id_happening Int NOT NULL ,
        PRIMARY KEY (id ,id_happening )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: post_comment
#------------------------------------------------------------

CREATE TABLE post_comment(
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

ALTER TABLE selling ADD CONSTRAINT FK_selling_id_produce FOREIGN KEY (id_produce) REFERENCES produce(id);
ALTER TABLE selling ADD CONSTRAINT FK_selling_id_account FOREIGN KEY (id_account) REFERENCES account(id);
ALTER TABLE happening ADD CONSTRAINT FK_happening_id_account FOREIGN KEY (id_account) REFERENCES account(id);
ALTER TABLE produce_picture ADD CONSTRAINT FK_produce_picture_id_produce FOREIGN KEY (id_produce) REFERENCES produce(id);
ALTER TABLE event_picture ADD CONSTRAINT FK_event_picture_id_happening FOREIGN KEY (id_happening) REFERENCES happening(id);
ALTER TABLE love ADD CONSTRAINT FK_love_id FOREIGN KEY (id) REFERENCES account(id);
ALTER TABLE love ADD CONSTRAINT FK_love_id_happening FOREIGN KEY (id_happening) REFERENCES happening(id);
ALTER TABLE post_comment ADD CONSTRAINT FK_post_comment_id FOREIGN KEY (id) REFERENCES account(id);
ALTER TABLE post_comment ADD CONSTRAINT FK_post_comment_id_commentary FOREIGN KEY (id_commentary) REFERENCES commentary(id);
ALTER TABLE register ADD CONSTRAINT FK_register_id FOREIGN KEY (id) REFERENCES account(id);
ALTER TABLE register ADD CONSTRAINT FK_register_id_happening FOREIGN KEY (id_happening) REFERENCES happening(id);
