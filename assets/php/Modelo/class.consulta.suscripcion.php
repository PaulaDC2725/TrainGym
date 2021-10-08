<?php
class ConsultasSuscripcion{

    public function registrarSuscripcion($valorSuscripcion, $fechaSuscripcion, $estadoSuscripcion)
		{
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();					
			$sql = "INSERT INTO SUSCRIPCIONES(idSuscripcion, valorSuscripcion, fechaSuscripcion, estadoSuscripcion, idClienteFK) SELECT MAX(idSuscripcion) + 1,'".$valorSuscripcion."','".$fechaSuscripcion."','".$estadoSuscripcion."',(SELECT MAX(idCliente)FROM CLIENTES) FROM SUSCRIPCIONES";
			$statement=$conexion->prepare($sql);

		if (!$statement) {
			 return "error al crear registro";			 	
		 }else{
			 $statement->execute();	
			 return $rows;
		 }
	}
	public function ConsultarCantidadPagosCli()
		{
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();					
			$sql = "SELECT CantidadPagosCliente() as 'Cantidad de los clientes que han pagado'";
			$statement=$conexion->prepare($sql);			
	 $statement->execute();
	 while ($result=$statement->fetch()) {
		$rows[]=$result;
	}
	 return $rows;

 }
	public function ConsultarPorcentajePagosCli()
		{
			$rows=null;
			$modelo = new Conexion();
			$conexion = $modelo->getConection();					
			$sql = "SELECT PorcentajePagosCliente() AS 'Porcentaje de los pagos'";
			$statement=$conexion->prepare($sql);			
	 $statement->execute();
	 while ($result=$statement->fetch()) {
		$rows[]=$result;
	}
	 return $rows;

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
	$sql="SELECT U.NumeroIdentificacion,CONCAT(C.nombreCliente ,' ', C.apellidoCliente) AS 'Nombre Completo',
	M.nombreMetodologia,p.urlSoportePago, p.fechaPago,p.valorPago,p.descripcionPago,SM.fechaMetodologiaInicio, SM.fechaMetodologiaFin FROM USUARIOS AS U
   JOIN CLIENTES AS C 
   ON U.idUsuario=C.idUsuarioFK
   JOIN SUSCRIPCIONES AS S 
   JOIN PAGOS AS p
   ON S.idSuscripcion=p.idSuscripcionFK
   ON C.idCliente=S.idClienteFK
   JOIN SUSCRIPCION_METODOLOGIA AS SM
   ON S.idSuscripcion=SM.idSuscripcionFK
   JOIN METODOLOGIA AS M
   ON SM.idMetodologiaFK=M.idMetodologia
    WHERE u.NumeroIdentificacion='".$filtro."'";
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
		$sql="SELECT s.idSuscripcion,m.nombreMetodologia,CONCAT(c.nombreCliente ,' ', c.apellidoCliente) AS 'Nombre Completo',s.valorSuscripcion,s.fechaSuscripcion from suscripciones as s join usuarios as u join clientes as c join metodologia as m  join suscripcion_metodologia as sm  on s.idClienteFK =c.idCliente and c.idUsuarioFK=u.idUsuario and sm.idMetodologiaFK=m.idMetodologia WHERE u.NumeroIdentificacion='".$filtro."'";
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