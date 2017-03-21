<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>guardar</title>
</head>
<body>
<?php

 $host_db = "localhost";
 $user_db = "root";
 $pass_db = "";
 $db_name = "electrodomesticos";
 $tbl_name = "registro";
 
 $form_pass = $_POST['password'];
 
 $hash = password_hash($form_pass, PASSWORD_BCRYPT); 

 $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

 if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}
//______________________________________________
$buscarUsuario ="SELECT * FROM $tbl_name
WHERE direccion = '$_POST[direccion]";

$buscarUsuario ="SELECT * FROM $tbl_name
WHERE nacimiento = '$_POST[nacimiento]";

$buscarUsuario ="SELECT * FROM $tbl_name
WHERE telefono = '$_POST[telefono]";

$buscarUsuario ="SELECT * FROM $tbl_name
WHERE correo = '$_POST[correo]";

//_______________________________________________
 $buscarUsuario = "SELECT * FROM $tbl_name
 WHERE nombre = '$_POST[nombre]' ";

 $result = $conexion->query($buscarUsuario);

 $count = mysqli_num_rows($result);

 if ($count == 1) {
 echo "<br />". "El Nombre de Usuario ya a sido tomado." . "<br />";

 echo "<a href='formulario.html'>Por favor escoga otro Nombre</a>";
 }
 else{

 $query ="INSERT INTO registro (nombre, direccion, nacimiento, telefono, correo, password)
 VALUES ('$_POST[nombre]', '$_POST[direccion]', '$_POST[nacimiento]', '$_POST[telefono]', '$_POST[correo]', '$hash')";


 if ($conexion->query($query) === TRUE) {
 
 echo "<br />" . "<h2>" . "Usuario Creado Exitosamente!" . "</h2>";
 echo "<h4>" . "Bienvenido: " . $_POST['nombre'] . "</h4>" . "\n\n";
 echo "<h5>" . "Hacer Login: " . "<a href='principal.html'>Lingresar</a>" . "</h5>"; 
 }

 else {
 echo "Error al crear el usuario." . $query . "<br>" . $conexion->error; 
   }
 }
 mysqli_close($conexion);
?>
</body>
</html>