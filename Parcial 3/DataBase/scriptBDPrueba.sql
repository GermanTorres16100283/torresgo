create database prueba;

use prueba;

create table login
( idUsuario int not null auto_increment,
 nombre varchar(15),
 apellidos varchar(25),
 usuario varchar(10),
 password varchar(15),
 primary key (idUsuario)
);

insert into login (nombre, apellidos, usuario, password)
values('German', 'Torres Gonzalez', 'gtorresg', 'L16100283');