<?php

include 'CORS.php';
include '../models/telefono.models.php';

$telefono = new Telefono();

if(isset($_POST)) {
    $data = json_decode($_POST['datos']);

    switch($data->accion) {
        case 'getTelefono':
            echo json_encode($telefono->GetTelefono($data->tabla));
            break;

        case 'getTelefonoPorDia':
            echo json_encode($telefono->GetTelefonoPorDia($data->tabla,$data->idd));
            break;

        case 'setTelefonoPorDia':
            echo json_encode($telefono->SetTelefonoPorDia($data->tabla,$data->idd,$data->hora1,$data->hora2,$data->hora3,$data->hora4,$data->hora5));
            break;

        case 'setMesNuevo':
            echo json_encode($telefono->SetMesNuevo(strval($data->mes), strval($data->ano)));
            break;

        case 'getServidores':

            break;
    }
}