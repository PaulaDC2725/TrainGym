	<?php

	class ConsultasAsistencias {	
		
		public function registrarAsistenciaCli($horaIngreso, $horaSalida){
			{
                $rows=null;
                $estado=1;
                $modelo = new Conexion();
                $conexion = $modelo->getConection();					
                $sql="CALL registrarAsistenciaCliente('".$horaIngreso."','".$horaSalida."')";
                $statement=$conexion->prepare($sql);

                if (!$statement) {
					return "error al crear registro";			 	
				}else{
					$statement->execute();	
					return $rows;
		}
            }
		}

		public function mostrarAsistencias(){
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();					
			$sql = "call consultarAsistenciaCliente()";
			$statement=$conexion->prepare($sql);		
        $statement->execute();
        while ($result=$statement->fetch()) {
            $rows[]=$result;
        }
        return $rows;
	}
	public function consultarAsistenciasFiltradas($filtroCol, $valor){
		$rows=null;
		$modelo = new Conexion();
		$conexion = $modelo->getConection();
		$sql="SELECT u.numeroIdentificacion, CONCAT(c.nombreCliente ,' ', c.apellidoCliente) AS 'Nombre Completo', a.fechaHoraIngreso, a.fechaHoraSalida 
		FROM PROGRAMACION AS p 
		JOIN USUARIOS AS  u 
		JOIN CLIENTES AS c 
		JOIN ASISTENCIAS AS a
		ON  u.idUsuario=p.idUsuarioFK 
		AND u.idUsuario=c.idUsuarioFK
		WHERE ".$filtroCol." LIKE '%".$valor."%'";
		$statement=$conexion->prepare($sql);
		$statement->execute();
		while ($result=$statement->fetch()) {
			$rows[]=$result;
		}
		return $rows;
	}

	public function registrarProgramacion($fechaInicioPro,$fechaFinPro,$numid){
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();					
			$sql = "call registrarProgramacion('".$fechaInicioPro."','".$fechaFinPro."','".$numid."')";
			$statement=$conexion->prepare($sql);		
        $statement->execute();
        while ($result=$statement->fetch()) {
            $rows[]=$result;
        }
        return $rows;
	}

	public function registrarAsistencia($fechaAsistencia){
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();					
			$sql = "call registrarAsistencia('".$fechaAsistencia."')";
			$statement=$conexion->prepare($sql);		
        $statement->execute();
        while ($result=$statement->fetch()) {
            $rows[]=$result;
        }
        return $rows;
	}

	}

?>