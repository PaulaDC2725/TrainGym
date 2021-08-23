
<!DOCTYPE html>
<html>
<head>
	
<title>| Pagos realizados</title>
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
<link rel="icon" type="image/x-icon" href="../assets/img/Logotipo.PNG" />
	<!-- Core theme CSS (includes Bootstrap)-->
<link href="../assets/css/style.css" rel="stylesheet" />
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
  <body>
  <div class="container">

		<h1 style="font-size: 2.6em;
		font-weight: 1000;
		color: black; "> Información de los apgos realizados</h1>
		</div>
		<table class="table table-striped">
  <tbody>
    <tr>
      <form action="" method="GET" id="form">        
        <td>
          <select type="option" id="est" name="filtroCol" class="form-control" required="">
            <option value="metodoPago">Método de pago</option>
            <option value="DescripcionPago">Descripción</option>
            <option value="valorPago">Valor</option>
          </select>          
        </td>
        <td>
          <input type="text" name="valor" class="form-control" value="" required="">
        </td>
        <td>          
          <button type="submit" class="btn btn-dark" >Buscar</button>
        </td>
        <td>
          <a href="mostrarClientes.php"><input type="button" class="btn btn-warning" value="Limpiar Busqueda"></a>
        </td>
      </form>         
      <td>
        
      </td>  
    </tr>
  </tbody>
</table>
		<div class="table-responsive"> 
  <table class="table table-striped">
    <thead>
      <tr>
        
        <th scope="col">Fecha de pago</th>
        <th scope="col">Valor</th>
        <th scope="col">Descripción</th>
        <th scope="col">Método de pago</th>
        <th scope="col">Estado de pago</th>
      </tr>
    </thead>
    <tbody>        
       <tr class="limitada" scope="row">
     <th scope="col">07/04/2021</th>
        <td>130000</td>
        <td>Pago mensualidad</td>
        <td>Tarjeta de crédito (PSE)</td>
        <td>Confirmado</td>
    </tbody>
    </table>
    </div>
   
    <br>
		<center><input type="botton" class="btn btn-dark" value="Regresar" name="boton1" onclick="location.href='inicioRecepcionista.php'"></center>
				<hr>
		
		</body>
	<script
	src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
	crossorigin="anonymous"></script>
		</html>