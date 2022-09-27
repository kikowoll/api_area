<?php

include '../../CORS.php';
include './../../../models/config.php';

$con = new Conexion();


$path = 'titulo.png';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);


ob_start();
?>
<style>
    @page {
        padding-top: 50px;
    }
    table {
        position: relative;
        width: 100%;
        border-collapse: collapse;
    }
    table tbody {
        position: relative;
        height: 14.28%;
    }
    tr.saltoPagina {
        page-break-before: always;
        margin: 0;
        padding: 50px  0 0 0;

    }
    table tbody tr td img {
        width: 100%;
    }
    table tbody tr td {
        padding: 1px 0;
    }
    table tbody tr td:nth-child(1) {
        width: 15%;
        font-size: 12px;
        border: 1px solid #333;
        white-space: nowrap;
    }
    table tbody tr td:nth-child(2) {
        width: 35%;
        font-size: 12px;
    }
    table tbody tr td:nth-child(3),
    table tbody tr td:nth-child(4), 
    table tbody tr td:nth-child(5), 
    table tbody tr td:nth-child(6), 
    table tbody tr td:nth-child(7), 
    table tbody tr td:nth-child(8), 
    table tbody tr td:nth-child(9), 
    table tbody tr td:nth-child(10)  {
        width: 6.25%;
        font-size: 10px;
        text-align: center;
        border: 1px solid;
    }
</style>
<title>Directorio</title>

<?php
include 'madridciudad.php';
include 'madridregion.php';
include 'toledo.php';
include 'Guadalajara.php';
include 'ciudadreal.php';

$html = ob_get_clean();
require_once '../../../dompdf/autoload.inc.php';
//echo $html;
use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape'); //'landscape o portrait');
$dompdf->render();
$dompdf->stream('directorio.pdf', array("Attachment" => false));