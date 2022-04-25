<script type="text/javascript">
 function MiFuncionJS(){ 
    alert('Insertado con éxito');
    
    }
</script>
<?php
    if(isset($_POST['Facturar'])){
        $id = $_POST['Factura'];
        $fecha = $_POST['fechafactura'];
        $Email = $_POST['Email'];
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
            $query = "INSERT INTO facturas(codigo_factura,fecha_factura,Email,nom_cliente) VALUE('$id','$fecha','$Email','$cliente')";
            //Ejecutar la consulta
            $resultado = mysqli_query($conn,$query) or die ("Error");
          
            echo "<script>";
            echo "MiFuncionJS();";
            echo "</script>";
            mysqli_close($conn);
        }else{
            echo "<p>Falto informacion</p>";
        }
    }
?>
<?php ob_start();?>
<div >
    <img src="../img/Lamborghin-Logo.png" style="width:185px" >
    
</div>
<br><br>
<table style="width: 900px; " >
    <thead>
        <tr>
        <th></th>
        <th >Facturar a:</th>
        <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
               Lamborghini S.A de C.V <br>
               C.Alberto Carrera Torres 910,Centro<br>
               Victoria,Tamps,Mexico,Cp:87000<br>

            </td>
            <td>
                <strong>Nombre: </strong><?php echo$cliente?><br>
                <strong>Email: </strong><?php echo$Email?><br>
                
            </td>
            <td>
                <strong>N° Factura: </strong> <?php echo$id?> <br>
                <strong>Fecha: </strong> <?php echo$fecha?> <br>
                
            </td>
        </tr>
        
    </tbody>
</table>
<br>
<br>
<br><br>
<?php
                $server = "localhost";
                $user = "user1";
                $pass = "12345";
                $basedatos = "ag_autos";

                //Conectar al manejador de BD
                $conn = mysqli_connect($server, $user, $pass) or die("Error: No se pudo conectar");
                //establecer conexion con BD
                mysqli_select_db($conn, $basedatos) or die("Error no se ha encontrado la base de datos");
                //Consulta SQL que muestra el contenido de una tabla
                $query = "SELECT * FROM ventas WHERE id_factura= '$id'";
                //Ejecutar la consulta
                $resultado = mysqli_query($conn,$query);
                if(!$resultado) die("Error no se pudo realizar la consulta");
                $num_registros = mysqli_num_rows($resultado);
                //echo "<h1 class = 'w3-blue'>Consulta de datos </h1>";
            // echo "<p class = ''>El numero de registros de piezas es: $num_registros</p>";
            echo"<div class='form-row justify-content-center h-100'>";
            echo"<div class='card consulta'>";
            echo"<div class='well well-sm card-body'>";
                //Crear la tabla HTML
                echo"<div class='table-responsive-lg'>";
                echo "<table  style='width: 900px; border: 1px solid;'>";
                echo "<thead>";
                echo "<tr><th>Producto</th><th>Numero de Serie </th><th>Cantidad</th><th>Costo Unitario</th>";
                echo"</thead>";
                $tot=0;
                while($fila = mysqli_fetch_assoc($resultado)){
                    echo "<tr >";
                    echo "<td style='text-align:center'>".$fila['id_pieza']."</td>";
                    echo "<td style='text-align:center'>".$fila['Num_serie']."</td>";
                    echo "<td style='text-align:center'>".$fila['cantidad_producto']."</td>";
                    echo "<td style='text-align:center'>".$fila['costo_unitario']."</td>";
                    echo "</tr >";
                   
                    $tot=$tot+$fila['costo_unitario']*$fila['cantidad_producto'];
    
                }
                echo"</div>";
                $iva=$tot*.16;
                $totiv=$tot*1.16;
                
                echo"</tbody>";
                echo "</table>";
                echo"<div class='table-responsive-lg'>";
                echo"<br><br><br><table style='width:800px;'>";
                echo"<tr>";
                echo"<td><barcode code='https://www.youtube.com/watch?v=0NN3rfMdd4A' type='QR' class='barcode' size='1.2' error='M' disableborder='1' /></td>";
                
                echo"<td> Forma de pago:<strong> Efectivo</strong>";
                echo"<br><br> Moneda: <strong>MXN</strong>";
                
                echo"<td><img src='../img/espacio.png' style='width:130px'></td>";
                echo"<td><br><strong>Subtotal:  </strong>$$tot<br><br><strong>IVA(16%): </strong>$$iva<br><br><strong>Total: </strong>$$totiv</td>";
                echo"</tr>";
                echo"</table>";
                mysqli_close($conn);
                echo"</div>";
            echo"</div>";
            echo"</div>";
            echo"</div>";
            ?>
            
<br>

<div>
<br><br><br>


<img src="../img/Factura.png" style="width:900px">
<br><br><br><br><br><br>
<div style="text-align:center">
<hr style="width:220px; ">
<p>Firma</p>
</div>

</div>

<?php $doc= ob_get_clean();?>
<?php
require_once '../vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf([
	'margin_left' => 20,
	'margin_right' => 15,
	'margin_top' => 25,
	'margin_bottom' => 15,
	'margin_header' => 10,
	'margin_footer' => 10,
	'showBarcodeNumbers' => FALSE
]);

try {

	$mpdf->WriteHTML($doc);

} catch (\Mpdf\MpdfException $e) {

	die ($e->getMessage());

}

$mpdf->Output('Factura.pdf', \Mpdf\Output\Destination::DOWNLOAD);

?>