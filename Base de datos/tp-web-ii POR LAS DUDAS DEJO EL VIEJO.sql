/*drop database tpWebII;*/

create database tpWebII;

use tpWebII;

create table Comercio(
id int,
nombre varchar(50),
email varchar(50),
direccion varchar(50),
primary key (id)
);

create table Cliente(
id int,
nombre varchar(50),
apellido varchar(50),
usuario varchar(50),
email varchar(50),
contraseña varchar(50),
direccion varchar(50),
primary key (id)
);

create table Administrador(
id int,
comercioId int,
primary key (id),
foreign key (comercioId) references Comercio (id)
);

create table Item(
id int,
descripcion varchar(50),
imagen varchar(100),
precio float,
primary key (id)
);

create table Pedido(
numero int,
clienteId int,
fecha datetime,
horaRetiro time,
horaDevolucion time,
primary key (numero),
foreign key (clienteId) references Cliente (id)
);

create table Venta(
itemId int,
pedidoNumero int,
comercioId int,
primary key (itemId,pedidoNumero),
foreign key (itemId) references Item (id),
foreign key (pedidoNumero) references Pedido (numero),
foreign key (comercioId) references Comercio (id)
);

create table Delivery(
id int,
usuario varchar(50),
telefono bigint,
estado bit,
primary key (id)
);

