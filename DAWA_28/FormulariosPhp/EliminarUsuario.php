<script type="text/javascript">
 function MiFuncionJS(){ 
    alert('Eliminado con exito');
    history.back();//Checar esto 
    }

    function Verificacion(){ 
    alert('El usuario que se desea eliminar no existe');
    history.back();//Checar esto 
    }
</script>

<?php
    if(isset($_POST['Eliminar'])){
        $psw = $_POST['pass'];
        $email = $_POST['id'];

        $server = "localhost";
        $user = "user1";
        $pass = "12345";
        $basedatos = "ag_autos";
        if($psw != "" && $email != ""){
            //Conectar al manejador de BD
            $conn = mysqli_connect($server, $user, $pass) or die("Error: No se pudo conectar");
            //establecer conexion con BD
            mysqli_select_db($conn, $basedatos) or die("Error no se ha encontrado la base de datos");

            $query = "DELETE FROM usuarios WHERE correo_usuario = '$email' AND pass_usuario = '$psw'";
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