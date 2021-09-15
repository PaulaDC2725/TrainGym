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
	public function registrarPagos($fechaPago,$valorPago,$descripcion,$soporte,$idSuscripcion)
	{
		$rows=null;
		$modelo = new Conexion();
		$conexion = $modelo->getConection();					
		$sql = "CALL registrarPagos('".$fechaPago."','".$valorPago."','".$descripcion."','".$soporte."','".$idSuscripcion."')";
		$statement=$conexion->prepare($sql);

	if (!$statement) {
		 return "error al crear registro";			 	
	 }else{
		 $statement->execute();	
		 return $rows;
	 }
}
public function cargarPagoCliFiltroId($filtro){
	$rows=null;
	$modelo = new Conexion();
	$conexion = $modelo->getConection();
	$sql="SELECT u.NumeroIdentificacion,p.fechaPago,p.descripcionPago,p.urlSoportePago,m.nombreMetodologia,CONCAT(c.nombreCliente ,' ', c.apellidoCliente) AS 'Nombre Completo',s.valorSuscripcion from suscripciones as s join usuarios as u join clientes as c join metodologia as m join pagos as p on s.idClienteFK =c.idCliente and c.idUsuarioFK=u.idUsuario and s.idMetodologiaFK=m.idMetodologia and p.idSuscripcionFK=s.idSuscripcion WHERE u.NumeroIdentificacion='".$filtro."'";
	 $statement=$conexion->prepare($sql);			
	 $statement->execute();
	 while ($result=$statement->fetch()) {
		$rows[]=$result;
	}
	 return $rows;

 }
	public function cargarSuscripcionFiltroId($filtro){
		$rows=null;
		$modelo = new Conexion();
		$conexion = $modelo->getConection();
		$sql="SELECT s.idSuscripcion,m.nombreMetodologia,CONCAT(c.nombreCliente ,' ', c.apellidoCliente) AS 'Nombre Completo',s.valorSuscripcion,s.fechaSuscripcion from suscripciones as s join usuarios as u join clientes as c join metodologia as m on s.idClienteFK =c.idCliente and c.idUsuarioFK=u.idUsuario and s.idMetodologiaFK=m.idMetodologia WHERE u.NumeroIdentificacion='".$filtro."'";
		 $statement=$conexion->prepare($sql);			
		 $statement->execute();
		 while ($result=$statement->fetch()) {
			$rows[]=$result;
		}
		 return $rows;

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