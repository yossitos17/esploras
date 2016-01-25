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
define("Administrador", "Administrador");
define("Registrado", "Registrado");
define("Invitado", "Invitado");

// Función que carga la cabecera, incluyendo el mensaje
// de bienvenida (usuario y rol) en caso de que esté la sesión iniciada.
function cabecera(){
    echo "<div class='col-12 cabecera'>ESPLORAS | ";
    
    // Muestra el mensaje de bienvenida si la sesión está iniciada.
    if(isset($_SESSION['autenticado'])){
        echo "Bienvenido, $_SESSION[usuario], tu rol es $_SESSION[rol].</div>";
    }else{
        echo "</div>";
    }
}

// Función que carga el menú lateral.
function menu(){
    echo "<div class='col-3 menuLateral'>
            <h3>Menú</h3>
            <p><a class='elementoMenu' href='index.php'>Inicio</a></p>
            <p><a class='elementoMenu' href='registrado/misarchivos.php'>Mis Archivos</a></p>
            <p><a class='elementoMenu' href='registrado/miperfil.php'>Mi Perfil</a></p>
            <p><a class='elementoMenu' href='cerrar.php'>Cerrar sesión</a></p>
          </div>";
}

// Función que carga el cuadro de inicio de sesión.
function cuadroLogin(){
    echo "<div class='col-2 formuLogin'>
            <h3>Inicie sesión</h3>
            <form name='iniciaSesion' id='formularioSesion' method='post' action='control.php'>
                <input type='text' name='login' placeholder='Usuario' required /><br>
                <input type='password' name='password' placeholder='Contraseña' required /><br>
                <input type='submit' name='autenticar' value='Iniciar sesión' onclick='inicioSesion(this);' /><br>
                <p>¿No estás registrado? <a href='registrar.php'>Regístrate ahora.</a></p>
            </form>
          </div>";
}

// Función que carga el pie de página.
function pie(){
    echo "<div class='col-12 pie'> 
            <h4></h4>
            <p>ESPLORAS es software libre con licencia GPL v3.
            Esto significa que eres libre de usar el código para lo que quieras,
            siempre y cuando lo distribuyas bajo la misma licencia.
            Por favor, si encuentras algún error o tienes alguna sugerencia,
            escríbeme a esploras@openmailbox.org</p>
            </div> ";
}

// Función que genera los resultados de la búsqueda.
function resultado(){
    echo "<p> Nombre del archivo <select name='extension'>
                                    <option value='pdf'>PDF</option>
                                    <option value='odt'>ODT</option>
                                 </select>
                         <a href='#'>Descargar</a>
          </p>";
}

// Función que comprueba el rol del usuario para que no entre
// donde no debe.
function seguridad($rol){
  session_start();
  if(isset($_SESSION['autenticado'])){
    if($_SESSION['rol'] !== $rol || $_SESSION['rol'] !== "Administrador"){
      header("Location: ../index.php?error=No tienes permiso");
      exit();
    }
  }else{
      session_destroy();
      header("Location: ../index.php?error=No estás autenticado.");
      exit();
  }
}

?>