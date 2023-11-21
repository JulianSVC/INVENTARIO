create database LOGIN;
use LOGIN;
create table usuarios(
id_user  int not null auto_increment,
nombre_user varchar(50) NOT NULL,
  contrasena_user varchar(50) NOT NULL,
  correo_user varchar(50) NOT NULL,
primary key(id_user)
);
INSERT INTO usuarios (id_user, nombre_user, contrasena_user, correo_user)
values();
SELECT * FROM usuarios;



