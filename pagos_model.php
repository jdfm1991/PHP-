<?php
require_once("connection/connection.php");

class Payments extends Conectar{

    public function getdata(){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();

        //QUERY

            $sql="SELECT * FROM Movimientos";

        
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        

    }

    
    public function savepayments($fecha,$tipop,$descp,$refer,$flag,$monto,$tasa){

        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION
        //CUANDO ES APPWEB ES CONEXION.
		$conectar= parent::conexion();
		parent::set_names();

 		//QUERY

			$sql="INSERT INTO Movimientos (FechaMov,TipoMov, DescripMov, RefMov, FlagMov, MontoMov, TasaDia) VALUES (?, ?, ?, ?, ?, ?, ?)";

		//PREPARACION DE LA CONSULTA PARA EJECUTARLA.
		$sql = $conectar->prepare($sql);
        $sql->bindValue(1, $fecha);
        $sql->bindValue(2, $tipop);
        $sql->bindValue(3, $descp);
        $sql->bindValue(4, $refer);
        $sql->bindValue(5, $flag);
        $sql->bindValue(6, $monto);
        $sql->bindValue(7, $tasa);


		return $sql->execute();

	}

}



