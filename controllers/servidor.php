<?php

include 'CORS.php';
include '../models/servidor.models.php';

$servidor = new Servidor();

if(isset($_POST)) {
    $data = json_decode($_POST['datos']);

    switch ($data->accion) {
        case 'getServidores':
            echo json_encode($servidor->MostrarServidores());
            break;
    
        case 'getServidoresPorId':
            echo json_encode($servidor->GetServidorPorId($data->id));
            break;
    
        case 'setHorasServidor':
            echo json_encode($servidor->SetHorasServidor($data->servidor, $data->dia,$data->entrada,$data->salida));
            break;

        case 'setServidor':
            echo json_encode($servidor->SetServidor($data->servidor,$data->correo,$data->role,$data->pass));
            break;  

        case 'updateServidor':
            echo json_encode($servidor->UpdateServidor($data->id,$data->servidor,$data->correo,$data->role));
            break;  

        case 'updatePassword':
            echo json_encode($servidor->UpdatePassword($data->id,$data->pass,$data->nueva));
            break;    

        case 'deleteServidor':
            echo json_encode($servidor->DeleteServidor($data->id));
            break;
    
        case 'setLlamada':
            echo json_encode($servidor->GuardarLlamada($data->tipo,$data->conocido,$data->observaciones,$data->relacion,$data->text_relacion,$data->grupo1,$data->grupo2,$data->hora,$data->dia,$data->mes,$data->servidor));
            break;
    
        case 'getLlamadaDia':
            echo json_encode($servidor->MostrarLlamadasDia($data->dia, $data->mes));
            break;
    
        case 'getLlamadaServidor':
            echo json_encode($servidor->MostrarLlamadasServidor($data->servidor,$data->dia,$data->mes));
            break;
    
        case 'login':
            echo json_encode($servidor->Login($data->usuario,$data->pass));
            break;
    
        default:
            // code...
            break;
    }
}

