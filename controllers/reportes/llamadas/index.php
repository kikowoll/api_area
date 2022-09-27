<?php

ob_start();

include '../../CORS.php';
  include '../../../models/config.php';
  $fecha = $_GET['mes'];
  $conn = new Conexion();
  $stm = $conn->prepare("SELECT * FROM llamadas WHERE mes = :mes");
  $stm->bindValue(":mes", $fecha);
  $stm->execute();
  $fila = $stm->fetchAll();
?>
<style>
  @page {
    background-color: #fff;
  }
  .conte-cabeza {
    position: relative;
    width: 100%;
    text-align: center;
  }
  #foto__titulo {
    width: 100%;
    margin: 0;
    padding: 0;
  }
  .conte-tabla {
    position: relative;
    width: 100%;
    padding: 20px 0;
  }
  table {
    position: relative;
    width: 100%;
    border-collapse: collapse;
  }
  table#tablauno tbody tr:nth-child(2) td:nth-child(1),
  table#tablauno tbody tr:nth-child(2) td:nth-child(2),
  table#tablauno tbody tr:nth-child(2) td:nth-child(4),
  table#tablauno tbody tr:nth-child(2) td:nth-child(5) {
    padding: 2px 0;
    background-color: #333;
    color: #eee;
    text-align: center;
  }
  table#tablauno tbody tr:nth-child(3) td:nth-child(1),
  table#tablauno tbody tr:nth-child(3) td:nth-child(4),
  table#tablauno tbody tr:nth-child(4) td:nth-child(1),
  table#tablauno tbody tr:nth-child(4) td:nth-child(4),
  table#tablauno tbody tr:nth-child(5) td:nth-child(1),
  table#tablauno tbody tr:nth-child(5) td:nth-child(4),
  table#tablauno tbody tr:nth-child(6) td:nth-child(1),
  table#tablauno tbody tr:nth-child(6) td:nth-child(4),
  table#tablauno tbody tr:nth-child(7) td:nth-child(1),
  table#tablauno tbody tr:nth-child(7) td:nth-child(4),
  table#tablauno tbody tr:nth-child(8) td:nth-child(1),
  table#tablauno tbody tr:nth-child(8) td:nth-child(4),
  table#tablauno tbody tr:nth-child(9) td:nth-child(1),
  table#tablauno tbody tr:nth-child(9) td:nth-child(4),
  table#tablauno tbody tr:nth-child(10) td:nth-child(1),
  table#tablauno tbody tr:nth-child(10) td:nth-child(4),
  table#tablauno tbody tr:nth-child(11) td:nth-child(1),
  table#tablauno tbody tr:nth-child(11) td:nth-child(4) {
    width: 35%;
    border: 1px solid;
    padding: 2px 6px;
  }
  table#tablauno tbody tr:nth-child(3) td:nth-child(2),
  table#tablauno tbody tr:nth-child(3) td:nth-child(5),
  table#tablauno tbody tr:nth-child(4) td:nth-child(2),
  table#tablauno tbody tr:nth-child(4) td:nth-child(5),
  table#tablauno tbody tr:nth-child(5) td:nth-child(2),
  table#tablauno tbody tr:nth-child(5) td:nth-child(5),
  table#tablauno tbody tr:nth-child(6) td:nth-child(2),
  table#tablauno tbody tr:nth-child(6) td:nth-child(5),
  table#tablauno tbody tr:nth-child(7) td:nth-child(2),
  table#tablauno tbody tr:nth-child(7) td:nth-child(5),
  table#tablauno tbody tr:nth-child(8) td:nth-child(2),
  table#tablauno tbody tr:nth-child(8) td:nth-child(5),
  table#tablauno tbody tr:nth-child(9) td:nth-child(2),
  table#tablauno tbody tr:nth-child(9) td:nth-child(5),
  table#tablauno tbody tr:nth-child(10) td:nth-child(2),
  table#tablauno tbody tr:nth-child(10) td:nth-child(5),
  table#tablauno tbody tr:nth-child(11) td:nth-child(2),
  table#tablauno tbody tr:nth-child(11) td:nth-child(5) {
    width: 12%;
    border: 1px solid;
    padding: 2px;
    text-align: right;
  }

  table#tablados {
    position: relative;
    width: 300px;
    border-collapse: collapse;
    margin: auto;
  }
  table#tablados tbody tr {
    border-bottom: 1px solid;
  }
  table#tablados tbody tr td:nth-child(2) {
    text-align: right;
  }
  table#tablatres {
    position: relative;
    width: 300px;
    border-collapse: collapse;
    }
    table#tablatres thead tr th {
        padding: 2px 0;
        text-align: center;
        background-color: #333;
        color: #eee;
    }
    table#tablatres thead tr th:nth-child(2) {
        width: 25%;
    }
    table#tablatres tbody tr {
        border-bottom: 1px solid;
    }
    table#tablatres tbody tr td:nth-child(2) {
        text-align: center;
        font-weight: bold;
    }
    table#tablacuatro {
      position: relative;
      width: 50%;
      margin: auto;
    }
    table#tablacuatro thead tr th {
      padding: 2px 0;
      background-color: #333;
      text-align: center;
      color: #eee;
    }
    table#tablacuatro tbody tr {
      border-bottom: 1px solid;
    }
    table#tablacuatro tbody tr td:nth-child(2) {
      border: 1px solid;
      width: 20%;
      font-weight: bold;
      text-align: right
    }
    table#tablacinco tbody tr td:nth-child(2),
    table#tablacinco tbody tr td:nth-child(3) {
      border-left: 2px solid;
      padding: 0 0 0 3px;
    }
    .saltoPagina {
      page-break-after: always;
    }
</style>
<?php
include 'cabeza.php';
include 'tabla.php';
include 'conocido.php';
include 'relacionadas.php';
include 'mandados.php';
// $path = 'logo.png';
// $type = pathinfo($path, PATHINFO_EXTENSION);
// $data = file_get_contents($path);
// $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
// echo '<img src="'.$base64.'" alt="">';
$html = ob_get_clean();
//echo $html;

require_once '../../../dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait'); //'landscape');
$dompdf->render();
$dompdf->stream('informe llamadas '.$fecha.'.pdf', array("Attachment" => false));