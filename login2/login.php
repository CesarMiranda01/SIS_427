<?php
// login.php
// Código PHP para el comportamiento del servidor
// Obtener los valores de los campos de entrada por el método POST
$email = $_POST["email"];
$password = $_POST["password"];
// Conectar a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_db";
$conn = new mysqli($servername, $username, $password, $dbname);
// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
// Preparar la sentencia SQL para buscar el usuario por el correo electrónico
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
// Verificar si el usuario existe
if ($result->num_rows > 0) {
    // Obtener los datos del usuario
    $user = $result->fetch_assoc();
    // Verificar si la contraseña es correcta
    if (password_verify($password, $user["password"])) {
        // Crear una sesión para el usuario
        session_start();
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["user_name"] = $user["name"];
        // Redirigir al usuario a la página de bienvenida
        header("Location: welcome.php");
    } else {
        // Mostrar un mensaje de error por contraseña incorrecta
        echo "Contraseña incorrecta";
    }
} else {
    // Mostrar un mensaje de error por usuario no encontrado
    echo "Usuario no encontrado";
}
// Cerrar la conexión a la base de datos
$conn->close();
?>
