<?php
class ConsultasSuscripcion{

    public function registrarSuscripcion($valorSuscripcion, $fechaSuscripcion, $estadoSuscripcion,$idMetodologiaFK)
		{
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();					
			$sql = "INSERT INTO SUSCRIPCIONES(idSuscripcion, valorSuscripcion, fechaSuscripcion, estadoSuscripcion, idClienteFK, idMetodologiaFK) SELECT MAX(idSuscripcion) + 1,'".$valorSuscripcion."','".$fechaSuscripcion."','".$estadoSuscripcion."',(SELECT MAX(idCliente)FROM CLIENTES),'".$idMetodologiaFK."' FROM SUSCRIPCIONES";
			$statement=$conexion->prepare($sql);

		if (!$statement) {
			 return "error al crear registro";			 	
		 }else{
			 $statement->execute();	
			 return $rows;
		 }
	}


	public function mostrarSuscripcion($numeroIdentificacion)
		{
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();					
			$sql = "call consultarSuscripcion('".$numeroIdentificacion."')";
			$statement=$conexion->prepare($sql);

		$statement=$conexion->prepare($sql);			
        $statement->execute();
        while ($result=$statement->fetch()) {
            $rows[]=$result;
        }
        return $rows;
	}

}
?>