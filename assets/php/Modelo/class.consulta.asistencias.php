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