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
        <title>ESPLORAS</title>
        <link rel="stylesheet" href="./css/estilos.css" type="text/css"/> 
        <script type="text/javascript" src="./js/javascript.js"></script>
        <script type="text/javascript" src="./js/jquery-2.2.0.min.js"></script>
    </head>
    <body>
        <?php
        // Inclusión de funciones.php y control.php
        include_once 'funciones.php';
        include_once 'control.php';
        
        // Inicia la sesión.
        session_start();
        
        // La cabecera.
        cabecera(); 
        
        // Si hay mensaje de error, muéstralo.
        if(isset($_GET['error'])){
            echo "$_GET[error]";
        }
        ?>
        <div class="col-12 cuerpo">
            <div class="col-3 menuLateral">
                <h3>Menú</h3>
                <p class="elementoMenu"><a href="index.php">Inicio</a></p>
                <p class="elementoMenu"><a href="#">Mis Archivos</a></p>
                <p class="elementoMenu"><a href="#">Mi Perfil</a></p>
                <p class="elementoMenu"><a href="cerrar.php">Cerrar sesión</a></p>
            </div>

            <div class="col-6 cuadroBusqueda">
                <h3>Búsqueda</h3>
                <form>
                    <input type="search" id="busqueda" placeholder="Buscar" onsubmit="#">
                </form>
            </div>
            <div class="col-2 formuLogin">
                <h3>Inicie sesión</h3>
                <form name="iniciaSesion" id="formularioSesion" method="post" action="control.php">
                    <input type="text" name="login" placeholder="Usuario" required /><br>
                    <input type="password" name="password" placeholder="Contraseña" required /><br>
                    <input type="submit" name="autenticar" value="Iniciar sesión" onclick="inicioSesion(this);" /><br>
                    <p>¿No estás registrado? <a href="registrar.php">Regístrate ahora.</a></p>
                </form>
            </div>
            <div class="col-9 cuadroResultados">
                <p>Ejemplo de resultado de búsqueda.</p>
                <p>Ejemplo de resultado de búsqueda con algo más de texto.</p>
                <p>Ejemplo de resultado de búsqueda con bastante más texto, un montón para ser sinceros.</p>
            </div>
        </div>
    </body>
</html>
