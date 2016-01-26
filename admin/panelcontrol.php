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
        <script type="text/javascript" src="../js/javascript.js"></script>
        <script type="text/javascript" src="../js/jquery-2.2.0.min.js"></script>
        <title>Panel de Control</title>
    </head>
    <body>
        <?php
            include_once '../funciones.php';
            include_once '../control.php';
            seguridad("Administrador");
            cabecera();

        ?>
        <div class='col-3 menuLateral'>
            <h3>Menú</h3>
                <p><a class='elementoMenu' href='../index.php'>Inicio</a></p>
                <p><a class='elementoMenu' href='../registrado/misarchivos.php'>Mis Archivos</a></p>
                <p><a class='elementoMenu' href='../registrado/miperfil.php'>Mi Perfil</a></p>
                <p><a class='elementoMenu' href='../cerrar.php'>Cerrar sesión</a></p>
        </div>
        <div class="col-9 panel">
            <h3>Panel de Control</h3>
        </div>
    </body>
</html>
