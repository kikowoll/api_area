<?php

include 'config.php';

class Telefono 
{
    public function GetTelefono($tabla) { // mostrar contenido tabla mes o fijos
        $conn = new Conexion();
        $sql = "SELECT * FROM $tabla";
        $stm  = $conn->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    public function GetTelefonoPorDia($tabla, $id) { // mostrar contenido de un dia tabla mes o fijos
        $conn = new Conexion();
        $sql = "SELECT * FROM $tabla WHERE id = :id";
        $stm  = $conn->prepare($sql);
        $stm->bindParam(":id", $id, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    public function SetTelefonoPorDia($tabla, $id, $hora1, $hora2, $hora3, $hora4, $hora5) { // guardar contenido de un dia tabla mes o fijos
        $conn = new Conexion();
        $sql = "UPDATE $tabla SET hora1=:hora1, hora2=:hora2, hora3=:hora3, hora4=:hora4, hora5=:hora5 WHERE id = :id";
        $stm  = $conn->prepare($sql);
        $stm->bindParam(":hora1", $hora1, PDO::PARAM_STR);
        $stm->bindParam(":hora2", $hora2, PDO::PARAM_STR);
        $stm->bindParam(":hora3", $hora3, PDO::PARAM_STR);
        $stm->bindParam(":hora4", $hora4, PDO::PARAM_STR);
        $stm->bindParam(":hora5", $hora5, PDO::PARAM_STR);
        $stm->bindParam(":id", $id, PDO::PARAM_INT);
        if($stm->execute()) return 1;
        else return 0;
        
    }

    public function SetMesNuevo($mes, $ano) {
       try {
        $obtener_dias_mes = date('t', strtotime($mes . '/01/' . $ano)); // obtiene el numero de dias que tiene el mes
        $obtener_dia_semana = date('N', strtotime($mes . '/01/' . $ano)); // obtiene el numero en que empieza el mes por dia semana
        $meses = array('','enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre');
        $nombre_tabla = $meses[$mes] . '_' . $ano;
        $dias_semana = [
            [1,2,3,4,5,6,7],
            [8,9,10,11,12,13,14],
            [15,16,17,18,19,20,21],
            [22,23,24,25,26,27,28],
            [29,30,31,32,33,34,35]
        ];
        // cambiamos el dias_semanas a la posicion correspondiente a cada mes
        if($obtener_dia_semana > 1) {
            for($i=1; $i<$obtener_dia_semana; $i++) {
                for($j=0; $j<5; $j++) {
                    array_push($dias_semana[$j], array_shift($dias_semana[$j]));
                }
            }
        }
        // une el array dias_semana
        $lista = array_merge($dias_semana[0],$dias_semana[1],$dias_semana[2],$dias_semana[3],$dias_semana[4]);
        $total_dias = 35 - $obtener_dias_mes;
        // elimina los dias sobrantes
        for($i=0; $i<$total_dias; $i++) {
            array_pop($lista);
        }
        sleep(1);

        $conn = new Conexion();
        $sql = "CREATE TABLE IF NOT EXISTS $nombre_tabla (
            id INT NOT NULL,
            semana INT NOT NULL,
            dia_semana VARCHAR(100) NOT NULL,
            dia INT AUTO_INCREMENT PRIMARY KEY,
            hora1 VARCHAR(100) NOT NULL,
            hora2 VARCHAR(100) NOT NULL,
            hora3 VARCHAR(100) NOT NULL,
            hora4 VARCHAR(100) NOT NULL,
            hora5 VARCHAR(100) NOT NULL
        )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci";
        $stm = $conn->prepare($sql);

        if($stm->execute()) {
            sleep(1);
            $con = new Conexion();
            foreach ($lista as $item) {
                $stmm = $con->prepare("INSERT INTO $nombre_tabla SELECT * FROM fijos WHERE id = :idd");
                $stmm->bindValue(":idd", $item);
                $stmm->execute();
            }
            return 1;
        } else return 0;
       } catch (PDOException $e) {
            return $e->getMessage();
       }
        
    }

    public function DeleteTabla($mes, $ano) {
        $meses = array('','enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre');
        $tabla = $meses[$mes] . '_' . $ano;
        $conn = new Conexion();
        $stm = $conn->prepare("DROP TABLE IF EXISTS $tabla");
        if($stm->execute()) return 1;
        else return 0;
    }

    /**
     * servidores
     */
    public function GetServidores() {
        
    }

}