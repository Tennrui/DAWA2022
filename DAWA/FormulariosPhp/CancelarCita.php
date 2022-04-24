<script type="text/javascript">
 function MiFuncionJS(){ 
    alert('Cita cancelada con éxito');
    history.back();
    }
</script>
<?php
    if(isset($_POST['Baja'])){
        $id = $_POST['id_user'];
        $resp = $_POST['responsable'];
        $date = $_POST['date'];

        $server = "localhost";
        $user = "user1";
        $pass = "12345";
        $basedatos = "ag_autos";
        if($id != "" || $resp != "" || $date != ""){ 
            //Conectar al manejador de BD
            $conn = mysqli_connect($server, $user, $pass) or die("Error: No se pudo conectar");
            //establecer conexion con BD
            mysqli_select_db($conn, $basedatos) or die("Error no se ha encontrado la base de datos");
            //Consulta SQL que muestra el contenido de una tabla
            $query = "DELETE FROM citas WHERE id_usuario = '$id' AND fecha_cita = '$date'";
            //Ejecutar la consulta
            $resultado = mysqli_query($conn,$query) or die ("Error:No se pudo ejecutar la consulta");
            echo "<script>";
            echo "MiFuncionJS();";
            echo "</script>";
            mysqli_close($conn);
        }else{
            echo "<p>Falto informacion</p>";
        }
    } 
?> 