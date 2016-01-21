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

// Paso de los roles a valor numérico para facilitar
// las funciones de seguridad.
define("Administrador", 100);
define("Registrado", 50);
define("Invitado", 1);

// Función que carga la cabecera, incluyendo el mensaje
// de bienvenida (usuario y rol).
function cabecera(){
    echo "<div class='col-12 cabecera'>ESPLORAS | "
            . "Bienvenido,"
            . " $_SESSION[usuario], tu rol es $_SESSION[rol].</div>";
    
}

// Función que carga el menú lateral.
// Ahora mismo va incluído en el HTML, pero sería deseable no tener
// que incluirlo en todas las páginas, cargarlo de forma dinámica.
/*
    function menu(){

    echo ("");
}
*/


// Función que comprueba el rol del usuario para que no entre
// donde no debe.
function seguridad($rol){
  session_start();
  if(isset($_SESSION['autenticado'])){
    if($_SESSION['rol']<$rol){
      header("Location: index.php?error=SinPrivilegios");
      exit();
    }
  }else{
      session_destroy();
      header("Location: index.php?error=NoAutenticado");
      exit();
  }
}

// Función que oculta el cuadro de inicio de sesión una vez esta esté iniciada.
function ocultaLogin(){
  //
}
?>