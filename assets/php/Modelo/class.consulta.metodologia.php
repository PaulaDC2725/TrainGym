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
		return $rows;
	}
	

	public function registrarSeries($nombreSerie, $descripcionSerie,$repeticion,$Secuencia)
	{
		$rows=null;
		$estado=1;
		$modelo = new Conexion();
		$conexion = $modelo->getConection();					
		$sql="CALL registrarSerie('".$nombreSerie."','".$descripcionSerie."','".$repeticion."','".$Secuencia."')";
		$statement=$conexion->prepare($sql);			
		$statement->execute();
		while ($result=$statement->fetch()) {
			$rows[]=$result;
		}
		return $rows;
	}
	public function consultarSeries($numeroIdentificacion)
	{
		$rows=null;
		$estado=1;
		$modelo = new Conexion();
		$conexion = $modelo->getConection();					
		$sql="SELECT U.NumeroIdentificacion, S.nombreSerieEjercicio,S.descripcionSerieEjercicio,I.nombreInstructor From serie_de_ejercicio S JOIN USUARIOS U JOIN INSTRUCTORES I ON I.idUsuarioFK=U.idUsuario where U.NumeroIDentificacion= '".$numeroIdentificacion."'";
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
		$sql="SELECT U.NumeroIdentificacion, S.nombreSerieEjercicio,S.descripcionSerieEjercicio,I.nombreInstructor From serie_de_ejercicio S JOIN USUARIOS U JOIN INSTRUCTORES I ON I.idUsuarioFK=U.idUsuario WHERE ".$filtroCol." LIKE '%".$valor."%' AND U.NumeroIDentificacion= '".$numeroIdentificacion."'";
		$statement=$conexion->prepare($sql);
		$statement->execute();
		while ($result=$statement->fetch()) {
			$rows[]=$result;
		}
		return $rows;
	}
}

?>