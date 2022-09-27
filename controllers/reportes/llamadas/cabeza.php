
<?php
$path = 'titulo.png';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
//echo '<img src="'.$base64.'" alt=" id="foto__titulo">';
?>
<img src="<?= $base64 ?>" alt="fotoTitulo" id="foto__titulo">
<h2 style="text-align: center;padding:0;margin:0"><?= $fecha ?></h2>