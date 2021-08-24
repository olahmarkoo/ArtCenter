CREATE DATABASE artcenter
CHARACTER SET utf8
COLLATE utf8_hungarian_ci;

CREATE TABLE termekek (
    termekId int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nev varchar(255),
    leiras varchar(255),
    alapAr int,
    termekKep varchar(255),
    tipus varchar(255)
);

INSERT INTO `termekek`(`nev`, `leiras`, `alapAr`, `termekKep`, `tipus`) VALUES ("termék #1","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tincidunt, ipsum mollis pulvinar condimentum, dui metus lobortis justo, suscipit ultricies erat ligula eu nunc. Praesent vestibulum molestie enim nec hendrerit. Aenean sit amet vehicula sem. Mauris faucibus pharetra vehicula. Nulla justo neque, tristique ut purus euismod, vestibulum euismod dolor.",15000,"prdct1.png","Architektúra");

INSERT INTO `termekek`(`nev`, `leiras`, `alapAr`, `termekKep`, `tipus`) VALUES ("termék #2","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tincidunt, ipsum mollis pulvinar condimentum, dui metus lobortis justo, suscipit ultricies erat ligula eu nunc. Praesent vestibulum molestie enim nec hendrerit.",18000,"prdct2.png","Portré");

INSERT INTO `termekek`(`nev`, `leiras`, `alapAr`, `termekKep`, `tipus`) VALUES ("termék #3","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tincidunt, ipsum mollis pulvinar condimentum. Aenean sit amet vehicula sem. Mauris faucibus pharetra vehicula. Nulla justo neque, tristique ut purus euismod, vestibulum euismod dolor.",12000,"prdct3.png","Portré");

INSERT INTO `termekek`(`nev`, `leiras`, `alapAr`, `termekKep`, `tipus`) VALUES ("termék #4","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tincidunt, ipsum mollis pulvinar condimentum. Aenean sit amet vehicula sem. Mauris faucibus pharetra vehicula. Vestibulum euismod dolor.",20000,"prdct4.png","Architektúra");

INSERT INTO `termekek`(`nev`, `leiras`, `alapAr`, `termekKep`, `tipus`) VALUES ("termék #5","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tincidunt, ipsum mollis pulvinar condimentum.dolor.",17000,"prdct5.png","Architektúra");

INSERT INTO `termekek`(`nev`, `leiras`, `alapAr`, `termekKep`, `tipus`) VALUES ("termék #6","Dui metus lobortis justo, suscipit ultricies erat ligula eu nunc. Praesent vestibulum molestie enim nec hendrerit. Aenean sit amet vehicula sem. Mauris faucibus pharetra vehicula. Nulla justo neque, tristique ut purus euismod, vestibulum euismod dolor.",10000,"prdct6.png","Architektúra");

INSERT INTO `termekek`(`nev`, `leiras`, `alapAr`, `termekKep`, `tipus`) VALUES ("termék #7","Dui metus lobortis justo, suscipit ultricies erat ligula eu nunc. Praesent vestibulum molestie enim nec hendrerit. Aenean sit amet vehicula sem. Mauris faucibus pharetra vehicula.",11000,"prdct7.png","Portré");

INSERT INTO `termekek`(`nev`, `leiras`, `alapAr`, `termekKep`, `tipus`) VALUES ("termék #8","Aenean sit amet vehicula sem. Mauris faucibus pharetra vehicula. Nulla justo neque, tristique ut purus euismod, vestibulum euismod dolor.",9000,"prdct8.png","Tájkép");

INSERT INTO `termekek`(`nev`, `leiras`, `alapAr`, `termekKep`, `tipus`) VALUES ("termék #9","Aenean sit amet vehicula sem. Mauris faucibus pharetra vehicula. Nulla justo neque, tristique ut purus euismod, vestibulum euismod dolor.",10000,"prdct9.png","Tájkép");


CREATE TABLE felhasznalok (
   	felhasznaloId int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    email varchar(255),
    jelszo varchar(255),
    teljesNev varchar(255),
    telefon int(255),
    cim varchar(255)
);

INSERT INTO `felhasznalok`(`email`, `jelszo`, `teljesNev`, `telefon`, `cim`) VALUES ('olah.markoo@gmail.com','admin','Oláh Márk',06521237563,'2220 Vecsés Random utca 99/X');


CREATE TABLE idopont (
   	idopontId int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    teljesNev varchar(255),
    email varchar(255),
    telefon int(255),
    datum date,
    ido varchar(255)
);

CREATE TABLE rendelesek (
    rendelesId int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nev varchar(255),
    email varchar(255),
    telefon int,
    cim varchar(255),
    fizetesMod varchar(255),
    fizetendo int,
    datum datetime,
    teljesitve boolean
);

CREATE TABLE termekVariansok (
    termekVariansId int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    termekId int REFERENCES termekek(termekId),
    meret varchar(255),
    anyag varchar(255)
);

CREATE TABLE termekRendelt (
    rendelesId int REFERENCES rendelesek(rendelesID),
    termekId int REFERENCES termekVariansok(termekVariansId)
);