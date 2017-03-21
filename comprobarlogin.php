<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php
session_start();
?>

<?php

$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "electrodomesticos";
$tbl_name = "registro";

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$nombre = $_POST['nombre'];
$password = $_POST['password'];
 
$sql = "SELECT * FROM $tbl_name WHERE nombre = '$nombre'";

$result = $conexion->query($sql);


if ($result->num_rows > 0) {     
 }
 $row = $result->fetch_array(MYSQLI_ASSOC);
 if (password_verify($password, $row['password'])) { 
 
    $_SESSION['loggedin'] = true;
    $_SESSION['nombre'] = $nombre;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);

    echo "Bienvenido! " . $_SESSION['nombre'];
    echo "<br><br><a href='principal2.html'>entrar</a>"; 

 } else { 
   echo "nombre o contraseña estan incorrectos.";

   echo "<br><a href='principal.html'>Volver a Intentarlo</a>";
 }
 mysqli_close($conexion); 
 ?>
</body>
</html>