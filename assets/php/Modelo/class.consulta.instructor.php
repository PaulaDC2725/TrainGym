<?php


	class ConsultasInstructor{
		public function registrarInstructor($nombreInstructor, $apellidoInstructor, $correoInstructor,$telefonoInstructor,$estadoInstructor)
			{
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();					
			$sql = "CALL registrarInstructor('".$nombreInstructor."','".$apellidoInstructor."','".$correoInstructor."','".$telefonoInstructor."','".$estadoInstructor."')";		

			$statement=$conexion->prepare($sql);

		if (!$statement) {
			return "error al crear registro";			 	
		}else{
			$statement->execute();	
			return $rows;
		}
	}
		

		public function actualizarInstructor($idInstructor, $correoInstructor, $telefonoInstructor){
			$rows=null;
			$estado=1;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();					
			$sql="CALL actualizarInstructor('".$idInstructor."',
			'".$correoInstructor."','".$telefonoInstructor."')";
			$statement=$conexion->prepare($sql);			
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $rows;
		}
		public function DuplicidadCorr($correoInstructor){
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();					
			$sql="SELECT count(correoinstructor) AS correo from instructores where correoinstructor='".$correoInstructor."';";
			$statement=$conexion->prepare($sql);			
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $rows;
		}
		public function DuplicidadTel($telefonoInstructor){
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();					
			$sql="SELECT count(telefonoInstructor) AS Telefono from instructores where telefonoInstructor='".$telefonoInstructor."';";
			$statement=$conexion->prepare($sql);			
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $rows;
		}
	public function consultarInstructor(){
			$rows=null;
			$estado=1;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();					
			$sql="CALL consultarInstructor()";
			$statement=$conexion->prepare($sql);			
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $rows;

		}
		
		public function consultarInstructorHab(){
			$rows=null;
			$estado=1;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();					
			$sql="SELECT I.idInstructor, U.NumeroIdentificacion, I.nombreInstructor, I.apellidoInstructor, I.correoInstructor, I.telefonoInstructor 
			FROM usuarios AS U 
			JOIN instructores AS I 
			ON U.idUsuario=I.idUsuarioFK  Where U.estadoUsuario = '0'";
			$statement=$conexion->prepare($sql);			
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $rows;
		}

		public function consultarInstructorFiltrados($filtroCol, $valor){
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql="SELECT I.idInstructor,U.NumeroIdentificacion, I.nombreInstructor, I.apellidoInstructor, I.correoInstructor, I.telefonoInstructor
			FROM usuarios AS U 
			JOIN instructores AS I
			ON U.idUsuario=I.idUsuarioFK
			WHERE ".$filtroCol." LIKE '%".$valor."%' AND estadoUsuario=1";
			$statement=$conexion->prepare($sql);
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $rows;
		}
		public function consultarInstructorFiltrados1($filtroCol, $valor){
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql="SELECT I.idInstructor,U.NumeroIdentificacion, I.nombreInstructor, I.apellidoInstructor, I.correoInstructor, I.telefonoInstructor
			FROM usuarios AS U 
			JOIN instructores AS I
			ON U.idUsuario=I.idUsuarioFK
			WHERE ".$filtroCol." LIKE '%".$valor."%' AND estadoUsuario=0";
			$statement=$conexion->prepare($sql);
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $rows;
		}


		public function cambiarEstadoInstructor($estadoInstructor, $idInstructor){
			$rows=null;			
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql='UPDATE instructores SET estadoInstructor='.$estadoInstructor.' WHERE idInstructor="'.$idInstructor.'";';
			$statement=$conexion->prepare($sql);

			if (!$statement) {
			 	return "error al actualizar registro";
			}else{
			 	$statement->execute();
				return $rows;
			}


		}
		
		
		public function cargarInstructorFiltroId($filtro){
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql="SELECT I.idInstructor,U.NumeroIdentificacion, I.nombreInstructor, I.apellidoInstructor, I.correoInstructor, I.telefonoInstructor,I.estadoInstructor,I.idUsuarioFK, U.estadoUsuario 
			FROM usuarios AS U 
			JOIN instructores AS I 
			ON U.idUsuario=I.idUsuarioFK 
			WHERE U.NumeroIdentificacion = '".$filtro."'";
			$statement=$conexion->prepare($sql);			
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $rows;

		}
		
		public function cargarAgendaInsFiltroId($filtro){
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql="SELECT U.NumeroIdentificacion, I.nombreInstructor, I.apellidoInstructor,p.fechaInicioPro, p.fechaFinPro, p.idProgramacion 
			FROM programacion p 
			JOIN usuarios U 
			JOIN instructores I
			on p.idUsuarioFK = U.idUsuario 
			and I.idUsuarioFK=U.idUsuario
			where NumeroIdentificacion='".$filtro."' ;";
		 	$statement=$conexion->prepare($sql);			
		 	$statement->execute();
		 	while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
		 	return $rows;

		 }
		 public function metodologias(){
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql="SELECT * FROM metodologia";
		 	$statement=$conexion->prepare($sql);			
		 	$statement->execute();
		 	while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
		 	return $rows;

		 }
		 public function parteCuerpo(){
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql="SELECT * FROM parte_del_cuerpo Where idParteDelCuerpo>=6";
		 	$statement=$conexion->prepare($sql);			
		 	$statement->execute();
		 	while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
		 	return $rows;

		 }
		 public function ejercicios(){
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql="SELECT idEjercicio, nombreEjercicio FROM ejercicios";
		 	$statement=$conexion->prepare($sql);			
		 	$statement->execute();
		 	while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
		 	return $rows;

		 }
		//  public function datosMetodologia(){
		// 	$rows=null;
		// 	$modelo = new Conexion();
		// 	$conexion = $modelo->getConection();
		// 	$sql="SELECT nombreMetodologia FROM metodologias";
		//  	$statement=$conexion->prepare($sql);			
		//  	$statement->execute();
		//  	while ($result=$statement->fetch()) {
		// 		$rows[]=$result;
		// 	}
		//  	return $rows;

		//  }

	}
?>
