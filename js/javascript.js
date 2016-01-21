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
 * Función que valida el formulario de registro.
 * Como la condición de que los campos no estén vacíos está incluída 
 * en el HTML, solo tiene que comprobar que el formato del email sea el
 * correcto y que usuario y contraseña no sean iguales.
 * Tampoco admite que el usuario esté contenido en la contraseña.
 * @returns {Boolean}
 */
function registro(){
// Declara las variables pertinentes.
    var	formulario	=	document.getElementById("formularioRegistro");
    var	login		=	formulario.login.value;
    var	password	=	formulario.password.value;
    var email           =       formulario.email.value;

// Comprueba que el formato del email es correcto.
    if (!/[a-z]\@[a-z].[a-z]/.test(email)){
        alert("El campo 'email' debe ser del tipo minúsculas@minúsculas.minúsculas");
        form.email.focus();
        return false;
    }

// Comprueba que usuario y pass no sean iguales y que usuario no esté
// incluído en contraseña.
    if	(formulario.password.value.indexOf(formulario.login.value) != -1){
        alert("La contraseña no puede contener al usuario.");
        formulario.password.focus();
        return false;
    }
}