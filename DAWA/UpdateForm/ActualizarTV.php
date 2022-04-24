<script type="text/javascript">
 function MiFuncionJS(){ 
    alert('Venta realizada exitosamente');
    history.back();
    }
</script>
<?php
    if(isset($_POST['Baja'])){
        //$id = $_POST['id'];
        $marca_vehiculo = $_POST['id'];
        $num_serie = $_POST['num_Serie'];
        $color = $_POST['Color'];
        $cantidad = $_POST['Cantidad'];
        $costo = $_POST['Costo'];
        $codigo_f = $_POST['Factura'];

        $server = "localhost";
        $user = "user1";
        $pass = "12345";
        $basedatos = "ag_autos";
        $time = time();
        $fecha = date("Y-m-d", $time);
        $costo_total = $costo * $cantidad;
        if($cantidad != "" && $costo != "" && $codigo_f != ""){
            //Conectar al manejador de BD
            $conn = mysqli_connect($server, $user, $pass) or die("Error: No se pudo conectar");
            //establecer conexion con BD
            mysqli_select_db($conn, $basedatos) or die("Error no se ha encontrado la base de datos");
            $query = "SELECT cantidad FROM vehiculos WHERE marca_vehiculo = '$marca_vehiculo' AND Num_serie = '$num_serie'";
            $resultado = mysqli_query($conn,$query) or die ("Error:No se pudo ejecutar la consulta");
            $fila = mysqli_fetch_row($resultado);
            $cantidad_actual = $fila[0];
            //Consulta SQL que muestra el contenido de una tabla
            $query = "UPDATE vehiculos SET cantidad = '$cantidad_actual' -'$cantidad' WHERE marca_vehiculo = '$marca_vehiculo' AND Num_serie = '$num_serie'";
            //Ejecutar la consulta
            $resultado = mysqli_query($conn,$query) or die ("Error:No se pudo ejecutar la consulta 1");
            //Consulta SQL que muestra el contenido de una tabla
            $query = "INSERT INTO facturas(id_factura,fecha_factura,costo_total) VALUE ('$codigo_f','$fecha','$costo_total')";
            //Ejecutar la consulta
            $resultado = mysqli_query($conn,$query) or die ("Error:No se pudo ejecutar la consulta 2");
            echo "<script>";
            echo "MiFuncionJS();";
            echo "</script>";
            mysqli_close($conn);
        }else{
            echo "<p>Falto informacion</p>";
        }
    }
?>