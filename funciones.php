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

/*
 * Este archivo contiene todas las funciones PHP necesarias
 * para gestionar la seguridad de la web y para generar
 * los elementos HTML correspondientes a cada sesión.
 */

// Define las constantes de rol.
define("Administrador", "Administrador");
define("Registrado", "Registrado");
define("Invitado", "Invitado");

// Función que comprueba el rol del usuario para que no entre
// donde no debe.
function seguridad($rol){
  session_start();
  if(isset($_SESSION['autenticado'])){
    if(!($_SESSION['rol'] == $rol || $_SESSION['rol'] == "Administrador")){
      header("Location: ../index.php?error=No tienes permiso");
      exit();
    }
  }else{
      session_destroy();
      header("Location: ../index.php?error=No estás autenticado.");
      exit();
  }
}
// Inserta el botón MI PERFIL y el usuario en el menú.
function miperfil(){
    if(isset($_SESSION[autenticado])){
            echo " ($_SESSION[usuario])";
    }
}
// Inserta el botón del PANEL DE CONTROL si eres administrador.
function muestraPanel(){
    if($_SESSION['rol'] == "Administrador"){
            echo "<li class='boton'><a href='admin/panelcontrol.php'>Panel de Control</a></li>";
    }
}
// Función que carga el cuadro de inicio de sesión.
function cuadroLogin(){
    if(!isset($_SESSION['autenticado'])){
        echo "<div class='col-2 formuLogin'>
              <h3>Inicie sesión</h3>
                <form name='iniciaSesion' id='formularioSesion' method='post' action='control.php'>

                    <input type='text' name='login' placeholder='Usuario' required /><br>
                    <input type='password' name='password' placeholder='Contraseña' required /><br>
                    <input type='submit' name='autenticar' value='Iniciar sesión' onclick='inicioSesion(this);' /><br>
                    <p>¿No estás registrado? <a href='registrar.php'>Regístrate ahora.</a></p>
                </form>
            </div>";
    };
}
// Función que carga el pie de página.
function pie(){
    echo "ESPLORAS es software libre con licencia GPL v3.
            Por favor, si encuentras algún error o tienes alguna sugerencia,
            escríbeme a esploras@openmailbox.org";
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
// Cuadro de subida de archivos.
function cuadroSubida(){
    if(isset($_SESSION['autenticado'])){
        echo "<h3>Suba un archivo</h3>
              <form enctype='multipart/form-data' action='registrado/subir.php' method='post'>
                <input type='file' name='fileToUpload' id='fileToUpload'>
                <input type='submit' value='Subir archivo' name='submit'>
              </form>";
        
    }
}
// Función que muestra los errores.
function muestraError(){
    if(isset($_GET['error'])){
        echo "<div id='error'>Error: $_GET[error]</div>";
    }
}
?>
