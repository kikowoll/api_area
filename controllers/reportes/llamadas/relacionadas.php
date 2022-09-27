<?php

$ip = 0;
$peni = 0;
$paso = 0;
for($i=0;$i<sizeof($fila); $i++) {
    if($fila[$i]['relacionada'] == 'Instituciones') $peni++;
    else if($fila[$i]['relacionada'] == 'I.P.') $ip++;
    else if($fila[$i]['relacionada'] == 'Paso XII') $paso++;
}
?>

<h3><u>Llamadas relacionadas:</u></h3>

<table id="tablacuatro">
    <thead>
        <tr>
            <th>Relacion</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Infomación pública</td>
            <td><?= $ip ?></td>
        </tr>
        <tr>
            <td>Instituciones</td>
            <td><?= $peni ?></td>
        </tr>
        <tr>
            <td>Paso XII</td>
            <td><?= $paso ?></td>
        </tr>
    </tbody>
</table>

<div class="saltoPagina"></div>