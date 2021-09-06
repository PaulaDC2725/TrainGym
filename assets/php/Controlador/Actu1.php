<?php
require_once('../Modelo/class.conexion.php');
require_once('../Modelo/class.consulta.cliente.php');    
if (isset($_GET['id'])&& isset($_GET['NumeroIdentificacion'])){
   $consultas = new ConsultasClientes(); 
   $id=$_GET['id'];
   $numeroIdentificacion = $_GET['NumeroIdentificacion'];
   $filtro=$numeroIdentificacion;   
    $correoCliente = $_POST['corr'];
    $telefonoCliente = $_POST['Tel'];

    $filas = $consultas->cargarClientesFiltroId($filtro);

    foreach ($filas as $fila) {
		$id=$fila['idCliente'];    
      $numeroIdentificacion=$fila['NumeroIdentificacion'];    
      $nombreCliente=$fila['nombreCliente'];
      $apellidoCliente=$fila['apellidoCliente'];
      $fechaNacimientoCliente=$fila['fechaNacimientoCliente'];
    } 
  }
/*window.location = "../../../views/actualizarCliente.php?id='.$numeroIdentificacion.'"; */
?>
<!Doctype HTML>
<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
rel="stylesheet"
integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
crossorigin="anonymous">
<!--<link rel="stylesheet" href="../assets/css/style.css">-->
<link rel="icon" type="image/x-icon" href="../../../assets/img/Logotipo.PNG" />
	<!-- Core theme CSS (includes Bootstrap)-->
<link href="../../../assets/css/style.css" rel="stylesheet" />
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>| Actualizar Cliente</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-Dark">
        <div class="container">
          <center><a href="inicioRecepcionista.php">
            <img class="encabezado" width="300" height="70" src="../../../assets/img/logo.png">
            </a>
        </center>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="../../../Views/mostrarClientes.php">Regresar</a></li>
                </ul>
            </div>
        </div>
    </nav>
<div class="container">
	<form method="post" action="">
			<!--<form class="box" method="post" action="../assets/php/Controlador/Registro1.php">-->
			<div id="registroPaso1">
				<center>
					<h1 margin: 0,padding: 0 0 20px, text-align: center, font-size: 22px>
						Datos del cliente 
					</h1>
				</center>
				<div class="container">				
					<div class="form-group">
						<label for="Num" class="form-label">Numero de documento: </label>
						<input required type="number" class="form-control" id="NumShow" name="NumShow" value="<?php echo $numeroIdentificacion;?>" placeholder="Ingrese Numero De Identificación"disabled>
                        <input type="hidden" class="form-control" id="Num" name="Num" value="<?php echo $numeroIdentificacion;?>" placeholder="Ingrese Numero De Identificación">
                    </div>
					<div class="form-group">
						<label for="text" class="form-label">Nombre: </label>
						<input required type="text" class="form-control" id="Nom" name="Nom" value="<?php echo $nombreCliente;?>" placeholder="Ingrese Nombre Completo" disabled>
						<input  type="hidden" class="form-control" id="Nom" name="Nom" value="<?php echo $nombreCliente;?>" placeholder="Ingrese Nombre Completo">
					</div>
					<div class="form-group">
						<label for="text" class="form-label">Apellido: </label>
						<input required type="text" class="form-control" id="Ape" name="Ape"value="<?php echo $apellidoCliente;?>"placeholder="Ingrese Apellido Completo" disabled>
						<input type="hidden" class="form-control" id="Ape" name="Ape"value="<?php echo $apellidoCliente;?>"placeholder="Ingrese Apellido Completo">
					</div>
					<div class="form-group">
						<label for="date" class="form-label">Fecha de nacimiento: </label>
						<input required type="date" class="form-control" id="FechaN"value="<?php echo $fechaNacimientoCliente;?>" name="FechaN" disabled>
						<input type="hidden" class="form-control" id="FechaN"value="<?php echo $fechaNacimientoCliente;?>" name="FechaN">
					</div>
					<div class="form-group">
						<label for="Num" class="form-label">Telefono </label>
						<input required type="number" class="form-control" id="Tel" value="<?php echo $telefonoCliente;?>"name="Tel"placeholder="Ingrese Numero De Telefono">
					</div>
					<div class="form-group">
						<label for="email" class="form-label">Correo Electrónico </label>
						<input required type="email" class="form-control" id="corr"value="<?php echo $correoCliente;?>" name="corr"placeholder="Ingrese Correo electronico(email@example.com)">			
						<strong>
						</strong>		
					</div>
					<br>
					<center><button type="submit" value="Actualizar" name="btnf" class="btn btn-dark">Actualizar</button>
		           </center>
					<br>
                    <?php  
                        $mensajes1=$consultas->DuplicidadCorr($correoCliente);
                        foreach ($mensajes1 as $mensaje1) {
                            $correo=$mensaje1['correo'];    
                        } 
                        $mensajes2=$consultas->DuplicidadTel($telefonoCliente);
                        foreach ($mensajes2 as $mensaje2) {
                            $telefono=$mensaje2['Telefono'];    
                        }
                        if($telefono == 0 || $correo == 0){                        
                        $mensaje4 = $consultas-> actualizarCliente($id, $correoCliente, $telefonoCliente);
                        echo "<script>location.href=' ../../../views/mostrarClientes.php';</script>";
                        die();
                        }else if($telefono == 1 && $correo == 1){
                        echo ('<script>swal("ERROR!","Datos repetidos, intente nuevamente","error")</script>');
                        }
	                ?>
					<hr>
				</div>
			</div>
        </form>
    </div>
</body>
</html>
