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
        <title>Mi Perfil</title>
    </head>
    <body>
        <?php
            include_once '../funciones.php';
            include_once '../control.php';
            seguridad("Registrado");
        ?>
        <div class='col-12 cabecera'>
            ESPLORAS | 
        </div>
        <div class="cuerpo">
            <!-- Menú -->
            <div class="col-12 menu">
                <ul>
                    <li class="boton"><a href='../index.php'>Inicio</a></li>
                    <li class="boton"><a href='misarchivos.php'>Mis Archivos</a></li>
                    <li class='boton'><a href='miperfil.php'>Mi Perfil<?php miperfil(); ?></a></li>
                    <?php muestraPanel(); ?>
                    <li class="boton"><a href="../cerrar.php">Cerrar sesión</a></li>
                </ul>
            </div>
            <div class="col-9 perfil">
                <h3>Mi Perfil</h3>
                    <?php
                        echo "<p>Nombre de usuario: $_SESSION[usuario]</p>";
                        echo "<p>Tu correo electrónico: $_SESSION[email]";
                        echo "<p>Espacio disponible: $_SESSION[cuota_disp]MB de $_SESSION[cuota_total]MB</p>";
                    ?>
            </div>
        </div>
        <div class="pie">
            <?php
                // Pie de página.
                pie();
            ?>
        </div>
    </body>
</html>
