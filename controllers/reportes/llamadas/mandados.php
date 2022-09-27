<?php

echo '<h3><u>Enviados a los grupos:</u></h3>';

$stm =$conn->prepare("SELECT grupo FROM area7 ORDER BY grupo ASC");
$stm->execute();
$fila =  $stm->fetchAll(PDO::FETCH_ASSOC);
$cone = new Conexion();
echo '<table id="tablacinco" style="border-collapse: collapse">';
for($i=0;$i<sizeof($fila);$i++) {
  $tm = $cone->prepare("SELECT grupo1,grupo2 FROM llamadas WHERE grupo1=:g1 OR grupo2=:g1");
  $tm->bindValue(":g1", $fila[$i]['grupo']);
  $tm->execute();
  $dato = $tm->rowCount();
  $grupo  = $fila[$i]['grupo'];
  if(strlen($grupo) > 20) $grupo = substr($grupo, 0 , 20);
  if($i %3 == 0) {
    echo '<tr>';
    echo '<td>'. $grupo . ' <strong>( ' . $dato .' )</strong></td>';
  } else {
    echo '<td>'. $grupo . ' <strong>( ' . $dato .' )</strong></td>';
  }
  if($i %3 == 3) {
    echo '</tr>';
  }
  //echo $fila[$i]['grupo'] . ' (' . $dato . '); ';
}

echo '</table>';