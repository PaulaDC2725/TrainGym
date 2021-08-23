
<!DOCTYPE html>
<html lang="es-ES">
<head>
<meta charset="utf-8">
<title>Prueba de conexi�n</title>
</head>
<body>

<%


/*
if(conexion.conectar()!=null){
    out.println("Conexi�n a base de datos ha sido establecida");
}
else{
    out.println("Conexi�n a base de datos ha generado un error");
}*/


int num=Integer.parseInt(request.getParameter("Num"));
String contrase�a=request.getParameter("Contrase�a");

out.print("Su numero de identificacion y contrase�a: " + num + " " + contrase�a + "<br>");
%>

</body>
</html>