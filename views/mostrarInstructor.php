<!DOCTYPE html>
<html>
<head>
	
<title>| Instructores en el sistema</title>
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
		color: black; ">Instructores del gimnasio</h1>
		</div>
		<div class="table-responsive"> 
  <table class="table table-striped">
    <thead>
      <tr>
        
       
        
        <th scope="col"> ID </th>
        <th scope="col"> Número de identificación </th>
        <th scope="col"> Tipo de documento</th>
        <th scope="col"> Nombre </th>
        <th scope="col"> Apellido </th>
        <th scope="col"> Correo electrónico </th>
        <th scope="col"> Teléfono </th>
        <th scope="col"> Contraseñaa </th>
        <th scope="col">Estado del usuario</th>
        <th colspan="2">Acción</th>
      </tr>
    </thead>
    <tbody>        
       <tr class="limitada" scope="row">
       
        <c:forEach var="instructor" items="${instructores}">
        
        <th scope="row">${instructor.getIdIn()}</th>
        <td>${instructor.getNumDocIn()}</td>
         <td>${instructor.getTipoDocIn()}</td>
           <td>${instructor.getNombreIn()}</td>
          <td>${instructor.getApellidoIn()}</td>
            <td>${instructor.getCorreoIn()}</td>
            <td>${instructor.getTelefonoIn()}</td>
            <td>${instructor.getPassword()}</td>
            <td> </td>
        <td><a href="PersonaController?&accion=Cargar&id=${persona.getId()}">Actualizar</a> <button>Inhabilitar</button></td>
        <td><a onclick="javascript:return confirm('¿Seguro que desea elimiar el registro?');" href="PersonaController?accion=Eliminar&id=${persona.getId()}">Inhabilitar</a></td>
        
        </c:forEach>
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