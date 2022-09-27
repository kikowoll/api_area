
<?php
$web = 0;
$dir = 0;
$car = 0;
$san = 0;
$pen = 0;
$yan = 0;
$fam = 0;
$otr = 0;
for($i=0;$i<sizeof($fila); $i++) {
    if($fila[$i]['conocido'] == 'Pagina web') $web++;
    else if($fila[$i]['conocido'] == 'Directorio web') $dir++;
    else if($fila[$i]['conocido'] == 'Carteleria') $car++;
    else if($fila[$i]['conocido'] == 'Sanidad') $san++;
    else if($fila[$i]['conocido'] == 'Penitenciarias') $pen++;
    else if($fila[$i]['conocido'] == 'Ya nos conoce') $yan++;
    else if($fila[$i]['conocido'] == 'Familiares/amigos') $fam++;
    else if($fila[$i]['conocido'] == 'otros') $dir++;
}
?>

<h3><u>Como nos han conocido:</u></h3>
<table id="tablatres">
    <thead>
        <tr>
            <th>Modo</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Pagina Web</td>
            <td><?= $web ?></td>
        </tr>
        <tr>
            <td>Directorio Web</td>
            <td><?= $dir ?></td>
        </tr>
        <tr>
            <td>Carteleria</td>
            <td><?= $car ?></td>
        </tr>
        <tr>
            <td>Sanidad</td>
            <td><?= $san ?></td>
        </tr>
        <tr>
            <td>Penitenciarias</td>
            <td><?= $pen ?></td>
        </tr>
        <tr>
            <td>Ya nos conocen</td>
            <td><?= $yan ?></td>
        </tr>
        <tr>
            <td>Familiares/amigos</td>
            <td><?= $fam ?></td>
        </tr>
        <tr>
            <td>Otros</td>
            <td><?= $otr ?></td>
        </tr>
    </tbody>
</table>