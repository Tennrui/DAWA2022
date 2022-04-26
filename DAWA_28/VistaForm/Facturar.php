<script type="text/javascript">
 function MiFuncionJS(){ 
    alert('Insertado con éxito');
    history.back();
    }
</script>
<?php
    if(isset($_POST['Facturar'])){
        $id = $_POST['Factura'];
        $fecha = $_POST['fechafactura'];
        $total = $_POST['Total'];
        $cliente = $_POST['Cliente'];

        $server = "localhost";
        $user = "user1";
        $pass = "12345";
        $basedatos = "ag_autos";
        if($id != "" || $fecha != "" || $total != "" || $cliente != ""){
            //Conectar al manejador de BD
            $conn = mysqli_connect($server, $user, $pass) or die("Error: No se pudo conectar");
            //establecer conexion con BD
            mysqli_select_db($conn, $basedatos) or die("Error no se ha encontrado la base de datos");
            //Consulta SQL que muestra el contenido de una tabla
            $query = "INSERT INTO facturas(codigo_factura,fecha_factura,costo_total,nom_cliente) VALUE('$id','$fecha','$total','$cliente')";
            //Ejecutar la consulta
            $resultado = mysqli_query($conn,$query) or die ("Error: ¡Usuario ya existente!");
            echo "<script>";
            echo "MiFuncionJS();";
            echo "</script>";
            mysqli_close($conn);
        }else{
            echo "<p>Falto informacion</p>";
        }
    }
?> 