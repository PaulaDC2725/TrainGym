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
			$sql="SELECT count(correoCliente) AS correo from CLIENTES where correoCLiente='".$correoCliente."';";
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
			$sql="SELECT count(telefonoCliente) AS Telefono from CLIENTEs where telefonoCliente='".$telefonoCliente."';";
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
			FROM USUARIOS AS U 
			JOIN CLIENTES AS C 
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
			FROM USUARIOS AS U 
			JOIN CLIENTES AS C 
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
			FROM USUARIOS AS U 
			JOIN CLIENTES AS C 
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
			FROM USUARIOS AS U 
			JOIN CLIENTES AS C 
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
			$sql='UPDATE CLIENTES SET estadoCliente='.$estadoCliente.' WHERE idCliente="'.$idCliente.'";';
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
		// public function cargarAgendaCliFiltroId($filtro){
		// 	$rows=null;
		// 	$modelo = new Conexion();
		// 	$conexion = $modelo->getConection();
		// 	$sql="SELECT c.nombreCliente,u.NumeroIdentificacion,h.horaInicioHorario, h.horaFinHorario, h.semanaDiaHorario from horarios AS h JOIN programacion_horario AS ph JOIN programacion AS p JOIN usuarios AS u JOIN clientes AS c on ph.idHorarioFK = h.idHorario and p.idUsuarioFK = u.idUsuario and ph.idProgramacionFK=p.idProgramacion and c.idUsuarioFK=u.idUsuario where u.NumeroIdentificacion='".$filtro."'";
		// 	$statement=$conexion->prepare($sql);			
		// 	$statement->execute();
		// 	while ($result=$statement->fetch()) {
		// 		$rows[]=$result;
		// 	}
		// 	return $rows;

		// }
		public function borrarCliente($idCliente){
			$rows=null;
                /*$estado=1;*/
                $modelo = new Conexion();
                $conexion = $modelo->getConection();					
                $sql="CALL borrarClientes('".$idCliente."')";
                $statement=$conexion->prepare($sql);			
                $statement->execute();
                while ($result=$statement->fetch()) {
                    $rows[]=$result;
                }
                return $rows;

		}

		public function mostrarAforos(){
			$rows=null;
                /*$estado=1;*/
                $modelo = new Conexion();
                $conexion = $modelo->getConection();					
                $sql="SELECT * FROM Aforos";
                $statement=$conexion->prepare($sql);			
                $statement->execute();
                while ($result=$statement->fetch()) {
                    $rows[]=$result;
                }
                return $rows;

		}
		public function mostrarAforosId($idHorario){
			$rows=null;
                /*$estado=1;*/
                $modelo = new Conexion();
                $conexion = $modelo->getConection();					
                $sql="SELECT * FROM Aforos WHERE idHorario = '".$idHorario."'";
                $statement=$conexion->prepare($sql);			
                $statement->execute();
                while ($result=$statement->fetch()) {
                    $rows[]=$result;
                }
                return $rows;

		}
		public function establecerAforos($aforo, $idHorario){
			$rows=null;
                $modelo = new Conexion();
                $conexion = $modelo->getConection();					
                $sql="UPDATE Horarios set aforoHorario='".$aforo."' where idHorario = '".$idHorario."'";
                $statement=$conexion->prepare($sql);			
                $statement->execute();
                while ($result=$statement->fetch()) {
                    $rows[]=$result;
                }
                return $rows;

		}

	}
?>
