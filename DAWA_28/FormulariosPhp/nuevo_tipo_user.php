<script type="text/javascript">
 function MiFuncionJS(){ 
    alert('Usuario registrado con éxito');
    history.back();
    }
    function Error(){ 
    alert('¡Usuario ya existente!');
    history.back();
    }
</script>

<?php
    if(isset($_POST['Registrar'])){
        $Nombre = $_POST['name_a'];
        $tipo = $_POST['tipo'];
        $psw = $_POST['password'];
        $email = $_POST['email'];

        $server = "localhost";
        $user = "user1";
        $pass = "12345";
        $basedatos = "ag_autos";
        if($Nombre != "" || $psw != "" || $email != "" || $tipo != ""){
            //Conectar al manejador de BD
            $conn = mysqli_connect($server, $user, $pass) or die("Error: No se pudo conectar");
            //establecer conexion con BD
            mysqli_select_db($conn, $basedatos) or die("Error no se ha encontrado la base de datos");
            //Verificar si el usuario ya existe
            $query = "SELECT * FROM usuarios WHERE nombre_usuario ='$Nombre'";
            $resultado = mysqli_query($conn,$query) or die ("Error: ¡Usuario ya existente!");
            $num_registros = mysqli_num_rows($resultado);
            if($num_registros==0){
                //Consulta SQL que muestra el contenido de una tabla
                $query = "INSERT INTO usuarios(nombre_usuario,pass_usuario,tipo_usuario,correo_usuario) VALUE('$Nombre','$psw','$tipo','$email')";
                //Ejecutar la consulta
                $resultado = mysqli_query($conn,$query) or die ("Error: ¡Usuario ya existente!");
                echo "<script>";
                echo "MiFuncionJS();";
                echo "</script>";
            }else{

                echo "<script>";
                echo "Error();";
                echo "</script>";
            }
        }else{
            echo "<p>Falto informacion</p>";
        }
    }
?>