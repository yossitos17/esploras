<!DOCTYPE html>
<!--
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
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/estilos.css" type="text/css"/> 
        <title>Instalación</title>
    </head>
    <body>
        <?php
            include_once '../config/config.php';
            include_once '../funciones.php';
        ?>
            <div class='col-3 menuLateral'>
            <h3>Menú</h3>
                <p><a class='elementoMenu' href='../index.php'>Inicio</a></p>
                <p><a class='elementoMenu' href='../registrado/misarchivos.php'>Mis Archivos</a></p>
                <p><a class='elementoMenu' href='../registrado/miperfil.php'>Mi Perfil</a></p>
                <p><a class='elementoMenu' href='../registrado/cerrarsesion.php'>Cerrar sesión</a></p>
             </div>
        <div class="col-9 instalacion">
            <h3>Instalación</h3>
            <?php  
                // Conexión con la base de datos.
                echo "Conectando con el sistema gestor de bases de datos... ";
                $conex = mysqli_connect($host, $user, $password) or die("Error en la conexión.");
                
                // Crea la base de datos.
                echo "OK.<br>Creando la base de datos $database... ";
                $sql = "create database $database;";
                mysqli_query($conex, $sql) or die("Error al crear la base de datos.");
                
                // Establece uso de la base de datos.
                echo "OK.<br>Creando la tabla 'usuarios'... ";
                $sql = "use $database;";
                mysqli_query($conex, $sql) or die("Error al utilizar la base de datos.");

                // Crea la tabla de usuarios.
                $sql = "CREATE TABLE if not exists esploras.usuarios (
                id INT(15) NOT NULL AUTO_INCREMENT,
                login VARCHAR(20) NOT NULL,
                password VARCHAR(300) NOT NULL,
                email VARCHAR(30) NOT NULL,
                rol SET('Administrador', 'Registrado', 'Invitado') NOT NULL default 'Registrado',
                cuota_disp INT NOT NULL default '1024',
                cuota_total INT NOT NULL default '1024',
                PRIMARY KEY (id)
            )  ENGINE=InnoDB;";
                mysqli_query($conex, $sql) or die("Error al crear la tabla Usuarios.");    
                echo "OK.<br>Creando la tabla 'documentos'... ";

                // Crea la tabla de documentos.
                $sql = "CREATE TABLE if not exists esploras.documentos (
                id_documento INT(20) NOT NULL AUTO_INCREMENT,
                nombre VARCHAR(30) NOT NULL,
                descripcion TEXT,
                fecha_subida TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                publico BOOLEAN NULL DEFAULT NULL,
                id_usuario INT(15) NOT NULL,
                 PRIMARY KEY (id_documento),
                 foreign key (id_usuario) references usuarios(id)
                  )  ENGINE=InnoDB;";    
                mysqli_query($conex, $sql) or die("Error al crear la tabla Documentos.");
                echo "OK.<br>Creando la tabla 'formatos'...  ";

                // Crea la tabla de formatos.
                $sql = "create table if not exists esploras.formato (
                    id_formato int(20) not null auto_increment,
                    nombre varchar(30),
                    primary key (id_formato)
                    ) ENGINE=InnoDB;";
                mysqli_query($conex, $sql) or die("Error al crear la tabla Formatos.");
                echo "OK.<br>Creando tabla 'docsform'...";

                // Crea la tabla docsform, tabla de transición
                // entre Formatos y Documentos.
                $sql = "create table if not exists esploras.docform (
                    id_documento INT(20) NOT NULL,
                    id_formato int(20) not null,
                    url varchar(50) not null,
                    primary key (url),
                    FOREIGN KEY (id_documento) REFERENCES documentos(id_documento),
                    FOREIGN KEY (id_formato) REFERENCES formato(id_formato)
                    )ENGINE=InnoDB;";
                mysqli_query($conex, $sql) or die("Error al crear la tabla docsform.");
                echo "OK.<br>Creando usuario 'admin'... ";

                // Crea el usuario administrador.
                $sql = "insert into usuarios (login, password, email, rol) values('admin', PASSWORD('Jairo2000'), "
                        . "'esploras@openmailbox.org', 'Administrador')";
                mysqli_query($conex, $sql) or die("Error al crear el usuario 'admin'.");
                echo "OK.<br>Proceso de instalación correcto.<br>Por favor, "
                . "borre el directorio de instalación.";

                // Cierre de la conexión.
                mysqli_close($conex);

                echo "<p><a href='../index.php'>Volver a la página de inicio.</a></p>";

                pie();
            ?>
        </div>
    </body>
</html>