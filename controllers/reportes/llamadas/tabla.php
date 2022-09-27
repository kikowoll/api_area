

<?php

use Sabberworm\CSS\Value\Size;

  
  $int = 0;
  $fam = 0;
  $com = 0;
  $san = 0;
  $pen = 0;
  $col = 0;
  $med = 0;
  $otr = 0;
  $mint = 0;
  $mfam = 0;
  $mcom = 0;
  $msan = 0;
  $mpen = 0;
  $mcol = 0;
  $mmed = 0;
  $motr = 0;
  for($i=0;$i< sizeof($fila); $i++) {
    if($fila[$i]['tipo'] == 'Interesado' && $fila[$i]['servidor'] != 'Movil') $int++;
    else if($fila[$i]['tipo'] == 'Familiar' && $fila[$i]['servidor'] != 'Movil') $fam++;
    else if($fila[$i]['tipo'] == 'Compañero' && $fila[$i]['servidor'] != 'Movil') $com++;
    else if($fila[$i]['tipo'] == 'Sanidad' && $fila[$i]['servidor'] != 'Movil') $san++;
    else if($fila[$i]['tipo'] == 'Penitenciarias' && $fila[$i]['servidor'] != 'Movil') $pen++;
    else if($fila[$i]['tipo'] == 'Colegio' && $fila[$i]['servidor'] != 'Movil') $col++;
    else if($fila[$i]['tipo'] == 'Medio comunicacion' && $fila[$i]['servidor'] != 'Movil') $med++;
    else if($fila[$i]['tipo'] == 'Otro' && $fila[$i]['servidor'] != 'Movil') $otr++;
    else if($fila[$i]['tipo'] == 'Interesado' && $fila[$i]['servidor'] == 'Movil') $mint++;
    else if($fila[$i]['tipo'] == 'Familiar' && $fila[$i]['servidor'] == 'Movil') $mfam++;
    else if($fila[$i]['tipo'] == 'Compañero' && $fila[$i]['servidor'] == 'Movil') $mcom++;
    else if($fila[$i]['tipo'] == 'Sanidad' && $fila[$i]['servidor'] == 'Movil') $msan++;
    else if($fila[$i]['tipo'] == 'Penitenciarias' && $fila[$i]['servidor'] == 'Movil') $mpen++;
    else if($fila[$i]['tipo'] == 'Colegio' && $fila[$i]['servidor'] == 'Movil') $mcol++;
    else if($fila[$i]['tipo'] == 'Medio comunicacion' && $fila[$i]['servidor'] == 'Movil') $mmed++;
    else if($fila[$i]['tipo'] == 'Otro' && $fila[$i]['servidor'] == 'Movil') $motr++;
  }
  $sumaPre = $int + $fam +$com + $san + $pen + $col + $med + $otr;
  $sumaMov = $mint + $mfam +$mcom + $msan + $mpen + $mcol + $mmed + $motr;
  $sumaTotal = $sumaPre + $sumaMov
?>
<div class="conte-tabla">
<h3><u>Llamadas recibidas:</u> </h3>
<table id="tablauno">
  <tbody>
    <tr>
      <td colspan="3">Presenciales</td>
      <td colspan="2">Movil</td>
    </tr>
    <tr>
      <td>Tipo llamada</td>
      <td>llamadas</td>
      <td></td>
      <td>Tipo llamada</td>
      <td>llamadas</td>
    </tr>
    <tr>
      <td>Interesado</td>
      <td><?= $int ?></td>
      <td></td>
      <td>Interesado</td>
      <td><?= $mint ?></td>
    </tr>
    <tr>
      <td>Familiar</td>
      <td><?= $fam ?></td>
      <td></td>
      <td>Familiar</td>
      <td><?= $mfam ?></td>
    </tr>
    <tr>
      <td>Compañero</td>
      <td><?= $com ?></td>
      <td></td>
      <td>Compañero</td>
      <td><?= $mcom ?></td>
    </tr>
    <tr>
      <td>Sanida</td>
      <td><?= $san ?></td>
      <td></td>
      <td>Sanida</td>
      <td><?= $msan ?></td>
    </tr>
    <tr>
      <td>Penitenciarias</td>
      <td><?= $pen ?></td>
      <td></td>
      <td>Penitenciarias</td>
      <td><?= $mpen ?></td>
    </tr>
    <tr>
      <td>Colegios</td>
      <td><?= $col ?></td>
      <td></td>
      <td>Colegios</td>
      <td><?= $mcol ?></td>
    </tr>
    <tr>
      <td>Medios comunicacion</td>
      <td><?= $med ?></td>
      <td></td>
      <td>Medios comunicacion</td>
      <td><?= $mmed ?></td>
    </tr>
    <tr>
      <td>Otros</td>
      <td><?= $otr ?></td>
      <td></td>
      <td>Otros</td>
      <td><?= $motr ?></td>
    </tr>
    <tr>
      <td style="text-align: right;font-weight: bold">Total</td>
      <td style="font-weight: bold;"><?= $sumaPre ?></td>
      <td></td>
      <td style="text-align: right;font-weight: bold">Total</td>
      <td style="font-weight: bold;"><?= $sumaMov ?></td>
    </tr>
  </tbody>
</table>
<br><br>
<table id="tablados">
  <tbody>
    <tr>
      <td>Llamadas presenciales</td>
      <td><?= $sumaPre ?></td>
    </tr>
    <tr>
      <td>Llamadas al movil</td>
      <td><?= $sumaMov ?></td>
    </tr>
    <tr>
      <td style="font-weight: bold; font-size: 22px">Total de llamadas</td>
      <td style="font-weight: bold; font-size: 22px"><?= $sumaPre + $sumaMov ?></td>
    </tr>
  </tbody>
</table>
</div>