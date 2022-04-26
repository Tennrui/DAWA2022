<script type="text/javascript">
 function MiFuncionJS(){ 
    alert('Cita agendada con éxito');
    history.back();
    }
</script>
<?php
    if(isset($_POST['Agendar'])){
        $mtc = $_POST['motivoCita'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $resp = $_POST['responsable'];
        $usuario = $_POST['id_usuario'];

        $server = "localhost";
        $user = "user1";
        $pass = "12345";
        $basedatos = "ag_autos";
     //echo "<p> $mtc , $date , $time , $resp , $usuario </p> ";

     if($mtc != "" || $date != "" || $resp != "" || $time != "" || $user != ""){
            //Conectar al manejador de BD
            $conn = mysqli_connect($server, $user, $pass) or die("Error: No se pudo conectar");
            //establecer conexion con BD
            mysqli_select_db($conn, $basedatos) or die("Error no se ha encontrado la base de datos");
            //Consulta SQL que muestra el contenido de una tabla
            $query = "INSERT INTO citas (motivo_cita,fecha_cita,responsable_cita,hora_cita,id_usuario) VALUE('$mtc','$date','$resp','$time','$usuario')";
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