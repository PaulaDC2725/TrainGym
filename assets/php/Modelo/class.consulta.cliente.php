<?php


	class ConsultasClientes{
		public function registrarCliente($nombreCliente, $apellidoCliente, $fechaNacimientoCliente,$correoCliente,$telefonoCliente,$estadoCliente){
			{
                $rows=null;
                $estado=1;
                $modelo = new Conexion();
                $conexion = $modelo->getConection();					
                $sql="CALL registrarCliente('".$nombreCliente."','".$apellidoCliente."','".$fechaNacimientoCliente."','".$correoCliente."','".$telefonoCliente."','".$estadoCliente."')";
                $statement=$conexion->prepare($sql);			
                $statement->execute();
                while ($result=$statement->fetch()) {
                    $rows[]=$result;
                }
                return $rows;
            }
		}
		/**/
	/*
		/**/
		
			public function actualizarCliente($idCliente, $correoCliente, $telefonoCliente){
			$rows=null;
			$estado=1;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();					
			$sql="CALL actualizarCliente('".$idCliente."',
			'".$correoCliente."','".$telefonoCliente."')";
			$statement=$conexion->prepare($sql);			
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $rows;
		}
		public function DuplicidadCorr($correoCliente){
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();					
			$sql="SELECT count(correoCliente) AS correo from clientes where correoCliente='".$correoCliente."';";
			$statement=$conexion->prepare($sql);			
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $rows;
		}
		public function DuplicidadTel($telefonoCliente){
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();					
			$sql="SELECT count(telefonoCliente) AS Telefono from clientes where telefonoCliente='".$telefonoCliente."';";
			$statement=$conexion->prepare($sql);			
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $rows;
		}
		
		public function consultarClientes(){
			$rows=null;
			$estado=1;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();					
			$sql="SELECT C.idCliente,U.NumeroIdentificacion, C.nombreCliente, C.apellidoCliente, C.fechaNacimientoCliente,C.correoCliente,C.estadoCliente,C.telefonoCliente 
			FROM usuarios AS U 
			JOIN clientes AS C 
			ON U.idUsuario=C.idUsuarioFK Where C.estadoCliente = '1'";
			$statement=$conexion->prepare($sql);			
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $rows;
		}
		public function consultarClientesHab(){
			$rows=null;
			$estado=1;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();					
			$sql="SELECT C.idCliente,U.NumeroIdentificacion, C.nombreCliente, C.apellidoCliente, C.fechaNacimientoCliente,C.correoCliente,C.estadoCliente,C.telefonoCliente 
			FROM usuarios AS U 
			JOIN clientes AS C 
			ON U.idUsuario=C.idUsuarioFK Where C.estadoCliente = '0'";
			$statement=$conexion->prepare($sql);			
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $rows;
		}
		public function consultarClientesFiltrados($filtroCol, $valor){
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql="SELECT C.idCliente,U.NumeroIdentificacion, C.nombreCliente, C.apellidoCliente, C.fechaNacimientoCliente,C.correoCliente, C.telefonoCliente 
			FROM usuarios AS U 
			JOIN clientes AS C 
			ON U.idUsuario=C.idUsuarioFK
			WHERE ".$filtroCol." LIKE '%".$valor."%'AND estadoUsuario=1";
			$statement=$conexion->prepare($sql);
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $rows;
		}
		public function consultarClientesFiltrados1($filtroCol, $valor){
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql="SELECT C.idCliente,U.NumeroIdentificacion, C.nombreCliente, C.apellidoCliente, C.fechaNacimientoCliente,C.correoCliente, C.telefonoCliente 
			FROM usuarios AS U 
			JOIN clientes AS C 
			ON U.idUsuario=C.idUsuarioFK
			WHERE ".$filtroCol." LIKE '%".$valor."%'AND estadoUsuario=0";
			$statement=$conexion->prepare($sql);
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $rows;
		}

		public function cambiarEstadoCliente($estadoCliente, $idCliente){	
			$rows=null;		
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql='UPDATE clientes SET estadoCliente='.$estadoCliente.' WHERE idCliente="'.$idCliente.'";';
			$statement=$conexion->prepare($sql);

			if (!$statement) {
			 	return "error al actualizar registro";
			}else{
			 	$statement->execute();
				return $rows;
			}


		}
		public function cargarClientesFiltroId($filtro){
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql="SELECT U.NumeroIdentificacion,C.idCliente,C.nombreCliente,C.apellidoCliente,C.fechaNacimientoCliente,C.estadoCliente,U.estadoUsuario,C.idUsuarioFK,C.correoCliente,C.telefonoCliente  
			FROM clientes C 
			JOIN usuarios U 
			ON C.idUsuarioFK=U.idUsuario 
			WHERE U.NumeroIdentificacion =  '".$filtro."'";
			$statement=$conexion->prepare($sql);			
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $rows;

		}
		public function consultarMetodologia($filtro){
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql="SELECT sm.idMetodologiaFK From suscripcion_metodologia as sm 
			JOIN clientes as c 
			JOIN usuarios as u 
			JOIN suscripciones as s 
			on sm.idsuscripcionFK=s.idSuscripcion 
			and s.idClienteFK=c.idCliente 
			and c.idUsuarioFK=u.idUsuario 
			WHERE u.NumeroIdentificacion =  '".$filtro."'";
			$statement=$conexion->prepare($sql);			
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $rows;

		}
		public function cargarAgendaCliFiltroId($filtro){
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();
			$sql="SELECT p.idProgramacion, c.nombreCliente,u.NumeroIdentificacion,p.fechaInicioPro, p.fechaFinPro from programacion AS p JOIN usuarios AS u JOIN clientes AS c on  p.idUsuarioFK = u.idUsuario and c.idUsuarioFK=u.idUsuario and c.idUsuarioFK=p.idUsuarioFK where u.NumeroIdentificacion='".$filtro."'";
		 	$statement=$conexion->prepare($sql);			
		 	$statement->execute();
		 	while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
		 	return $rows;

		 }
		
		

	}
?>
