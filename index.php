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
        <link rel="icon" type="image/png" href="/favicon.png" sizes="96x96">
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
        
        // La cabecera.
        cabecera(); 
         ?>
        <div class="col-12 cuerpo">
 <!--            <div class='col-12 menu'>
                <h3>Menú</h3>
                <p><a class='elementoMenu' href='index.php'>Inicio</a></p>
                <p><a class='elementoMenu' href='registrado/misarchivos.php'>Mis Archivos</a></p>
                <p><a class='elementoMenu' href='registrado/miperfil.php'>Mi Perfil</a></p>
                <p><a class='elementoMenu' href='cerrar.php'>Cerrar sesión</a></p>
            </div>-->


            <div class="col-12 menu" id="cssmenu">
                <ul>
               <li><a href='#'>Inicio</a></li>
               <li class='active has-sub'><a href='#'>Mis Archivos</a>
                  <ul>
                     <li class='has-sub'><a href='#'>Product 1</a>
                        <ul>
                           <li><a href='#'>Sub Product</a></li>
                           <li><a href='#'>Sub Product</a></li>
                        </ul>
                     </li>
                     <li class='has-sub'><a href='#'>Product 2</a>
                        <ul>
                           <li><a href='#'>Sub Product</a></li>
                           <li><a href='#'>Sub Product</a></li>
                        </ul>
                     </li>
                  </ul>
               </li>
               <li><a href='#'>Mi Perfil</a></li>
               <li><a href='#'>Contacto</a></li>
            </ul>
            </div>
             <div class="col-6 cuadroBusqueda">
                <h3>Búsqueda</h3>
                <form>
                    <input type="search" id="busqueda" placeholder="Buscar" onsubmit="#">
                </form>
            </div>
        </div>
        

            <?php 
                if(!isset($_SESSION['autenticado'])){
                    cuadroLogin();
                }

               // Si hay mensaje de error, muéstralo.
                if(isset($_GET['error'])){
                    echo "<p id='msgError'>Error: $_GET[error].</p>";
                }
                
                // Si has iniciado sesión, muestra el cuadro de subida
                // de archivos.
                if(isset($_SESSION['autenticado'])){
                    subeArchivo();
                }
            ?>
            <div class="col-9 cuadroResultados">
                <?php 
                    resultado();
                ?>
            </div>     
           <?php
            pie();
           ?>
        </div>
    </body>
</html>
