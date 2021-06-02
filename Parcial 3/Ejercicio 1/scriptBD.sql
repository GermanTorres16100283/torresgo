create database torresgo;

use torresgo;

create table usuarios
(
    idUsuario int not null auto_increment,
    usuario varchar(20),
    correo varchar(50)
    password varchar(200),
    primary key (idUsuario)
)

insert into usuarios (idUsuario, usuario, correo, password)
values ('GermanTorres', 'gtorresg@live.com', 'L16100283');