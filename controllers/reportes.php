<?php

include 'CORS.php';
include '../models/reportes.model.php';

$reportes = new Reportes();

if(isset($_POST)) {
    $data = json_decode($_POST['datos']);

    switch($data->accion) {
        case 'getLlamadas':
            echo json_encode($reportes->GetLlmamadas($data->mes));
            break;
    }
}