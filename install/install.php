<?php

/* 
Esploras es una nube de archivos tanto públicos como privados.
Copyright (C) 2016  Miguel Ángel Maldonado López.

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */

    include_once '../config/config.php';
    echo "Conectando con el SGBD... ";
    $conex = mysqli_connect($host, $user, $password) or die("Error en la conexión.");
    
    echo "OK.<br>Creando la base de datos $database... ";
    $sql = "create database $database;";
    mysqli_query($conex, $sql) or die("Error al crear la base de datos.");
    
    echo "OK.<br>Creando la tabla 'usuarios'... ";
    $sql = "use $database;";
    mysqli_query($conex, $sql) or die("Error al utilizar la base de datos.");
    
    // Consulta SQL que crea la tabla de usuarios.
    $sql = "CREATE TABLE `esploras`.`usuarios` ( "
            . "`id` INT(15) NOT NULL AUTO_INCREMENT , "
            . "`login` VARCHAR(20) NOT NULL , "
            . "`password` VARCHAR(300) NOT NULL , "
            . "`email` VARCHAR(30) NOT NULL , "
            . "`rol` SET('Administrador','Registrado','Invitado') NOT NULL default 'Registrado', "
            . "`cuota_disp` INT NOT NULL default '1024', "
            . "`cuota_total` INT NOT NULL default '1024' , "
            . "PRIMARY KEY (`id`)"
            . ") ENGINE = InnoDB;";
    mysqli_query($conex, $sql) or die("Error al crear la tabla Usuarios.");    
    echo "OK.<br>Creando la tabla 'archivos'... ";
    
    $sql = "use $database;";
    mysqli_query($conex, $sql) or die("Error al utilizar la base de datos.");
    
    // Consulta SQL que crea la tabla de archivos.
    $sql = "CREATE TABLE `esploras`.`archivos` ( "
            . "`id_archivo` INT(20) NOT NULL AUTO_INCREMENT , "
            . "`nombre` VARCHAR(30) NOT NULL , "
            . "`descripcion` TEXT, "
            . "`url` VARCHAR(100) NOT NULL , "
            . "`fecha_subida` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , "
            . "`publico` BOOLEAN NULL DEFAULT NULL , "
            . "PRIMARY KEY (`id_archivo`)"
            . ") ENGINE = InnoDB;";    
    mysqli_query($conex, $sql) or die("Error al crear la tabla Archivos.");
    echo "OK.<br>Creando usuario 'admin'... ";
    
    
    // Aquí falta agregar la tabla "Formato".
    
    // Creación del usuario administrador.
    $sql = "insert into usuarios (login, password, email, rol) values('admin', PASSWORD('Jairo2000'), "
            . "'esploras@openmailbox.org', 'Administrador')";
    mysqli_query($conex, $sql) or die("Error al crear el usuario 'admin'.");
    
    echo "OK.<br>Proceso de instalación correcto.<br>Por favor, "
    . "borre el directorio de instalación.";
    
    // Cierre de la conexión.
    mysqli_close($conex);

?>