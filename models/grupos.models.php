<?php

include 'config.php';

class Grupos
{

    public function GetGrupos()
    { // mostrar todos los grupos
        $conn = new Conexion();
        $sql = "SELECT * FROM grupos ORDER BY grupo ASC";
        $stm = $conn->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    public function GetGruposPorId($id)
    { // muestra el grupo con el ID
        $conn = new Conexion();
        $sql = "SELECT * FROM grupos WHERE id = :id";
        $stm = $conn->prepare($sql);
        $stm->bindValue(":id", $id);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    public function GetGruposPorZona($zona)
    { // muestra los grupos de la zona
        $conn = new Conexion();
        $sql = "SELECT * FROM grupos WHERE zona = :zona ORDER BY grupo ASC";
        $stm = $conn->prepare($sql);
        $stm->bindValue(":zona", $zona);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    public function GetGruposPorDia($dia)
    { // muestra los grupos de la zona
        $conn = new Conexion();
        $sql = "SELECT * FROM grupos WHERE cerradas LIKE :dia OR abiertas LIKE :dia ORDER BY grupo ASC";
        $stm = $conn->prepare($sql);
        $stm->bindValue(":dia", "%".$dia."%");
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    public function GetGruposPorCiudad($ciudad)
    { // muestra los grupos por la ciudad
        $conn = new Conexion();
        if ($ciudad == 'MADRID_C') {
            $ciudad = 'MADRID';
            $sql = "SELECT DISTINCT zona FROM grupos WHERE sitio = :sitio ORDER BY zona ASC";
        } else $sql = "SELECT DISTINCT zona FROM grupos WHERE sitio != 'MADRID' AND ciudad = :sitio ORDER BY zona ASC";
        $stm = $conn->prepare($sql);
        $stm->bindValue(":sitio", $ciudad);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }
    /**
     *  guarda y edita los grupòs
     */
    public function SetGrupos($id, $grupo, $direcion, $local, $zona, $codpos, $ciudad, $sitio, $cerradas, $abiertas, $otros, $lm, $mm, $xm, $jm, $vm, $sm, $dm, $lt, $mt, $xt, $jt, $vt, $st, $dt, $ser1, $ser2, $ser3, $lnt, $lat) {
        try {
            $conn = new Conexion();
            $stm = $conn->prepare("INSERT INTO `grupos`(`grupo`, `direcion`, `local`, `zona`, `codpos`, `ciudad`, `sitio`, `cerradas`, `abiertas`, `otros`, `lm`, `mm`, `xm`, `jm`, `vm`, `sm`, `dm`, `lt`, `mt`, `xt`, `jt`, `vt`, `st`, `dt`, `servidor1`, `servidor2`, `servidor3`, `lnt` , `lat`) 
            VALUES 
            (:grupo, :direcion, :localia, :zona, :codpos, :ciudad, :sitio, :cerradas, :abiertas, :otros, :lm, :mm, :xm, :jm, :vm, :sm, :dm, :lt, :mt, :xt, :jt, :vt, :st, :dt, :servidor1, :servidor2, :servidor3, :lnt, :lat)");
            $stm->bindValue(":grupo", $grupo);
            $stm->bindValue(":direcion", $direcion);
            $stm->bindValue(":localia", $local);
            $stm->bindValue(":zona", $zona);
            $stm->bindValue(":codpos", $codpos);
            $stm->bindValue(":ciudad", $ciudad);
            $stm->bindValue(":sitio", $sitio);
            $stm->bindValue(":cerradas", $cerradas);
            $stm->bindValue(":abiertas", $abiertas);
            $stm->bindValue(":otros", $otros);
            $stm->bindValue(":lm", $lm);
            $stm->bindValue(":mm", $mm);
            $stm->bindValue(":xm", $xm);
            $stm->bindValue(":jm", $jm);
            $stm->bindValue(":vm", $vm);
            $stm->bindValue(":sm", $sm);
            $stm->bindValue(":dm", $dm);
            $stm->bindValue(":lt", $lt);
            $stm->bindValue(":mt", $mt);
            $stm->bindValue(":xt", $xt);
            $stm->bindValue(":jt", $jt);
            $stm->bindValue(":vt", $vt);
            $stm->bindValue(":st", $st);
            $stm->bindValue(":dt", $dt);
            $stm->bindValue(":servidor1", $ser1);
            $stm->bindValue(":servidor2", $ser2);
            $stm->bindValue(":servidor3", $ser3);
            $stm->bindValue(":lnt", $lnt);
            $stm->bindValue(":lat", $lat);
            if ($stm->execute()) return 1;
            else return 0;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function UpdateGrupos($id, $grupo, $direcion, $local, $zona, $codpos, $ciudad, $sitio, $cerradas, $abiertas, $otros, $lm, $mm, $xm, $jm, $vm, $sm, $dm, $lt, $mt, $xt, $jt, $vt, $st, $dt, $ser1, $ser2, $ser3, $lnt, $lat)
    {
        $conn = new Conexion();
        $sql = "UPDATE grupos SET `grupo`=:grupo,`direcion`=:direcion,`local`=:localia,`zona`=:zona,`codpos`=:codpos,`ciudad`=:ciudad,`sitio`=:sitio,`cerradas`=:cerradas,`abiertas`=:abiertas,`otros`=:otros,`lm`=:lm,`mm`=:mm,`xm`=:xm,`jm`=:jm,`vm`=:vm,`sm`=:sm,`dm`=:dm,`lt`=:lt,`mt`=:mt,`xt`=:xt,`jt`=:jt,`vt`=:vt,`st`=:st,`dt`=:dt,`servidor1`=:servidor1,`servidor2`=:servidor2,`servidor3`=:servidor3, `lnt`=:lnt, `lat`=:lat WHERE id = :id";
        $stm = $conn->prepare($sql);
        $stm->bindValue(":grupo", $grupo);
        $stm->bindValue(":direcion", $direcion);
        $stm->bindValue(":localia", $local);
        $stm->bindValue(":zona", $zona);
        $stm->bindValue(":codpos", $codpos);
        $stm->bindValue(":ciudad", $ciudad);
        $stm->bindValue(":sitio", $sitio);
        $stm->bindValue(":cerradas", $cerradas);
        $stm->bindValue(":abiertas", $abiertas);
        $stm->bindValue(":otros", $otros);
        $stm->bindValue(":lm", $lm);
        $stm->bindValue(":mm", $mm);
        $stm->bindValue(":xm", $xm);
        $stm->bindValue(":jm", $jm);
        $stm->bindValue(":vm", $vm);
        $stm->bindValue(":sm", $sm);
        $stm->bindValue(":dm", $dm);
        $stm->bindValue(":lt", $lt);
        $stm->bindValue(":mt", $mt);
        $stm->bindValue(":xt", $xt);
        $stm->bindValue(":jt", $jt);
        $stm->bindValue(":vt", $vt);
        $stm->bindValue(":st", $st);
        $stm->bindValue(":dt", $dt);
        $stm->bindValue(":servidor1", $ser1);
        $stm->bindValue(":servidor2", $ser2);
        $stm->bindValue(":servidor3", $ser3);
        $stm->bindValue(":lnt", $lnt);
        $stm->bindValue(":lat", $lat);
        $stm->bindValue(":id", $id);
        if ($stm->execute()) return 1;
        else return 0;
    }


    public function DeleteGrupo($id)
    { // elimina un grupo de la base de datos
        try {
            $conn = new Conexion();
            $sql = "DELETE FROM grupos WHERE id = :id";
            $stm = $conn->prepare($sql);
            $stm->bindValue(":id", $id);
            if ($stm->execute()) return 1;
            return 0;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
