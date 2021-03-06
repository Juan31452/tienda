DROP DATABASE TIENDA;
CREATE DATABASE TIENDA;
USE TIENDA;

CREATE TABLE Productos(Idproducto INT PRIMARY KEY AUTO_INCREMENT ,Descripcion VARCHAR (50),Cantidad INT,Valor_Unitario INT,Valor_Total INT) ENGINE=InnoDB;

CREATE TABLE Compras(Idcompra INT PRIMARY KEY AUTO_INCREMENT,Fecha DATE, Producto INT,Cantidad INT,Valor_Unitario INT,Valor_Total INT, FOREIGN KEY(Producto) REFERENCES Productos(Idproducto) ON DELETE SET NULL 
ON UPDATE CASCADE) ENGINE=InnoDB;

CREATE TABLE Produccion(Idprod INT PRIMARY KEY AUTO_INCREMENT , producto,Descripcion VARCHAR (20),Cantidad INT,Nbolsas INT,FOREIGN KEY(Producto) REFERENCES Productos(Idproducto) ON DELETE SET NULL 
ON UPDATE CASCADE) ENGINE=InnoDB;

CREATE TABLE Ventas(Idventa INT PRIMARY KEY AUTO_INCREMENT,Fecha DATE,Producto INT,Cantidad INT,Valor_Unitario INT,Valor_Total INT,FOREIGN KEY(Producto) REFERENCES Productos(Idproducto) ON DELETE SET NULL 
ON UPDATE CASCADE) ENGINE=InnoDB;

CREATE TABLE Gastos (Idgastos INT PRIMARY KEY AUTO_INCREMENT,Fecha DATE, Producto INT, Descripcion VARCHAR (100),Valor_Total INT, FOREIGN KEY(Producto) REFERENCES Productos(Idproducto) ON DELETE SET NULL 
ON UPDATE CASCADE)  ENGINE=InnoDB;
