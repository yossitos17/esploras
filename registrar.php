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
<?php
    // Función que se inicia al pulsa el botón de registro.
    // Aquí haría falta que se ejecute el Javascript antes
    // que el PHP, para evitar sobrecargar el servidor con
    // datos incorrectos (validación JS con función registro()).
    
    if(isset($_POST['registrar'])){
        include_once 'config/config.php';
        include_once 'funciones.php';
             
        // Conexión con la base de datos.
        $conexion = mysqli_connect($host, $user, $password, $database, $port) 
                or die("Error en "
                . "la conexión con la Base de Datos.".mysqli_error($conexion));

        // Inserción SQL del usuario. 
        // Solo inserta login, password y email porque la BBDD
        // asigna los valores por defecto de los demás campos.
        $sql="insert into usuarios (login, password, email) values('$_POST[login]',"
            . "PASSWORD('$_POST[password]'), '$_POST[email]');";
        mysqli_query($conexion,$sql) or die("Error al insertar Usuario."
              .mysqli_error($conexion));

        // Cierre de la conexión. Se devuelve al usuario
        // a la página principal.
        mysqli_close($conexion);
        header("Location: index.php");
    }
?>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/estilos.css" type="text/css"/> 
    <script type="text/javascript" src="./js/javascript.js?1"></script>
    <title>Registro</title>
  </head>
  <body>
    <?php
        require 'funciones.php';
        cabecera();
    ?>
      <div class='col-3 menuLateral'>
        <h3>Menú</h3>
        <p><a class='elementoMenu' href='index.php'>Inicio</a></p>
        <p><a class='elementoMenu' href='registrado/misarchivos.php'>Mis Archivos</a></p>
        <p><a class='elementoMenu' href='registrado/miperfil.php'>Mi Perfil</a></p>
        <p><a class='elementoMenu' href='cerrar.php'>Cerrar sesión</a></p>
      </div>
      <div class="col-7 formuRegistro">
          <h3>Formulario de registro.</h3>
          <form name="registro_form" id="formularioRegistro" method="POST" action="" onsubmit="return registro();">
            <input type="text" name="login" placeholder="Usuario" required/><br>
            <input type="text" name="email" placeholder="Correo electrónico" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"/><br>
            <input type="password" name="password" placeholder="Contraseña" required/><br><br>
            <input type="submit" name="registrar" value="Registrarse" /><br>
          </form>
      </div>  
  </body>
</html>