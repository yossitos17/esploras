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

    // Verificamos que venimos del formulario de autenticacion
    if(isset($_POST['autenticar'])){ 
        include_once 'config/config.php';
        
        // Conexión con la base de datos.
        $conexion= mysqli_connect($host, $user, $password, $database, $port) or die("<br>Error"
                . " en la conexion con la Base de Datos ".mysqli_error($conexion));

        // Evitamos un ataque de inyección SQL en el login o el password.
        $login = mysqli_real_escape_string($conexion,$_POST['login']); 
        $pass = mysqli_real_escape_string($conexion,$_POST['password']);

        // Consulta SQL.
        $sql="select * from usuarios where login='$login' and password=PASSWORD('$pass');";

        // Realizamos la consulta SQL y guardamos el resultado.
        $resultado= mysqli_query($conexion, $sql) or die(mysqli_error($conexion));

        // Obtenemos el número de filas que devuelve la consulta.
        // Si todo es correcto, debe ser solo una.
        $numFilas=  mysqli_num_rows($resultado);
        
        // Si solo hay una fila, crea una sesión con esas credenciales.
        if($numFilas==1){
            $fila=  mysqli_fetch_array($resultado,MYSQLI_ASSOC);

            //Crea una sesion o la propaga. 
            session_start(); 

            //Fijamos las credenciales de sesión.
            $_SESSION['autenticado']=TRUE;
            $_SESSION['usuario']=$_POST['login'];
            $_SESSION['rol']=$fila['rol'];

           // Devolvemos al usuario a la página de inicio.
           header("Location: index.php");
        }else{
            // Si el login es incorrecto, devuelve a la página
            // de inicio con un mensaje de error.
            header("Location: index.php?error=Fallo en el usuario o la contraseña");
        }
    } 
?>