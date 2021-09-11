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
		FROM ASISTENCIAS AS a
		JOIN PROGRAMACION AS p
		JOIN USUARIOS AS  u 
		JOIN CLIENTES AS c 
		ON  p.idProgramacion=a.idProgramacionFK
		AND u.idUsuario=p.idUsuarioFK 
		AND u.idUsuario=c.idUsuarioFK 
		WHERE ".$filtroCol." like '%".$valor."%' AND c.idUsuarioFK=p.idUsuarioFK;";
		$statement=$conexion->prepare($sql);
		$statement->execute();
		while ($result=$statement->fetch()) {
			$rows[]=$result;
		}
		return $rows;
	}
	public function mostrarAsistenciasIns(){
		$rows=null;
		$modelo = new Conexion();
		$conexion = $modelo->getConection();					
		$sql = "call consultarAsistenciaInstructor()";
		$statement=$conexion->prepare($sql);		
	$statement->execute();
	while ($result=$statement->fetch()) {
		$rows[]=$result;
	}
	return $rows;
}
public function consultarAsistenciasFiltradasIns($filtroCol, $valor){
	$rows=null;
	$modelo = new Conexion();
	$conexion = $modelo->getConection();
	$sql="SELECT u.numeroIdentificacion, CONCAT(i.nombreInstructor ,' ', i.apellidoInstructor) AS 'Nombre Completo', a.fechaHoraIngreso, a.fechaHoraSalida 
	FROM ASISTENCIAS AS a
	JOIN PROGRAMACION AS p
	JOIN USUARIOS AS  u 
	JOIN INSTRUCTORES AS i 
	ON  p.idProgramacion=a.idProgramacionFK
	AND u.idUsuario=p.idUsuarioFK 
	AND u.idUsuario=i.idUsuarioFK 
	WHERE ".$filtroCol." like '%".$valor."%' AND i.idUsuarioFK=p.idUsuarioFK;";
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
	public function consultaridAsistencia($numid){
		$rows=null;
		$modelo = new Conexion();
		$conexion = $modelo->getConection();					
		$sql = "SELECT max(idAsistencia) + 1 as idAsistencia from asistencias";
		$statement=$conexion->prepare($sql);
	$statement->execute();
	while ($result=$statement->fetch()) {
		$rows[]=$result;
	}
	return $rows;
}	
	public function consultaridProgramacion($numid){
		$rows=null;
		$modelo = new Conexion();
		$conexion = $modelo->getConection();					
		$sql = "SELECT max(idProgramacion) as idProgramacion from programacion as p join usuarios as u 
		on p.idUsuarioFK = u.idUsuario where u.NumeroIdentificacion='".$numid."'";
		$statement=$conexion->prepare($sql);
		$statement->execute();
		while ($result=$statement->fetch()) {
			$rows[]=$result;
		}
		return $rows;
	}
	public function registrarAsistencia($idAsistencia,$idProgramacion,$fechaHoraIngreso,$fechaHoraSalida,$numid){
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();					
			$sql = "INSERT INTO ASISTENCIAS(idAsistencia,fechaHoraIngreso,fechaHoraSalida,idProgramacionFK) 
			values ('".$idAsistencia."','".$fechaHoraIngreso."','".$fechaHoraSalida."','".$idProgramacion."');";
			$statement=$conexion->prepare($sql);
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $rows;
		}

	}

?>