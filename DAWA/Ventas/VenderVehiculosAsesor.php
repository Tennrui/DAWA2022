<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="../cdnjs/bootstrap-datetimepicker.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="../js/jquery-3.6.0.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.min.js" integrity="sha512-UR25UO94eTnCVwjbXozyeVd6ZqpaAE9naiEUBK/A+QDbfSTQFhPGj5lOR6d8tsgbBk84Ggb5A3EkjsOgPRPcKA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">-->
    <link rel="stylesheet" href="../bootstrap-4.3.1-dist/bootstrap-4.3.1-dist/css/bootstrap.css">
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="../Styles/Styles.css">

    <script type="text/javascript">
        $(document).ready(function(){
            
            $("#id").on('change',function(){
                
                //alert("selec ha cambiado" + $(this).val())
                var i = $("#id").val();
                //alert(i);
                $.ajax({
    
                    type: "POST",
                    url: "../Consultas/ObtenerVehiculos.php",
                    data: {"id":i},
                    dataType: "json",
                    success: function(data){
                    var color = data[0];
                    var costo = data[1];
                   // alert(cantidad);
                    $('#color').val(color);
                    $('#costo').val(costo);

                    
    
                    }
                    
                });//fin ajax
            });
        });
        </script>
 
</head>

<body class ="m-0 ">
    <!--menu-->
    <div class="container-fluid px-0">
        <nav class="navbar navbar-expand-sm navbar-dark bg-black py-0 px-0"> <a class="navbar-brand"  href="#"><img id="logo" src="../img/img_log.jpg"> &nbsp;&nbsp;&nbsp;NombreAgencia</a><span class="v-line"></span> 
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class=" navbar-nav nav nav-pills sm-3 " id="pills-tab" >
                    <li class="nav-item "> <a  class="nav-link" href="../MenusHtml/MenuAsesor.html">Inicio</a> </li>
                    <li class="nav-item "> <a class="nav-link" href="../Consultas/ConsultaPiezasAsesor.php">Info. Piezas</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="../Consultas/ConsultaVehiculosAsesor.php">Info. Vehiculos</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="../Consultas/Citas.php">Citas Agendadas</a> </li>
                    <li class="nav-item dropdown ">
                        <a class="nav-link  dropdown-toggle  active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Realizar Venta
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                          <a class="dropdown-item" href="../Ventas/VenderPiezasAsesor.php">Venta Piezas</a>
                          <a class="dropdown-item active" href="../Ventas/VenderVehiculosAsesor.php">Venta Vehiculos</a>
                        </ul>
                    </li>
                    <li class="nav-item "> <a class="nav-link" href="../Consultas/ConsultaFacturas.php">Info. Facturas</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="../MenusHtml/index.html"> Cerrar sesion</a> </li>
                </ul>
            </div>
        </nav>
    </div>

    <!--Inputs-->
    <div class="container-fluid">
                        <?php
                        
                        $server = 'localhost';
                        $user = 'user1';
                        $pass = '12345';
                        $basedata = 'ag_autos';
                            //Conectar al manejador de BD
                    
                            $conn = mysqli_connect($server,$user,$pass) or die ("Errror: No se pudo conectar");
                            mysqli_select_db($conn,$basedata) or die("Error: no se pudo conectar con la base de datos");
                    
                            $query = "SELECT marca_vehiculo FROM vehiculos";
                            //Ejecutar la consulta
                            $resultado = mysqli_query($conn,$query);
                            if(!$resultado) die("Error no se ha encontrado la base de datos");
                    
                            $num_registros = mysqli_num_rows($resultado);
                        
                            
                            

                            
                                echo"<div class='form-row justify-content-center h-100'>";
                                echo"<div class='card input'>";
                                echo"<div class='well well-sm card-body'>";
                                echo"<form action='ActulizarTP.php' class='form-horizontal' method='post'>";
                                echo"<div class='form-group mb-3 '>";
                                echo"<div class='col-auto text-center'>";   
                                echo "<select required class='form-control' id='id' name = 'id'>";

                                while($fila=mysqli_fetch_array($resultado)){
                                
                            
                                    echo "<option value=".$fila['marca_vehiculo'].">".$fila['marca_vehiculo']."</option>";
                                }
                                            
                                echo"<option value = '0' selected> Ninguno </option";
                                echo"</div>" ;  

                            mysqli_close($conn);
                            echo "<br>";
                        
                        
                        ?>
        
                            </select>
                        </div>
                    </div>
                    <div class=" form-group" id="Color">
                        <div class="input-group-append col-auto text-center">
                                <input id="color" name="Color" type="text" placeholder="Color" class="form-control" required>
                                <!--<span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>-->
                        </div>
                    </div>
                            
                    <div class=" form-group" id="Cantidad">
                            <div class="input-group-append col-auto text-center">
                                <input id="Cantidad" name="Cantidad" type="number" placeholder="Cantidad" class="form-control" min="1" required>
                                <!--<span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>-->
                        </div>
                    </div>
                    <div class=" form-group" id="Costo">
                        <div class="input-group-append col-auto text-center">
                                <input id="costo" name="Costo" type="number" placeholder="Costo" class="form-control" min="1" required>
                                <!--<span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>--->
                        </div>
                    </div>
                     <!--buscar como generar un codigo por javascript y colocarlo dentro del input-->
                    <div class=" form-group" id="Factura">
                        <div class="input-group-append col-auto text-center">
                              <input id="Factura" name="Factura" type="text" placeholder="Codigo.factura.generado" class="form-control" >
                              <input name = "Generador" value="Generar" type="button" class=" btn button">
                          <!--<span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>-->
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            <input name = "Baja" value="Hacer Venta" type="submit" class=" btn btn-dark btn-lg ">
                        </div>
                    </div>

                </form>
         
                </div>
            </div> 
        </div>
    </div>

  <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

     --> 
    
</body>
</html>



