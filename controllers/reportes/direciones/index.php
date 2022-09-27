<?php

include '../../../models/config.php';

$conn = new Conexion();
$stm = $conn->prepare("SELECT * FROM area7 ORDER BY grupo ASC");
$stm->execute();
$fila = $stm->fetchAll();


?>

<style>
    * {
        margin: 0;
        padding: 0;
    }
    table {
        position: relative;
        width: 100%;
        border-collapse: collapse;
        background-color: #fff;
    }
    table tbody tr {
        position: relative;
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: start;
        align-items: flex-start;
    }
    table tbody tr td {
        position: relative;
        width: 49.5%;
        height: 138.4px;
        display: flex;
        align-items: center;
        border: 1px solid #fff;
    }
    table tbody tr td .contenido {
        margin-left: 14px;
        font-size: 14px;
    }
</style>

<?php

echo '<table> <tbody><tr>';

for($i=0;$i<sizeof($fila); $i++) {
    echo '<td>
    <div class="contenido">
    <p><strong>Grupo ' . $fila[$i]['grupo'] . '</strong></p>
    <p>' . $fila[$i]['direcion'] . '</p>
    <p>' . $fila[$i]['codpos'] . ' - ' . $fila[$i]['sitio'] . '</p>
    <p>' . $fila[$i]['ciudad'] . '</p>
    </div>
    </td>';
}

echo '</tr></tbody> </table>';

?>

<script>
    window.onload = {
        print()
    }
</script>