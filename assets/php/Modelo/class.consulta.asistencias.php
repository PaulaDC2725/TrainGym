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
			$sql = "select * From consultarasistenciacliente;";
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
		$sql="SELECT u.NumeroIdentificacion, CONCAT(c.nombreCliente ,' ', c.apellidoCliente) AS 'Nombre Completo', a.fechaHoraIngreso, a.fechaHoraSalida 
		FROM asistencias AS a
		JOIN programacion AS p
		JOIN usuarios AS  u 
		JOIN clientes AS c 
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
	$sql="SELECT u.NumeroIdentificacion, CONCAT(i.nombreInstructor ,' ', i.apellidoInstructor) AS 'Nombre Completo', a.fechaHoraIngreso, a.fechaHoraSalida 
	FROM asistencias AS a
	JOIN programacion AS p
	JOIN usuarios AS  u 
	JOIN instructores AS i 
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
        return $sql;
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
	public function registrarAsistencia($idProgramacion,$fechaHoraIngreso,$fechaHoraSalida,$numid){
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();					
			$sql = "INSERT INTO asistencias SELECT MAX(idAsistencia) + 1,'".$fechaHoraIngreso."','".$fechaHoraSalida."','".$idProgramacion."' FROM asistencias";
			$statement=$conexion->prepare($sql);
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rows[]=$result;
			}
			return $sql;
		}

	}

?>