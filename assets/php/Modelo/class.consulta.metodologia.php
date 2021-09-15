<?php
class consultaMetodologia{
    public function registrarMetodologia($idMetodologia,$nombreMetodologia)
		{
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();					
			$sql = "INSERT INTO metodologia(idMetodologia, nombreMetodologia) VALUES ('".$idMetodologia."','".$nombreMetodologia."')";		

			$statement=$conexion->prepare($sql);

		if (!$statement) {
			 return "error al crear registro";			 	
		 }else{
			 $statement->execute();	
			 return $rows;
		 }
	}
	public function consultarMetodologiaFiltroId($filtro)
	{
		$rows=null;
		$modelo = new Conexion();
		$conexion = $modelo->getConection();					
		$sql = "INSERT INTO metodologia(idMetodologia, nombreMetodologia) VALUES ('".$idMetodologia."','".$nombreMetodologia."')";		

		$statement=$conexion->prepare($sql);

	if (!$statement) {
		 return "error al crear registro";			 	
	 }else{
		 $statement->execute();	
		 return $rows;
	 }
	}
	/*public function consultarMetodologia()
	{
		$rows=null;
		$modelo = new Conexion();
		$conexion = $modelo->getConection();					
		$sql = "SELECT U.NumeroIdentificacion, C.nombreCliente, C.apellidoCliente,C.correoCliente, C.telefonoCliente, M.nombreMetodologia 
		FROM Clientes C 
		JOIN usuarios U JOIN metodologia m JOIN suscripciones s 
		on C.idUsuarioFK = U.idUsuario and s.idClienteFK = C.idCliente and s.idMetodologiaFK=m.idMetodologia
		order by nombreMetodologia asc";
		$statement=$conexion->prepare($sql);
	if (!$statement) {
		 return "error al crear registro";			 	
	 }else{
		 $statement->execute();	
		 return $rows;
	 }
	}*/
	public function consultarMetodologia()
	{
		$rows=null;
		$estado=1;
		$modelo = new Conexion();
		$conexion = $modelo->getConection();					
		$sql="SELECT U.NumeroIdentificacion, C.nombreCliente, C.apellidoCliente,C.correoCliente, C.telefonoCliente, M.nombreMetodologia 
		FROM Clientes C 
		JOIN usuarios U JOIN metodologia m JOIN suscripciones s 
		on C.idUsuarioFK = U.idUsuario and s.idClienteFK = C.idCliente and s.idMetodologiaFK=m.idMetodologia
		order by nombreMetodologia asc";
		$statement=$conexion->prepare($sql);			
		$statement->execute();
		while ($result=$statement->fetch()) {
			$rows[]=$result;
		}
		return $rows;
	}
	public function consultarMetoFiltrados($filtroCol, $valor){
		$rows=null;
		$modelo = new Conexion();
		$conexion = $modelo->getConection();
		$sql="SELECT U.NumeroIdentificacion, C.nombreCliente, C.apellidoCliente,C.correoCliente, C.telefonoCliente, M.nombreMetodologia 
		FROM Clientes C 
		JOIN usuarios U JOIN metodologia m JOIN suscripciones s 
		on C.idUsuarioFK = U.idUsuario and s.idClienteFK = C.idCliente and s.idMetodologiaFK=m.idMetodologia
		WHERE ".$filtroCol." LIKE '%".$valor."%'";
		$statement=$conexion->prepare($sql);
		$statement->execute();
		while ($result=$statement->fetch()) {
			$rows[]=$result;
		}
		return $rows;
	}
	public function registrarEjercicios($idParteDelCuerpoFK,$Ejercicio)
	{
		$rows=null;
		$estado=1;
		$modelo = new Conexion();
		$conexion = $modelo->getConection();					
		$sql="INSERT INTO EJERCICIOS
		SELECT MAX(idEjercicio) + 1,'".$idParteDelCuerpoFK."', '".$Ejercicio."' FROM EJERCICIOS";
		$statement=$conexion->prepare($sql);			
		$statement->execute();
		while ($result=$statement->fetch()) {
			$rows[]=$result;
		}
		return $sql;
	}
	

	public function registrarSeries($nombreSerie, $descripcionSerie,$repeticion,$Secuencia,$idMetodologia)
	{
		$rows=null;
		$estado=1;
		$modelo = new Conexion();
		$conexion = $modelo->getConection();					
		$sql="INSERT INTO SERIE_DE_EJERCICIO 
		SELECT MAX(idSerie) + 1,'".$nombreSerie."','".$descripcionSerie."','".$repeticion."','".$Secuencia."','".$idMetodologia."' FROM SERIE_DE_EJERCICIO;";
		$statement=$conexion->prepare($sql);			
		$statement->execute();
		while ($result=$statement->fetch()) {
			$rows[]=$result;
		}
		return $sql;
	}
	public function ConsultarSucrcipcion($idMetodologia)
	{
		$rows=null;
		$estado=1;
		$modelo = new Conexion();
		$conexion = $modelo->getConection();					
		$sql="SELECT idSuscripcion from suscripciones where idMetodologiaFK='".$idMetodologia."';";
		$statement=$conexion->prepare($sql);			
		$statement->execute();
		while ($result=$statement->fetch()) {
			$rows[]=$result;
		}
		return $rows;
	}
	public function registrarSuscSerie($idSuscripcionFK,$fechaInicio,$fechaFin)
	{
		$rows=null;
		$estado=1;
		$modelo = new Conexion();
		$conexion = $modelo->getConection();					
		$sql="INSERT INTO suscripciones_serie_ejercicio SELECT MAX(idSerie),'".$idSuscripcionFK."','".$fechaInicio."','".$fechaFin."' 
		From serie_de_ejercicio";
		$statement=$conexion->prepare($sql);			
		$statement->execute();
		while ($result=$statement->fetch()) {
			$rows[]=$result;
		}
		return $sql;
	}
	public function registrarRutEj($idEjercicio)
	{
		$rows=null;
		$estado=1;
		$modelo = new Conexion();
		$conexion = $modelo->getConection();					
		$sql="INSERT INTO rutinas_ejercicio(idEjercicioFK,idSerieFK) Values ('".$idEjercicio."', (SELECT MAX(idSerie) FROM serie_de_ejercicio))";
		$statement=$conexion->prepare($sql);			
		$statement->execute();
		while ($result=$statement->fetch()) {
			$rows[]=$result;
		}
		return $sql;
	}
	public function consultarSeries($numeroIdentificacion)
	{
		$rows=null;
		$estado=1;
		$modelo = new Conexion();
		$conexion = $modelo->getConection();					
		$sql="SELECT m.nombreMetodologia,U.NumeroIdentificacion, S.nombreSerieEjercicio,S.descripcionSerieEjercicio,I.nombreInstructor From serie_de_ejercicio S JOIN metodologia as m JOIN USUARIOS U JOIN INSTRUCTORES I ON I.idUsuarioFK=U.idUsuario and m.idMetodologia=s.idMetodologiaFK where U.NumeroIDentificacion= '".$numeroIdentificacion."'";
		$statement=$conexion->prepare($sql);			
		$statement->execute();
		while ($result=$statement->fetch()) {
			$rows[]=$result;
		}
		return $rows;
	}
	public function consultarSeriesCli($numeroIdentificacion,$idMetodologia)
	{
		$rows=null;
		$estado=1;
		$modelo = new Conexion();
		$conexion = $modelo->getConection();					
		$sql="SELECT m.nombreMetodologia,U.NumeroIdentificacion, S.nombreSerieEjercicio,S.descripcionSerieEjercicio,C.nombreCliente From serie_de_ejercicio S JOIN metodologia as m JOIN USUARIOS U JOIN Clientes C ON C.idUsuarioFK=U.idUsuario and m.idMetodologia=s.idMetodologiaFK where U.NumeroIDentificacion= '".$numeroIdentificacion."' and m.idMetodologia='".$idMetodologia."'";
		$statement=$conexion->prepare($sql);			
		$statement->execute();
		while ($result=$statement->fetch()) {
			$rows[]=$result;
		}
		return $rows;
	}
	public function consultarSeriesFiltrados($filtroCol, $valor, $numeroIdentificacion){
		$rows=null;
		$modelo = new Conexion();
		$conexion = $modelo->getConection();
		$sql="SELECT m.nombreMetodologia, U.NumeroIdentificacion, S.nombreSerieEjercicio,S.descripcionSerieEjercicio,I.nombreInstructor From serie_de_ejercicio S JOIN metodologia as m JOIN USUARIOS U JOIN INSTRUCTORES I ON I.idUsuarioFK=U.idUsuario and s.idMetodologiaFK=m.idMetodologia WHERE ".$filtroCol." LIKE '%".$valor."%' AND U.NumeroIDentificacion= '".$numeroIdentificacion."'";
		$statement=$conexion->prepare($sql);
		$statement->execute();
		while ($result=$statement->fetch()) {
			$rows[]=$result;
		}
		return $rows;
	}
	
	public function consultarSeriesFiltradosCli($filtroCol, $valor, $numeroIdentificacion,$idMetodologia){
	$rows=null;
	$modelo = new Conexion();
	$conexion = $modelo->getConection();
	$sql="SELECT m.nombreMetodologia,U.NumeroIdentificacion, S.nombreSerieEjercicio,S.descripcionSerieEjercicio,C.nombreCliente From serie_de_ejercicio S JOIN metodologia as m JOIN USUARIOS U JOIN Clientes C ON C.idUsuarioFK=U.idUsuario and m.idMetodologia=s.idMetodologiaFK WHERE ".$filtroCol." LIKE '%".$valor."%' AND U.NumeroIDentificacion= '".$numeroIdentificacion."' AND m.idMetodologia='".$idMetodologia."' ";
	$statement=$conexion->prepare($sql);
	$statement->execute();
	while ($result=$statement->fetch()) {
		$rows[]=$result;
	}
	return $rows;
}

	
}

?>