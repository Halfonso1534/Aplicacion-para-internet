drop database SesionWEB;
create database if not exists SesionWEB
CHARACTER SET utf8 COLLATE utf8_spanish_ci;

use SesionWEB;

create table if not exists Persona(

ID int auto_increment not null,
Usuario varchar(102) ,
Contraseña varchar(20),
correo varchar(100),
primary key(ID)

);


delimiter $$
create procedure Usuario_con (

in Pro_Ususario varchar(20),
in Pro_Contraseña varchar(8)

)
begin

declare Autenticar int;
select count(persona)where Usuario= Pro_Usuario and Contraseña = Pro_Contraseña;

end;
$$

delimiter $$
create procedure RegUS(

in Nombre_Reg varchar(102),
in contraseña_Reg varchar(20),
in correo_reg varchar (100)

)
begin

insert into Persona(Usuario,Contraseña,correo)
values(Nombre_Reg,contraseña_Reg,correo_reg);

end;
$$
select * from Persona;