// script.js
// Código JavaScript para el comportamiento del cliente
// Obtener el formulario por su nombre
var form = document.forms["login"];
// Obtener los campos de entrada por su id
var email = document.getElementById("email");
var password = document.getElementById("password");
// Agregar un evento de submit al formulario
form.addEventListener("submit", function(event) {
    // Evitar que el formulario se envíe por defecto
    event.preventDefault();
    // Validar que los campos no estén vacíos
    if (email.value == "" || password.value == "") {
        // Mostrar una alerta de error
        alert("Por favor, ingrese su correo electrónico y contraseña");
    } else {
        // Enviar el formulario al servidor
        form.submit();
    }
});
