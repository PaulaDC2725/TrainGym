<?php


	class ConsultasUsuario{
		public function registrarRol($idRol,$nombreRol){
			
			$rows=null;
                $modelo = new Conexion();
                $conexion = $modelo->getConection();					
                $sql = "INSERT INTO ROL(idRol, nombreRol) VALUES ('".$idRol."','".$nombreRol."')";		

				$statement=$conexion->prepare($sql);

			if (!$statement) {
			 	return "error al crear registro";			 	
			 }else{
			 	$statement->execute();	
			 	return $rows;
			 }
		}
		public function DuplicidadDoc($numeroIdentificacion){
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();					
			$sql="SELECT count(NumeroIdentificacion) AS Doc from USUARIOS where NumeroIdentificacion='".$numeroIdentificacion."';";
			$statement=$conexion->prepare($sql);			
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $rows;
		}
		public function registrarTipoDocumento($idTipoDocumento,$nombreDocumento){
			
			$rows=null;
                $modelo = new Conexion();
                $conexion = $modelo->getConection();					
                $sql = "INSERT INTO TIPO_IDENTIFICACION(idTipoDocumento, nombreDocumento) VALUES ('".$idTipoDocumento."','".$nombreDocumento."')";		

				$statement=$conexion->prepare($sql);

			if (!$statement) {
			 	return "error al crear registro";			 	
			 }else{
			 	$statement->execute();	
			 	return $rows;
			 }
		}
		public function registrarUsuario($numeroIdentificacion, $passwordUsuario, $estadoUsuario,$idRolFK,$idTipoDocumentoFK)
			{
                $rows=null;
                $modelo = new Conexion();
                $conexion = $modelo->getConection();					
                $sql = "CALL registrarUsuario('".$numeroIdentificacion."','".$passwordUsuario."','".$estadoUsuario."','".$idRolFK."','".$idTipoDocumentoFK."')";

				$statement=$conexion->prepare($sql);

			if (!$statement) {
			 	return "error al crear registro";			 	
			 }else{
			 	$statement->execute();	
			 	return $rows;
			 }
		}
		public function consultarUsuario(){$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();					
			$sql = "CALL consultarUsuario()";

			$statement=$conexion->prepare($sql);

		if (!$statement) {
			 return "error al crear registro";			 	
		 }else{
			 $statement->execute();	
			 return $rows;
		 }
		}
		/*public function registrarUsuario($idUsuario,$numeroIdentificacion, $passwordUsuario, $estadoUsuario,$idRolFK,$idTipoDocumentoFK){
			{
                $rows=null;
                $estado=1;
                $modelo = new Conexion();
                $conexion = $modelo->getConection();					
                $sql="CALL registrarUsuario('".$idUsuario."','".$numeroIdentificacion."'
                '".$passwordUsuario."',".$estado.",'".$rolFK."','".$idTipoDocumentoFK"')";
                $statement=$conexion->prepare($sql);			
                $statement->execute();
                while ($result=$statement->fetch()) {
                    $rows[]=$result;
                }
                return $rows;
            }
*/
public function validarUsuario($numeroIdentificacion){
			$rows=null;
			$estado=1;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();					
			$sql="SELECT COUNT(*) AS RESULTADO 
			FROM USUARIOS 
			WHERE NumeroIdentificacion='".$numeroIdentificacion."'";
			$statement=$conexion->prepare($sql);			
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $rows;
		}
			public function validarLoginUsuario($numeroIdentificacion,
			$passwordUsuario,$rolFK,$estado){
			$rows=null;
			$estado=1;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();					
			$sql="SELECT COUNT(*) AS RESULTADO 
			FROM USUARIOS 
			WHERE NumeroIdentificacion='".$numeroIdentificacion."' 
			AND passwordUsuario='".$passwordUsuario."' 
			AND idRolFK='".$rolFK."' 
			AND estadoUsuario=".$estado."";
			$statement=$conexion->prepare($sql);			
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $rows;
		}
		// public function validarLoginUsuario($numeroIdentificacion,
		// 	$passwordUsuario,$rolFK,$estado){
		// 	$rows=null;
		// 	$estado=1;
		// 	$modelo = new Conexion();
		// 	$conexion = $modelo->getConection();					
		// 	$sql="CALL validar_login('".$numeroIdentificacion."',
		// 	'".$passwordUsuario."','".$rolFK."',".$estado.")";
		// 	$statement=$conexion->prepare($sql);			
		// 	$statement->execute();
		// 	while ($result=$statement->fetch()) {
		// 		$rows[]=$result;
		// 	}
		// 	return $rows;
		// }
		
		public function validarLogin2($numeroIdentificacion){
			$rows=null;
			$estado=1;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();					
			$sql="CALL validar_Login2('".$numeroIdentificacion."')";
			$statement=$conexion->prepare($sql);			
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $rows;
		}
		
	

		public function cambiarEstadoUsuario($estadoUsuario, $idUsuario){	
			$rows=null;		
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql='UPDATE USUARIOS SET estadoUsuario='.$estadoUsuario.' WHERE idUsuario="'.$idUsuario.'";';
			$statement=$conexion->prepare($sql);

			if (!$statement) {
			 	return "error al actualizar estado";
			}else{
			 	$statement->execute();
				return $rows;
			}


		}
		public function borrarUsuario($idUsuario){
			$rows=null;
                /*$estado=1;*/
                $modelo = new Conexion();
                $conexion = $modelo->getConection();					
                $sql="CALL borrarUsuario('".$idUsuario."','".$numeroIdentificacion."',
                '".$passwordUsuario."',".$estado.",'".$rolFK."','.$idTipoDocumentoFK')";
                $statement=$conexion->prepare($sql);			
                $statement->execute();
                while ($result=$statement->fetch()) {
                    $rows[]=$result;
                }
                return $rows;

		}

	}
?>
