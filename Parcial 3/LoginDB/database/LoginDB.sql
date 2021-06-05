create database LoginDB;

use LoginDB;

create table users
( idUser int not null auto_increment,
 user varchar(25),
 password varchar(200),
 primary key (idUsuario)
);

/*insert into login (user, password)
values('german', 'torres');*/