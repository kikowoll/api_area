<?php

use function PHPSTORM_META\elementType;

include 'config.php';

class Servidor {

	public function MostrarServidores() {
		$conn = new Conexion();
		$sql = "SELECT * FROM servidores ORDER BY servidor ASC";
		$stm = $conn->prepare($sql);
		$stm->execute();
		return $stm->fetchAll(PDO::FETCH_OBJ);
	}

	public function GetServidorPorId($id) {
		$conn = new Conexion();
		$sql = "SELECT * FROM servidores WHERE id = :id";
		$stm = $conn->prepare($sql);
		$stm->bindValue(":id", $id, PDO::PARAM_STR);
		$stm->execute();
		return $stm->fetchAll(PDO::FETCH_OBJ);
	}

	public function SetHorasServidor($ser,$dia,$entrada,$salida) {
		$conn = new Conexion();
		$sql = "INSERT INTO `servidores_ser`(`servidor`, `dia_servicio`, `hora_entrada`, `hora_salida`) VALUES (:ser,:dia,:hoen,:hosa)";
		$stm = $conn->prepare($sql);
		$stm->bindValue(":ser", $ser, PDO::PARAM_STR);
		$stm->bindValue(":dia", $dia, PDO::PARAM_STR);
		$stm->bindValue(":hoen", $entrada, PDO::PARAM_STR);
		$stm->bindValue(":hosa", $salida, PDO::PARAM_STR);
		if($stm->execute()) {
			return 1;
		} else {
			return 0;
		}
	}

	public function SetServidor($servidor,$correo,$role,$pass) {
		$contra = sha1($pass);
		$conn = new Conexion();
		$sql = "INSERT INTO `servidores`(`ROLE`, `servidor`, `correo`, `pass`) VALUES (:tipo,:servidor,:correo,:pass)";
		$stm = $conn->prepare($sql);
		$stm->bindValue(":tipo", $role);
		$stm->bindValue(":servidor", $servidor);
		$stm->bindValue(":correo", $correo);
		$stm->bindValue(":pass", $contra);
		if($stm->execute()) return 1;
		else return $conn->errorInfo();
	}

	public function UpdateServidor($id,$servidor,$correo,$role) {
		$conn = new Conexion();
		$sql = "UPDATE `servidores` SET `ROLE`=:tipo,`servidor`=:servidor,`correo`=:correo WHERE id = :id";
		$stm = $conn->prepare($sql);
		$stm->bindValue(":id", $id);
		$stm->bindValue(":servidor", $servidor);
		$stm->bindValue(":correo", $correo);
		$stm->bindValue(":tipo", $role);
		if($stm->execute()) return 1;
		else return 0;
	}

	public function UpdatePassword($id,$pass,$new) {
		$contra = sha1($pass);
		$nueva = sha1($new);
		$conn = new Conexion();
		$sql = "SELECT * FROM `servidores` WHERE `id` = :id AND `pass` = :pass";
		$stm = $conn->prepare($sql);
		$stm->bindValue(":id", $id);
		$stm->bindValue(":pass", $contra);
		$stm->execute();
		if($stm->rowCount() > 0) {
			$con = new Conexion();
			$sqll = "UPDATE `servidores` SET `pass` = :pass WHERE `id` = :id";
			$stmm = $con->prepare($sqll);
			$stmm->bindValue(":id", $id);
			$stmm->bindValue(":pass", $nueva);
			if($stmm->execute()) return 1;
			else return 0;
		}
	}

	public function DeleteServidor($id) {
		$conn = new Conexion();
		$stm = $conn->prepare("DELETE FROM servidores WHERE id = :id");
		$stm->bindValue(":id", $id);
		if($stm->execute()) return 1;
		else return 0;
	}

	/**
	 * admin
	 * login
	 */
	public function Login($usu, $pas) {
		$pass = sha1($pas);
		$conn = new Conexion();
		$sql = "SELECT `ROLE`, servidor, correo FROM servidores WHERE correo = :usu AND pass = :pas";
		$stm = $conn->prepare($sql);
		$stm->bindValue(":usu", $usu, PDO::PARAM_STR);
		$stm->bindValue(":pas", $pass, PDO::PARAM_STR);
		$stm->execute();
		$coun = $stm->rowCount();
		$fila = $stm->fetch(PDO::FETCH_OBJ);
		if($coun > 0) {
			return $fila;
		} else {
			return 0;
		}
	}

	/**
	 * llamadas
	 * guardar llamada
	 */
	public function GuardarLlamada($tipo,$conocido,$obser,$formato,$resumen,$grupo1,$grupo2,$hora,$dia,$mes,$servi) {
		$conn = new Conexion();
		$sql = "INSERT INTO `llamadas`(`servidor`, `tipo`, `conocido`, `descripcion`, `relacionada`, `observaciones`, `grupo1`, `grupo2`, `hora`, `dia`, `mes`) VALUES (:servidor,:tipo,:conocido,:descripcion,:relacionada,:observaciones,:grupo1,:grupo2,:hora,:dia,:mes)";
		$stm = $conn->prepare($sql);
		$stm->bindParam(":tipo", $tipo, PDO::PARAM_STR);
		$stm->bindParam(":conocido", $conocido, PDO::PARAM_STR);
		$stm->bindParam(":descripcion", $obser, PDO::PARAM_STR);
		$stm->bindParam(":relacionada", $formato, PDO::PARAM_STR);
		$stm->bindParam(":observaciones", $resumen, PDO::PARAM_STR);
		$stm->bindParam(":grupo1", $grupo1, PDO::PARAM_STR);
		$stm->bindParam(":grupo2", $grupo2, PDO::PARAM_STR);
		$stm->bindParam(":hora", $hora, PDO::PARAM_STR);
		$stm->bindParam(":dia", $dia, PDO::PARAM_STR);
		$stm->bindParam(":mes", $mes, PDO::PARAM_STR);
		$stm->bindParam(":servidor", $servi, PDO::PARAM_STR);
		if($stm->execute()) {
			return 1;
		} else {
			return 0;

		}	
	}

	public function MostrarLlamadasDia($dia,$mes) {
		$conn = new Conexion();
		$sql = "SELECT * FROM llamadas WHERE dia=:dia AND mes=:mes";
		$stm = $conn->prepare($sql);
		$stm->bindValue(":dia", $dia, PDO::PARAM_STR);
		$stm->bindValue(":mes", $mes, PDO::PARAM_STR);
		$stm->execute();
		return $stm->fetchAll(PDO::FETCH_OBJ);
	}

	public function MostrarLlamadasServidor($servi,$dia,$mes) {
		$conn = new Conexion();
		$sql = "SELECT * FROM llamadas WHERE servidor=:servi AND dia=:dia AND mes=:mes";
		$stm = $conn->prepare($sql);
		$stm->bindValue(":servi", $servi, PDO::PARAM_STR);
		$stm->bindValue(":dia", $dia, PDO::PARAM_STR);
		$stm->bindValue(":mes", $mes, PDO::PARAM_STR);
		$stm->execute();
		return $stm->fetchAll(PDO::FETCH_OBJ);
	}
}