<?php


	class ConsultasUsuario{
		public function registrarRol($idRol,$nombreRol){
			
			$rows=null;
                $modelo = new Conexion();
                $conexion = $modelo->getConection();					
                $sql = "INSERT INTO rol(idRol, nombreRol) VALUES ('".$idRol."','".$nombreRol."')";		

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
			$sql="SELECT count(NumeroIdentificacion) AS Doc from usuarios where NumeroIdentificacion='".$numeroIdentificacion."';";
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
                $sql = "INSERT INTO tipo_identificacion(idTipoDocumento, nombreDocumento) VALUES ('".$idTipoDocumento."','".$nombreDocumento."')";		

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
			 	return $sql;
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
		public function consultarUsuario1($numeroIdentificacion){$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();					
			$sql = "SELECT * FROM usuarios where NumeroIdentificacion='".$numeroIdentificacion."'";
			$statement=$conexion->prepare($sql);			
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $rows;
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

			public function validarLoginUsuario($numeroIdentificacion,
			$passwordUsuario,$rolFK,$estado){
			$rows=null;
			$estado=1;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();					
			$sql="SELECT COUNT(*) AS RESULTADO 
			FROM usuarios 
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
		
		public function validarDatosCorrectos($numeroIdentificacion,$passwordUsuario){
			$rows=null;
			$estado=1;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();					
			$sql="SELECT COUNT(*) AS Correcto 
			FROM usuarios 
			WHERE NumeroIdentificacion='".$numeroIdentificacion."'
			AND passwordUsuario='".$passwordUsuario."'";
			$statement=$conexion->prepare($sql);			
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $rows;
		}
		public function validarExistencia($numeroIdentificacion){
			$rows=null;
			$estado=1;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();					
			$sql="SELECT COUNT(*) AS Cantidad 
			FROM usuarios 
			WHERE NumeroIdentificacion='".$numeroIdentificacion."'";
			$statement=$conexion->prepare($sql);			
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $rows;
		}
		
		public function validarLogin2($numeroIdentificacion){
			$rows=null;
			$estado=1;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();					
			$sql="CALL validar_login2('".$numeroIdentificacion."')";
			$statement=$conexion->prepare($sql);			
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $rows;
		}
		public function validarLogin3($numeroIdentificacion){
			$rows=null;
			$estado=1;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();					
			$sql="SELECT estadoUsuario FROM usuarios where NumeroIdentificacion='".$numeroIdentificacion."'";
			$statement=$conexion->prepare($sql);			
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $rows;
		}
		
		public function actualizarUsuario($numeroIdentificacion, $idUsuario){	
			$rows=null;		
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql='UPDATE usuarios SET NumeroIdentificacion='.$numeroIdentificacion.' WHERE idUsuario="'.$idUsuario.'";';
			$statement=$conexion->prepare($sql);

			if (!$statement) {
			 	return "error al actualizar estado";
			}else{
			 	$statement->execute();
				return $rows;
			}


		}
		public function actualizarContra($passwordUsuario, $idUsuario){	
			$rows=null;		
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql="UPDATE usuarios SET passwordUsuario='".$passwordUsuario."' WHERE idUsuario='".$idUsuario."';";
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
			$sql='UPDATE usuarios SET estadoUsuario='.$estadoUsuario.' WHERE idUsuario="'.$idUsuario.'";';
			$statement=$conexion->prepare($sql);

			if (!$statement) {
			 	return "error al actualizar estado";
			}else{
			 	$statement->execute();
				return $rows;
			}
		}

		public function consultarUltimoUsuario(){	
			$rows=null;		
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql='SELECT MAX(NumeroIdentificacion) AS "Ultimo"  FROM usuarios ;';
			$statement=$conexion->prepare($sql);
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $rows;
		}

		public function consultarUltimoCorreo($Ultimo){	
			$rows=null;		
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql='SELECT C.correoCliente  FROM clientes AS C JOIN usuarios AS U ON U.idUsuario=C.idUsuarioFK WHERE U.NumeroIdentificacion="'.$Ultimo.'" ;';
			$statement=$conexion->prepare($sql);

			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $rows;
		}
		

	}
?>
