create database ControlEmpleado

create table Usuarios(
id INT(255) auto_increment,
nombres VARCHAR(60),
apellidos VARCHAR(100),
usuario VARCHAR(50),
contraseña VARCHAR(50),
admin boolean,
CONSTRAINT pk_id PRIMARY KEY(id)

)

insert into Usuarios values(null, "Eduardo", "Diaz", "Eduardo26", "123456", TRUE)
insert into Usuarios values(null, "Luis", "Fernandez", "Luis02", "123456", false)

create TABLE Empleados(
id INT(255) auto_increment,
usuario_id INT(255),
nombres VARCHAR(60),
apellidos VARCHAR(100),
años VARCHAR(50),
cargo VARCHAR(50),
creado datetime,
modificado DATETIME,
CONSTRAINT pk_id PRIMARY KEY(id),
CONSTRAINT fk_usuario_id FOREIGN KEY(usuario_id) REFERENCES Usuarios(id)
)

insert into Empleados values(null, 1, "Jose", "Martinez", "2005", "Gerente", CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP())
insert into Empleados values(null, 1, "Fernando", "Martinez", "2010", "Chofer", CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP())
insert into Empleados values(null, 1, "Carlos", "Jimenez", "2014", "Contable", CURRENT_TIMESTAMP(),  CURRENT_TIMESTAMP())
insert into Empleados values(null, 1, "Ruben", "Diaz", "2012", "Diseñador Web", CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP())
insert into Empleados values(null, 1, "Diana", "Melina", "2015", "Diseñador Web",CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP())
insert into Empleados values(null, 1, "Xavier", "Garcia", "2015", "Programador", CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP())
insert into Empleados values(null, 1, "Javier", "Polanco", "2019", "Programador", CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP())
insert into Empleados values(null, 1, "Angelica", "Martinez", "2018", "Analista de sistemas", CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP())
insert into Empleados values(null, 1, "Harold", "Morillo", "2015", "Administrador", CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP())
insert into Empleados values(null, 1, "Nairobi", "Nivar", "2015", "Programadora", CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP())
insert into Empleados values(null, 1, "Randy", "Mendoza", "2015", "Gerente", CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP())
insert into Empleados values(null, 1, "Jose", "Encarnacion", "2015", "Gerente", CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP())

create TABLE Eliminados(
id INT(255) auto_increment,
anteriorID INT(255),
usuario_id INT(255),
nombres VARCHAR(60),
apellidos VARCHAR(100),
años VARCHAR(50),
cargo VARCHAR(50),
creado datetime,
modificado DATETIME,
CONSTRAINT pk_id PRIMARY KEY(id),
CONSTRAINT fk_usuario_id FOREIGN KEY(usuario_id) REFERENCES Usuarios(id)
)



Drop DATABASE Usuarios
drop database Empleados
drop database Eliminados