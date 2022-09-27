<?php

$method = $_SERVER['REQUEST_METHOD'];

class Conexion extends PDO {
    public function __construct() {
        try {
            parent::__construct("mysql:host=qadl648.area07aa.org; dbname=qadl648", "qadl648", "Granavenida2");
            parent::exec("set names utf8");
        } catch (PDOException $e) {
            echo "Error al conectar " . $e->getMessage();
            exit;
        }
    }
}