/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/SQLTemplate.sql to edit this template
 */
/**
 * Author:  Álvaro Allén
 * Created: 18 nov 2025
 */

-- Creación de la base de datos en caso de que no exista --
CREATE DATABASE IF NOT EXISTS DBALPDWESProyectoTema4;

-- Seleccionamos la base de datos para poder trabajar en ella --
USE DBALPDWESProyectoTema4;

--Creamos, en caso de que no exista, la tabla y dentro cada campo con el tipo de valor correspondiente --
CREATE TABLE IF NOT EXISTS T02_Departamento(
    T02_CodDepartamento VARCHAR(3) PRIMARY KEY,         /* Primary key: (varchar(3)) Codigo de cada departamento en mayúscula */
    T02_FechaCreacionDepartamento DATETIME,             /* (DateTime) Fecha de creación del departamento */
    T02_FechaBajaDepartamento DATETIME,                 /* (DateTime) Fecha de baja del departamento */
    T02_DescDepartamento VARCHAR(255),                  /* (varchar(255)) Descripción breve de cada departamento */
    T02_VolumenDeNegocio FLOAT                          /* (float) Volumen que ocupa cada departamento */
) engine = innodb;

