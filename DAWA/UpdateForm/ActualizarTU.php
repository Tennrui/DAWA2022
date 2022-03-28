<script type="text/javascript">
 function MiFuncionJS(){ 
    alert('Insertado con éxito');
    history.back();
    }
</script>
<?php
    if(isset($_POST['Actualizar'])){
        $id = $_POST['id'];
        $Nombre = $_POST['nombre_usuario'];
        $psw = $_POST['pass'];
        $tipo = $_POST['tipo'];
        $email = $_POST['correo'];

        $server = "localhost";
        $user = "user1";
        $pass = "12345";
        $basedatos = "ag_autos";
        if($Nombre != "" || $psw != "" || $email != ""){
            //Conectar al manejador de BD
            $conn = mysqli_connect($server, $user, $pass) or die("Error: No se pudo conectar");
            //establecer conexion con BD
            mysqli_select_db($conn, $basedatos) or die("Error no se ha encontrado la base de datos");
            //Consulta SQL que muestra el contenido de una tabla
            $query = "UPDATE usuarios SET nombre_usuario = '$Nombre', pass_usuario = '$psw', tipo_usuario = '$tipo', correo_usuario = '$email' WHERE id_usuario = $id";
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