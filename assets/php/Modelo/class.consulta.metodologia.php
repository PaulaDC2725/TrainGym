<?php
class consultaMetodologia{
    public function  registrarSuscMeto($metodologia,$fechaMet,$fechaMetFin)
		{
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();					
			$sql = "INSERT INTO suscripcion_metodologia(idSuscripcionFK, idMetodologiaFK, fechaMetodologiaInicio,fechaMetodologiaFin)values ((SELECT max(idSuscripcion) FROM suscripciones),'".$metodologia."','".$fechaMet."','".$fechaMetFin."')";		

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
		$sql="SELECT * FROM consultarmetodologia";
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
		FROM clientes C 
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
		$sql="INSERT INTO ejercicios
		SELECT MAX(idEjercicio) + 1,'".$idParteDelCuerpoFK."', '".$Ejercicio."' FROM ejercicios";
		$statement=$conexion->prepare($sql);			
		$statement->execute();
		while ($result=$statement->fetch()) {
			$rows[]=$result;
		}
		return $sql;
	}
	

	public function registrarSeries($nombreSerie, $descripcionSerie,$repeticion,$Secuencia,$imgEjercicio,$idMetodologia)
	{
		$rows=null;
		$estado=1;
		$modelo = new Conexion();
		$conexion = $modelo->getConection();					
		$sql="INSERT INTO serie_de_ejercicio 
		SELECT MAX(idSerie) + 1,'".$nombreSerie."','".$descripcionSerie."','".$repeticion."','".$Secuencia."','".$imgEjercicio."','".$idMetodologia."' FROM serie_de_ejercicio;";
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
	public function registrartbSerie($idEjercicio)
	{
		$rows=null;
		$estado=1;
		$modelo = new Conexion();
		$conexion = $modelo->getConection();					
		$sql="INSERT INTO tb_series_ejercicios(idEjercicioFK,idSerieFK) values ('".$idEjercicio."',(SELECT MAX(idSerie) From serie_de_ejercicio))";
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
		$sql="SELECT s.urlImagen, m.nombreMetodologia,U.NumeroIdentificacion, S.nombreSerieEjercicio,S.descripcionSerieEjercicio,I.nombreInstructor From serie_de_ejercicio S JOIN metodologia as m JOIN usuarios U JOIN instructores I ON I.idUsuarioFK=U.idUsuario and m.idMetodologia=s.idMetodologiaFK where U.NumeroIDentificacion= '".$numeroIdentificacion."'";
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
		$sql="SELECT s.urlImagen,m.nombreMetodologia,U.NumeroIdentificacion, S.nombreSerieEjercicio,S.descripcionSerieEjercicio,C.nombreCliente From serie_de_ejercicio S JOIN metodologia as m JOIN usuarios U JOIN clientes C ON C.idUsuarioFK=U.idUsuario and m.idMetodologia=s.idMetodologiaFK where U.NumeroIDentificacion= '".$numeroIdentificacion."' and m.idMetodologia='".$idMetodologia."'";
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
		$sql="SELECT m.nombreMetodologia, U.NumeroIdentificacion, S.nombreSerieEjercicio,S.descripcionSerieEjercicio,I.nombreInstructor From serie_de_ejercicio S JOIN metodologia as m JOIN usuarios U JOIN instructores I ON I.idUsuarioFK=U.idUsuario and s.idMetodologiaFK=m.idMetodologia WHERE ".$filtroCol." LIKE '%".$valor."%' AND U.NumeroIDentificacion= '".$numeroIdentificacion."'";
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
	$sql="SELECT m.nombreMetodologia,U.NumeroIdentificacion, S.nombreSerieEjercicio,S.descripcionSerieEjercicio,C.nombreCliente From serie_de_ejercicio S JOIN metodologia as m JOIN usuarios U JOIN clientes C ON C.idUsuarioFK=U.idUsuario and m.idMetodologia=s.idMetodologiaFK WHERE ".$filtroCol." LIKE '%".$valor."%' AND U.NumeroIDentificacion= '".$numeroIdentificacion."' AND m.idMetodologia='".$idMetodologia."' ";
	$statement=$conexion->prepare($sql);
	$statement->execute();
	while ($result=$statement->fetch()) {
		$rows[]=$result;
	}
	return $rows;
}

	
}

?>