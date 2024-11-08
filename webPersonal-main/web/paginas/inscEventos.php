<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root"; // Cambia si usas otro usuario
$password = ""; // Cambia si tienes una contraseña
$dbname = "eventos"; // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$evento = $_POST['evento'];

$madrid=0;
$donosti=0;
$barcelona=0;
$bilbao=0;

echo "nombre ".$nombre;
echo "<br>apellido ".$apellido;
echo "<br>email ".$email;
    foreach($evento as $x)
    {echo$x;
    if($x==1){
        $barcelona=1;
    }

    if($x==2){
        $bilbao=1;
    }

    if($x==3){
        $madrid=1;
    }

    if($x==4){
        $donosti=1;
    }
    

}




// Preparar e insertar los datos
$sql = "INSERT INTO insc (nombre, apellido, email, madrid, bilbao, donosti, barcelona) VALUES ('$nombre', '$apellido', '$email', '$madrid', '$bilbao', '$donosti', '$barcelona')";

if ($conn->query($sql) === TRUE) {
    echo "Registro exitoso. ¡Gracias por inscribirte!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar conexión
$conn->close();
?>

