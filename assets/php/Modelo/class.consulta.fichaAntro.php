<?php
 class consultasFicha{
	public function registrarFichaAntro($fechaFicha, $EstaturaCliente, $pesoCliente,$descripcionFicha)
    {
        $rows=null;
        $modelo = new Conexion();
        $conexion = $modelo->getConection();					
        $sql = "INSERT INTO ficha_antropometrica(idFicha, fechaFicha, EstaturaCliente, pesoCliente, descripcionFicha, idSuscripcionFK) SELECT MAX(idFicha) + 1,'".$fechaFicha."','".$EstaturaCliente."','".$pesoCliente."','".$descripcionFicha."',(SELECT MAX(idSuscripcion)FROM SUSCRIPCIONES) FROM ficha_antropometrica";
        $statement=$conexion->prepare($sql);

    if (!$statement) {
         return "error al crear registro";			 	
     }else{
         $statement->execute();	
         return $rows;
     }

}
public function registrarFichaAntroNueva($fechaFicha, $EstaturaCliente, $pesoCliente,$descripcionFicha,$idSuscripcion)
    {
        $rows=null;
        $modelo = new Conexion();
        $conexion = $modelo->getConection();					
        $sql = "INSERT INTO ficha_antropometrica(idFicha, fechaFicha, EstaturaCliente, pesoCliente, descripcionFicha, idSuscripcionFK) SELECT MAX(idFicha) + 1,'".$fechaFicha."','".$EstaturaCliente."','".$pesoCliente."','".$descripcionFicha."','".$idSuscripcion."' FROM ficha_antropometrica";
        $statement=$conexion->prepare($sql);

    if (!$statement) {
         return "error al crear registro";			 	
     }else{
         $statement->execute();	
         return $sql;
     }

}
public function registrarParteCuerpo($nombreParteCuerpo)
    {
        $rows=null;
        $modelo = new Conexion();
        $conexion = $modelo->getConection();					
        $sql = "INSERT INTO parte_del_cuerpo(idParteDelCuerpo, nombreParteCuerpo) SELECT MAX(idParteDelCuerpo) + 1,'".$nombreParteCuerpo."' FROM parte_del_cuerpo";
        $statement=$conexion->prepare($sql);

    if (!$statement) {
         return "error al crear registro";			 	
     }else{
         $statement->execute();	
         return $rows;
     }
    }
    public function registrarFichaMedida($idParteDelCuerpoFK, $medida)
    {
        $rows=null;
        $modelo = new Conexion();
        $conexion = $modelo->getConection();					
        $sql = " INSERT INTO parte_cuerpo_ejercicio(idFichaFK, idParteDelCuerpoFK, medida) Values ((SELECT MAX(idFicha) FROM ficha_antropometrica),'".$idParteDelCuerpoFK."','".$medida."')";
        $statement=$conexion->prepare($sql);			
        $statement->execute();
        while ($result=$statement->fetch()) {
            $rows[]=$result;
        }
        return $sql;

    }
    public function consultarFichaAntro1($filtro)
    {$rows=null;
        $modelo = new Conexion();
        $conexion = $modelo->getConection();
        $sql="SELECT FA.idFicha,U.NumeroIdentificacion,C.nombreCliente,C.apellidoCliente,FA.fechaFicha, PC.nombreParteCuerpo,PCE.medida,FA.descripcionFicha
        FROM clientes C 
        JOIN ficha_antropometrica FA 
        JOIN usuarios U 
        Join parte_del_cuerpo PC 
        Join parte_cuerpo_ejercicio PCE 
        JOIN suscripciones S 
        ON C.idUsuarioFK=U.idUsuario 
        and PCE.idParteDelCuerpoFK=PC.idParteDelCuerpo 
        and PCE.idFichaFK=FA.idFicha 
        and FA.idSuscripcionFK=S.idSuscripcion 
        and S.idClienteFK = C.idCliente 
        WHERE U.NumeroIdentificacion = '".$filtro."'";
        $statement=$conexion->prepare($sql);			
        $statement->execute();
        while ($result=$statement->fetch()) {
            $rows[]=$result;
        }
        return $rows;

    }
 }
?>