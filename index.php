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
        <script src="./js/script.js"></script>
        <script type="text/javascript" src="./js/jquery-2.2.0.min.js"></script>
    </head>
    <body>
        <?php
            // Inclusión de funciones.php y control.php
            include_once 'funciones.php';
            include_once 'control.php';

            // Inicia la sesión.
            session_start();
         ?>
        <div class="cuerpo">
            <div class='col-12 cabeceraEsploras'>
                ESPLORAS | 
            </div>
            <!-- Menú -->
            <div class="col-12 menu">
                <ul>
                    <li class="boton"><a href='index.php'>Inicio</a></li>
                    <li class="boton"><a href='registrado/misarchivos.php'>Mis Archivos</a></li>
                    <li class='boton'><a href='registrado/miperfil.php'>Mi Perfil<?php miperfil(); ?></a></li>
                    <?php muestraPanel(); ?>
                    <li class="boton"><a href="cerrar.php">Cerrar sesión</a></li>
                </ul>
            </div>
            <!-- Cuadro de búsqueda. -->
            <div class="col-9 cuadroBusqueda">
                <h3>Búsqueda</h3>
                <form>
                    <input type="search" id="busqueda" placeholder="Buscar" onsubmit="#">
                </form>
            </div>
            <!-- Cuadro de subida -->
            <div class="col-3 cuadroSubida">
                <?php 
                    subeArchivo(); 
                ?>
            </div>
            <!-- Cuadro de resultados -->
            <div class="col-9 cuadroResultados">
                <?php 
                    resultado();
                ?>
            </div> 
            <?php 
                if(!isset($_SESSION['autenticado'])){
                    cuadroLogin();
                }
               // Si hay mensaje de error, muéstralo.
                if(isset($_GET['error'])){
                    echo "<p id='msgError'>Error: $_GET[error].</p>";
                }
                
            ?>
        </div>
        <div class="pie">
            <?php
                // Pie de página.
                pie();
            ?>
        </div>
    </body>
</html>
