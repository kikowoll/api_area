<?php

include 'config.php';

class Reportes {

    public function GetLlmamadas($fecha) {
        $conn = new Conexion();
        $stm = $conn->prepare("SELECT * FROM llamadas WHERE mes = :mes");
        $stm->bindValue(":mes", $fecha);
        $stm->execute();
        return $stm->fetchAll();
    }
}



