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

include_once '../conf/config.php';
include_once '../funciones.php';
include_once '../control.php';

seguridad("Registrado");
$usuario = $_SESSION['login'];

if(isset($_POST[submit])){
    // Comprueba si existe el directorio del usuario. 
    // Si no existe, lo crea.
    if(file_exists("subidos/$usuario/")){
        $dir_subida = "subidos/$usuario/";
        echo "Existe la carpeta.<br>";
    }else{
        echo "No existe la carpeta.<br>";
        mkdir("subidos/$usuario/");
        echo "Ahora si existe.<br>";
        $dir_subida = "subidos/$usuario/";
    }
    
    $fichero_subido = $dir_subida . "/" . basename($_FILES['fichero_usuario']['name']);
    $uploadOk = 1;
    
    move_uploaded_file($_FILES["fichero_usuario"]["tmp_name"], $fichero_subido); 
    echo "El archivo ". basename( $_FILES["fichero_usuario"]["name"]). " ha sido subido.";
    
}

?>