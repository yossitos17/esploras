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

<!--
Página de borrado de cuenta.

Debe permitir borrar la cuenta solo si se ha introducido bien la contraseña.
Deberá hacer una consulta para ver si la contraseña es correcta y en caso
de serlo, eliminar la cuenta.

Si la contraseña es incorrecta, debe mostrar un mensaje de error.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/estilos.css" type="text/css"/> 
        <script type="text/javascript" src="../js/javascript.js"></script>
        <script type="text/javascript" src="../js/jquery-2.2.0.min.js"></script>
        <title>Borrar tu cuenta</title>
    </head>
    <body>
        <?php
            include_once '../funciones.php';
            include_once '../control.php';
            include_once '../config/config.php';
            seguridad("Registrado");
            cabecera();
            
            function borraCuenta(){
                if(isset($_POST['borrar'])){
                    $conex = mysqli_connect($host, $user, $password, $database, $port);
                    $sql = "delete * from usuarios where id = $_SESSION[id];";
                }
            }
            
        ?>
        <div class="col-12 cuerpo">
            <div class='col-3 menuLateral'>
                <h3>Menú</h3>
                <p><a class='elementoMenu' href='../index.php'>Inicio</a></p>
                <p><a class='elementoMenu' href='misarchivos.php'>Mis Archivos</a></p>
                <p><a class='elementoMenu' href='miperfil.php'>Mi Perfil</a></p>
                <p><a class='elementoMenu' href='../cerrar.php'>Cerrar sesión</a></p>
            </div>
            <div class="col-9 formuBorrar">
                <h3>¿Está seguro de que desea borrar su cuenta?</h3>
                <p>Si realmente desea borrar su cuenta, introduzca su contraseña:</p>
                <form name="formuBorrar" action="borraCuenta()" method="post">
                    <input type='password' name='password' placeholder='Contraseña' required /><br>
                    <input type="submit" name="borrar" value="Borrar cuenta definitivamente"><br>
                </form>
            </div>
        </div>
    </body>
</html>
