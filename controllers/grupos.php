<?php

include 'CORS.php';
include '../models/grupos.models.php';

$grupos = new Grupos();

if(isset($_POST['datos'])) 
{
    $data = json_decode($_POST['datos']);

    switch($data->accion) {
        case 'getGrupos':
            echo json_encode($grupos->GetGrupos());
            break;

        case 'getGruposPorId':
            echo json_encode($grupos->GetGruposPorId($data->id));
            break;

        case 'getGruposPorZona':
            echo json_encode($grupos->GetGruposPorZona($data->zona));
            break;

        case 'getGruposPorCiudad':
            echo json_encode($grupos->GetGruposPorCiudad($data->ciudad));
            break;
        
        case 'getGruposPorDia':
            echo json_encode($grupos->GetGruposPorDia($data->dia));
            break;

        case 'setGrupo':
            echo json_encode($grupos->SetGrupos($data->id, $data->grupo, $data->direcion, $data->local, $data->zona, strval($data->codpos), $data->ciudad, $data->sitio, $data->cerradas, $data->abiertas, $data->otros, $data->lm, $data->mm, $data->xm, $data->jm, $data->vm, $data->sm, $data->dm, $data->lt, $data->mt, $data->xt, $data->jt, $data->vt, $data->st, $data->dt, $data->servidor1, $data->servidor2, $data->servidor3, strval($data->lnt), strval($data->lat)));
            break;  

        case 'updateGrupo':
            echo json_encode($grupos->UpdateGrupos(strval($data->id), $data->grupo, $data->direcion, $data->local, $data->zona, $data->codpos, $data->ciudad, $data->sitio, $data->cerradas, $data->abiertas, $data->otros, $data->lm, $data->mm, $data->xm, $data->jm, $data->vm, $data->sm, $data->dm, $data->lt, $data->mt, $data->xt, $data->jt, $data->vt, $data->st, $data->dt, $data->servidor1, $data->servidor2, $data->servidor3, $data->lnt, $data->lat));
            break;

        case 'deleteGrupo':
            echo json_encode($grupos->DeleteGrupo(strval($data->id)));
            break;
    }
}