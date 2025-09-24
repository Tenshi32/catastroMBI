<?php
	require_once "basedata2.php";
class ModeloMoneda extends baseData {

	public function VerDolarModelo() {

		$sql= baseData::conexion()->prepare("SELECT * FROM tasa_moneda 
		INNER JOIN tipo_moneda ON tasa_moneda.id_moneda = tipo_moneda.id_tipo_moneda 
		WHERE estado_moneda = 1");
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_ASSOC);

		if (!empty($row)) {
		

			echo '
			
			<div class="inner">
            	<h5 class="m-4"> Actualmente <strong> 1 </strong> '.$row["codigo"].' ('.$row["tipo_moneda"].') = '.$_SESSION["euro"].'Bs. 
                Desea cambiar la taza actual ? </h5>
            </div>';

		} else {

			echo 'Actualmente 1'.$row["codigo"].'= .Bs';

			echo "Actualmente no hay Registrado ninguna tasa del dolar";
		} 
	} 

	/* registrar cliente*/
	public static function InsertarDolarModelo($datos) {

		$sql = baseData::conexion()->prepare("UPDATE tasa_moneda SET estado_moneda = :estado_moneda WHERE estado_moneda = 1");
		$sql->bindParam(":estado_moneda",$datos['cambio']);

		if ($sql->execute()) {

			$sql= baseData::conexion()->prepare("INSERT INTO tasa_moneda (fecha, valor, estado_moneda) 
			VALUES(:fecha, :valor, :estado_moneda)");
			$sql->bindParam(":fecha",$datos['fecha']);
			$sql->bindParam(":valor",$datos['valor']);
			$sql->bindParam(":estado_moneda",$datos['estado']);
		
			if ($sql->execute()) {

				return true;

			} else {

				return false;
			} 

		} else {

			return false;
		} 
	}

} 