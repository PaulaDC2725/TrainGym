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
			WHERE ".$filtroCol." LIKE '%".$valor."%'";
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

	}
?>
