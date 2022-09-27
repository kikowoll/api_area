<?php

$stm = $con->prepare("SELECT * FROM area7 WHERE sitio = :sitio  ORDER BY zona ASC");
$stm->bindvalue(':sitio', 'MADRID');
$stm->execute();
$filaMC = $stm->fetchAll(PDO::FETCH_ASSOC);
$mes = $_GET['mes'];
$dos = $_GET['link'];
$link = false;

if($dos == 'si') $link = true;
else $link = false

?>


<table>
    <tbody>
        <tr>
            <td colspan="10" style="border: 0;"><img src="<?= $base64 ?>" alt="cabeza"></td>
        </tr>
        <tr>
            <td style="border: 0;">Actualizado: <?= $mes ?></td>
        </tr>
    </tbody>
<?php
    for($i=0;$i<sizeof($filaMC); $i++) {
        if($i == 0 || $i == 6 || $i == 13 || $i == 20 || $i == 27 || $i == 34) {

?>
        
        <tbody>
            <?php

                if($i == 0) {
                    echo '
                    <tr>
                        <td colspan="10" style="background-color: #333; color: #eee; font-size:14px;text-align:center;">MADRID CIUDAD</td>
                    </tr>';
                } else {
                    echo '
                    <tr class="saltoPagina" style="padding-top: 50px;">
                        <td colspan="10" style="background-color: #333; color: #eee; font-size:14px;text-align:center;">MADRID CIUDAD</td>
                    </tr>';
                }
            ?>
            
            <tr>
                <td style="background-color: #333;color:#eee; text-align:center;"><?= $filaMC[$i]['zona'] ?></td>
                <td style="text-align: center;background-color: blue; color: #eee;font-size:14px"><?= $filaMC[$i]['grupo'] ?></td>
                <td style="background-color: #333;"></td>
                <td style="background-color: #333; color: #eee; border-right:1px solid #eee;">lunes</td>
                <td style="background-color: #333; color: #eee; border-right:1px solid #eee;">martes</td>
                <td style="background-color: #333; color: #eee; border-right:1px solid #eee;">miércoles</td>
                <td style="background-color: #333; color: #eee; border-right:1px solid #eee;">jueves</td>
                <td style="background-color: #333; color: #eee; border-right:1px solid #eee;">viernes</td>
                <td style="background-color: #333; color: #eee; border-right:1px solid #eee;">sábados</td>
                <td style="background-color: #333; color: #eee;">domingos</td>
            </tr>
            <tr>
                <td style="text-align: center;">Paso XII</td>
                <td><?= $filaMC[$i]['direcion'] ?></td>
                <td style="background-color: #333; color:#eee;">mañanas</td>
                <td><?= $filaMC[$i]['lm'] ?></td>
                <td><?= $filaMC[$i]['mm'] ?></td>
                <td><?= $filaMC[$i]['xm'] ?></td>
                <td><?= $filaMC[$i]['jm'] ?></td>
                <td><?= $filaMC[$i]['vm'] ?></td>
                <td><?= $filaMC[$i]['sm'] ?></td>
                <td><?= $filaMC[$i]['dm'] ?></td>
            </tr>
            <tr>
                <td><?php if($link) echo $filaMC[$i]['servidor1']; ?></td>
                <td><?= $filaMC[$i]['local'] ?></td>
                <td style="background-color: #333; color:#eee;">tardes</td>
                <td><?= $filaMC[$i]['lt'] ?></td>
                <td><?= $filaMC[$i]['mt'] ?></td>
                <td><?= $filaMC[$i]['xt'] ?></td>
                <td><?= $filaMC[$i]['jt'] ?></td>
                <td><?= $filaMC[$i]['vt'] ?></td>
                <td><?= $filaMC[$i]['st'] ?></td>
                <td><?= $filaMC[$i]['dt'] ?></td>
            </tr>
            <tr>
                <td><?php if($link) echo $filaMC[$i]['servidor2'] ?></td>
                <td><?= $filaMC[$i]['codpos'] ?> - <?= $filaMC[$i]['ciudad'] ?></td>
                <td style="background-color: #333; color:#eee;">abiertas</td>
                <td colspan="7"><?= $filaMC[$i]['abiertas'] ?></td>
            </tr>
            <tr>
                <td><?php if($link) echo $filaMC[$i]['servidor3'] ?></td>
                <td colspan="9" style="border: 1px solid">Otros: <?= $filaMC[$i]['otros'] ?></td>
            </tr>
        </tbody>
<?php
            } else {
?>
         <tbody>
            <tr>
                <td style="background-color: #333;color:#eee; text-align:center;"><?= $filaMC[$i]['zona'] ?></td>
                <td style="text-align: center;background-color: blue; color: #eee;font-size:14px"><?= $filaMC[$i]['grupo'] ?></td>
                <td style="background-color: #333;"></td>
                <td style="background-color: #333; color: #eee; border-right:1px solid #eee;">lunes</td>
                <td style="background-color: #333; color: #eee; border-right:1px solid #eee;">martes</td>
                <td style="background-color: #333; color: #eee; border-right:1px solid #eee;">miércoles</td>
                <td style="background-color: #333; color: #eee; border-right:1px solid #eee;">jueves</td>
                <td style="background-color: #333; color: #eee; border-right:1px solid #eee;">viernes</td>
                <td style="background-color: #333; color: #eee; border-right:1px solid #eee;">sábados</td>
                <td style="background-color: #333; color: #eee;">domingos</td>
            </tr>
            <tr>
                <td style="text-align: center;">Paso XII</td>
                <td><?= $filaMC[$i]['direcion'] ?></td>
                <td style="background-color: #333; color:#eee;">mañanas</td>
                <td><?= $filaMC[$i]['lm'] ?></td>
                <td><?= $filaMC[$i]['mm'] ?></td>
                <td><?= $filaMC[$i]['xm'] ?></td>
                <td><?= $filaMC[$i]['jm'] ?></td>
                <td><?= $filaMC[$i]['vm'] ?></td>
                <td><?= $filaMC[$i]['sm'] ?></td>
                <td><?= $filaMC[$i]['dm'] ?></td>
            </tr>
            <tr>
                <td><?php if($link) echo $filaMC[$i]['servidor1'] ?></td>
                <td><?= $filaMC[$i]['local'] ?></td>
                <td style="background-color: #333; color:#eee;">tardes</td>
                <td><?= $filaMC[$i]['lt'] ?></td>
                <td><?= $filaMC[$i]['mt'] ?></td>
                <td><?= $filaMC[$i]['xt'] ?></td>
                <td><?= $filaMC[$i]['jt'] ?></td>
                <td><?= $filaMC[$i]['vt'] ?></td>
                <td><?= $filaMC[$i]['st'] ?></td>
                <td><?= $filaMC[$i]['dt'] ?></td>
            </tr>
            <tr>
                <td><?php if($link) echo $filaMC[$i]['servidor2'] ?></td>
                <td><?= $filaMC[$i]['codpos'] ?> - <?= $filaMC[$i]['ciudad'] ?></td>
                <td style="background-color: #333; color:#eee;">abiertas</td>
                <td colspan="7" style="text-align: left;"><?= $filaMC[$i]['abiertas'] ?></td>
            </tr>
            <tr>
                <td><?php if($link) echo $filaMC[$i]['servidor3'] ?></td>
                <td colspan="9" style="border: 1px solid">Otros: <?= $filaMC[$i]['otros'] ?></td>
            </tr>
        </tbody>

<?php
        }
    }

?>

</table>