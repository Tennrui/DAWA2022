<?php
$id = $_POST['id'];


$server = 'localhost';
$user ='user1';
$pass = '12345';
$basedatos = 'ag_autos';
$conn = mysqli_connect($server, $user, $pass) or die("Error: No se pudo conectar");
//establecer conexion con BD



mysqli_select_db($conn, $basedatos) or die("Error no se ha encontrado la base de datos");

$query = "SELECT num_serie,color_vehiculo,precio_vehiculo FROM vehiculos WHERE marca_vehiculo = '$id' ";


$resultado = mysqli_query($conn,$query);
if(!$resultado) die ("Error: no se pudo eliminar al empleado");

$num_registros = mysqli_num_rows($resultado);
$registro = mysqli_fetch_row($resultado);
//echo "Cantidad $registro[0]";
//echo "Costo $registro[1]";
mysqli_close($conn);
echo json_encode($registro);
?>