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
			$sql="SELECT count(correoinstructor) AS correo from INSTRUCTORES where correoinstructor='".$correoInstructor."';";
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
			$sql="SELECT count(telefonoInstructor) AS Telefono from INSTRUCTORES where telefonoInstructor='".$telefonoInstructor."';";
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
			FROM USUARIOS AS U 
			JOIN INSTRUCTORES AS I 
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
			FROM USUARIOS AS U 
			JOIN INSTRUCTORES AS I
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
			FROM USUARIOS AS U 
			JOIN INSTRUCTORES AS I
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
			$sql='UPDATE INSTRUCTORES SET estadoInstructor='.$estadoInstructor.' WHERE idInstructor="'.$idInstructor.'";';
			$statement=$conexion->prepare($sql);

			if (!$statement) {
			 	return "error al actualizar registro";
			}else{
			 	$statement->execute();
				return $rows;
			}


		}
		public function borrarInstructor($idInstructor){
			$rows=null;
                /*$estado=1;*/
                $modelo = new Conexion();
                $conexion = $modelo->getConection();					
                $sql="CALL borrarInstructor('".$idInstructor."')";
                $statement=$conexion->prepare($sql);			
                $statement->execute();
                while ($result=$statement->fetch()) {
                    $rows[]=$result;
                }
                return $rows;

		}
		
		public function cargarInstructorFiltroId($filtro){
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql="SELECT I.idInstructor,U.NumeroIdentificacion, I.nombreInstructor, I.apellidoInstructor, I.correoInstructor, I.telefonoInstructor,I.estadoInstructor,I.idUsuarioFK, U.estadoUsuario 
			FROM USUARIOS AS U 
			JOIN INSTRUCTORES AS I 
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
			$sql="SELECT p.idProgramacion, i.nombreInstructor,u.NumeroIdentificacion,p.fechaInicioPro, p.fechaFinPro
			from programacion AS p 
			JOIN usuarios AS u 
			JOIN instructores AS i 
			on  p.idUsuarioFK = u.idUsuario 
			and i.idUsuarioFK=u.idUsuario 
			and i.idUsuarioFK=p.idUsuarioFK 
			where u.NumeroIdentificacion='".$filtro."'";
		 	$statement=$conexion->prepare($sql);			
		 	$statement->execute();
		 	while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
		 	return $rows;

		 }

	}
?>
