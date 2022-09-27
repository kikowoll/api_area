<?php

ob_start();

include '../../CORS.php';
include '../../../models/config.php';

$fecha = $_GET['mes'];
$titulo = str_replace('_', ' ', $fecha);

$conn = new Conexion();
$stm = $conn->prepare("SELECT * FROM $fecha");
$stm->execute();
$fila = $stm->fetchAll();

$path = 'titulo.png';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
?>

<style>
.texto {
    position: relative;
    font-size: 28px;
    font-weight: bold;
    text-align: center;
}
#spantexto {
    text-align: right;
}
table {
    position: relative;
    width: 100%;
    border-collapse: collapse;
}
table thead tr th {
    background-color: #333;
    color: #eee;
    text-align: center;
}
table tbody tr td {
    font-size: 13px;
    text-align: center;
}

table tbody tr td.vacio {
    background-color: #aaa;
}

</style>
<div class="texto"><?= ucfirst($titulo) ?></div>
<table border="1">
    
    <thead>
        <tr>
            <th>Sem.</th>
            <th>Dia_sem.</th>
            <th>Dia</th>
            <th>10:00 a 12:00</th>
            <th>12:00 a 14:00</th>
            <th>14:00 a 16:00</th>
            <th>16:00 a 18:00</th>
            <th>18:00 a 20:00</th>
        </tr>
    </thead>
    <tbody>
        <?php
            for($i=0; $i<sizeof($fila); $i++) {
                echo '<tr>';
                echo '<td>'.$fila[$i]['semana'].'</td>';
                echo '<td>'.$fila[$i]['dia_semana'].'</td>';
                echo '<td>'.$fila[$i]['dia'].'</td>';
                if($fila[$i]['hora1'] == null) {
                    echo '<td class="vacio">'. $fila[$i]['hora1'] .'</td>';
                    if($fila[$i]['hora2'] == null) {
                        echo '<td class="vacio">'. $fila[$i]['hora2'] .'</td>';
                        if($fila[$i]['hora3'] == null) {
                            echo '<td class="vacio">'. $fila[$i]['hora3'] .'</td>';
                            if($fila[$i]['hora4'] == null) {
                                echo '<td class="vacio">'. $fila[$i]['hora4'] .'</td>';
                                if($fila[$i]['hora5'] != null) {
                                    echo '<td>'. $fila[$i]['hora5'] .'</td>';
                                } else {
                                    echo '<td class="vacio">'. $fila[$i]['hora5'] .'</td>';
                                }
                            } else {
                                if($fila[$i]['hora4'] == $fila[$i]['hora5']) {
                                    echo '<td colspan="2">'. $fila[$i]['hora4'] .'</td>';
                                    
                                } else {
                                    echo '<td>'. $fila[$i]['hora4'] .'</td>';
                                    if($fila[$i]['hora5'] != null) {
                                        echo '<td>'. $fila[$i]['hora5'] .'</td>';
                                    } else {
                                        echo '<td class="vacio">'. $fila[$i]['hora5'] .'</td>';
                                    }
                                }
                            }
                        } else {
                            if($fila[$i]['hora3'] == $fila[$i]['hora4'] && $fila[$i]['hora4'] == $fila[$i]['hora5']) {
                                echo '<td colspan="3">'. $fila[$i]['hora3'] .'</td>';
                            } else  if($fila[$i]['hora3'] == $fila[$i]['hora4']) {
                                echo '<td colspan="2">'. $fila[$i]['hora3'] .'</td>';
                                if($fila[$i]['hora5'] != null) {
                                    echo '<td>'. $fila[$i]['hora5'] .'</td>';
                                } else {
                                    echo '<td class="vacio">'. $fila[$i]['hora5'] .'</td>';
                                }
                            } else {
                                echo '<td>'. $fila[$i]['hora3'] .'</td>';
                                if($fila[$i]['hora4'] == null) {
                                    echo '<td class="vacio">'. $fila[$i]['hora4'] .'</td>';
                                    if($fila[$i]['hora5'] != null) {
                                        echo '<td>'. $fila[$i]['hora5'] .'</td>';
                                    } else {
                                        echo '<td class="vacio">'. $fila[$i]['hora5'] .'</td>';
                                    }
                                } else {
                                    if($fila[$i]['hora4'] == $fila[$i]['hora5']) {
                                        echo '<td colspan="2">'. $fila[$i]['hora4'] .'</td>';
                                        
                                    } else {
                                        echo '<td>'. $fila[$i]['hora4'] .'</td>';
                                        if($fila[$i]['hora5'] != null) {
                                            echo '<td>'. $fila[$i]['hora5'] .'</td>';
                                        } else {
                                            echo '<td class="vacio">'. $fila[$i]['hora5'] .'</td>';
                                        }
                                    }
                                }
                            }
                        }
                    } else {
                        if($fila[$i]['hora2'] == $fila[$i]['hora3'] && $fila[$i]['hora3'] == $fila[$i]['hora4'] && $fila[$i]['hora4'] == $fila[$i]['hora5']) {
                          echo '<td colspan="4">'. $fila[$i]['hora2'].'</td>';  
                        } else if($fila[$i]['hora2'] == $fila[$i]['hora3'] && $fila[$i]['hora3'] == $fila[$i]['hora4']) {
                            echo '<td colspan="3">'. $fila[$i]['hora2'].'</td>';  
                            if($fila[$i]['hora5'] != null) {
                                echo '<td>'. $fila[$i]['hora5'] .'</td>';
                            } else {
                                echo '<td class="vacio">'. $fila[$i]['hora5'] .'</td>';
                            }
                        } else if($fila[$i]['hora2'] == $fila[$i]['hora3']) {
                            echo '<td colspan="2">'. $fila[$i]['hora2'].'</td>';  
                            if($fila[$i]['hora4'] == null) {
                                echo '<td class="vacio">'. $fila[$i]['hora4'] .'</td>';
                                if($fila[$i]['hora5'] != null) {
                                    echo '<td>'. $fila[$i]['hora5'] .'</td>';
                                } else {
                                    echo '<td class="vacio">'. $fila[$i]['hora5'] .'</td>';
                                }
                            } else {
                                if($fila[$i]['hora4'] == $fila[$i]['hora5']) {
                                    echo '<td colspan="2">'. $fila[$i]['hora4'] .'</td>';
                                    if($fila[$i]['hora5'] != null) {
                                        echo '<td>'. $fila[$i]['hora5'] .'</td>';
                                    } else {
                                        echo '<td class="vacio">'. $fila[$i]['hora5'] .'</td>';
                                    }
                                }
                            }
                        } else {
                            echo '<td>'. $fila[$i]['hora2'] .'</td>';
                            if($fila[$i]['hora3'] == null) {
                                echo '<td class="vacio">'. $fila[$i]['hora3'] .'</td>';
                                if($fila[$i]['hora4'] != null) {
                                    if($fila[$i]['hora4'] == $fila[$i]['hora5']) {
                                        echo '<td colspan="2">'. $fila[$i]['hora4'] .'</td>';
                                        if($fila[$i]['hora5'] != null) {
                                            echo '<td>'. $fila[$i]['hora5'] .'</td>';
                                        } else {
                                            echo '<td class="vacio">'. $fila[$i]['hora5'] .'</td>';
                                        }
                                    }
                                } else {
                                    echo '<td class="vacio">'. $fila[$i]['hora4'] .'</td>';
                                }
                            } else {
                                if($fila[$i]['hora3'] == $fila[$i]['hora4'] && $fila[$i]['hora4'] == $fila[$i]['hora5']) {
                                    echo '<td colspan="3">'. $fila[$i]['hora3'] .'</td>';
                                } else  if($fila[$i]['hora3'] == $fila[$i]['hora4']) {
                                    echo '<td colspan="2">'. $fila[$i]['hora3'] .'</td>';
                                    if($fila[$i]['hora5'] != null) {
                                        echo '<td>'. $fila[$i]['hora5'] .'</td>';
                                    } else {
                                        echo '<td class="vacio">'. $fila[$i]['hora5'] .'</td>';
                                    }
                                } else {
                                    echo '<td>'. $fila[$i]['hora3'] .'</td>';
                                    if($fila[$i]['hora4'] != null) {
                                        if($fila[$i]['hora4'] == $fila[$i]['hora5']) {
                                            echo '<td colspan="2">'. $fila[$i]['hora4'] .'</td>';
                                            if($fila[$i]['hora5'] != null) {
                                                echo '<td>'. $fila[$i]['hora5'] .'</td>';
                                            } else {
                                                echo '<td class="vacio">'. $fila[$i]['hora5'] .'</td>';
                                            }
                                        }
                                    } else {
                                        echo '<td class="vacio">'. $fila[$i]['hora4'] .'</td>';
                                    }
                                }
                            }
                        }
                    }
               } else {
                    if($fila[$i]['hora1'] == $fila[$i]['hora2'] && $fila[$i]['hora2'] == $fila[$i]['hora3'] && $fila[$i]['hora3'] == $fila[$i]['hora4'] && $fila[$i]['hora4'] == $fila[$i]['hora5']) {
                        echo '<td colspan="5">'. $fila[$i]['hora1'] .'</td>';
                    } else if($fila[$i]['hora1'] == $fila[$i]['hora2'] && $fila[$i]['hora2'] == $fila[$i]['hora3'] && $fila[$i]['hora3'] == $fila[$i]['hora4']) {
                        echo '<td colspan="4">'. $fila[$i]['hora1'] .'</td>';
                        if($fila[$i]['hora5'] != null) {
                            echo '<td>'. $fila[$i]['hora5'] .'</td>';
                        } else {
                            echo '<td class="vacio">'. $fila[$i]['hora5'] .'</td>';
                        }
                    } else if($fila[$i]['hora1'] == $fila[$i]['hora2'] && $fila[$i]['hora2'] == $fila[$i]['hora3']) {
                        echo '<td colspan="3">'. $fila[$i]['hora1'] .'</td>';
                        if($fila[$i]['hora4'] == null) {
                            echo '<td class="vacio">'. $fila[$i]['hora4'] .'</td>';
                            if($fila[$i]['hora5'] != null) {
                                echo '<td>'. $fila[$i]['hora5'] .'</td>';
                            } else {
                                echo '<td class="vacio">'. $fila[$i]['hora5'] .'</td>';
                            }
                        } else {
                            if($fila[$i]['hora4'] == $fila[$i]['hora5']) {
                                echo '<td colspan="2">'. $fila[$i]['hora4'] .'</td>';
                            } else {
                                echo '<td>'. $fila[$i]['hora4'] .'</td>';
                                if($fila[$i]['hora5'] != null) {
                                    echo '<td>'. $fila[$i]['hora5'] .'</td>';
                                } else {
                                    echo '<td class="vacio">'. $fila[$i]['hora5'] .'</td>';
                                }
                            }
                        }
                    } else if($fila[$i]['hora1'] == $fila[$i]['hora2']) {
                        echo '<td colspan="2">'. $fila[$i]['hora1'] .'</td>';
                        if($fila[$i]['hora3'] == null) {
                            echo '<td class="vacio">'. $fila[$i]['hora3'] .'</td>';
                            if($fila[$i]['hora4'] == null) {
                                echo '<td class="vacio">'. $fila[$i]['hora4'] .'</td>';
                                if($fila[$i]['hora5'] != null) {
                                    echo '<td>'. $fila[$i]['hora5'] .'</td>';
                                } else {
                                    echo '<td class="vacio">'. $fila[$i]['hora5'] .'</td>';
                                }
                            } else {
                                if($fila[$i]['hora4'] == $fila[$i]['hora5']) {
                                    echo '<td colspan="2">'. $fila[$i]['hora4'] .'</td>';
                                } else {
                                    echo '<td>'. $fila[$i]['hora4'] .'</td>';
                                    if($fila[$i]['hora5'] != null) {
                                        echo '<td>'. $fila[$i]['hora5'] .'</td>';
                                    } else {
                                        echo '<td class="vacio"></td>';
                                    }
                                }
                            }
                        } else {
                            if($fila[$i]['hora3'] == $fila[$i]['hora4'] && $fila[$i]['hora4'] == $fila[$i]['hora5']) {
                                echo '<td colspan="3">'. $fila[$i]['hora3'] .'</td>';
                            } else  if($fila[$i]['hora3'] == $fila[$i]['hora4']) {
                                echo '<td colspan="2">'. $fila[$i]['hora3'] .'</td>';
                                if($fila[$i]['hora5'] != null) {
                                    echo '<td>'. $fila[$i]['hora5'] .'</td>';
                                } else {
                                    echo '<td class="vacio">'. $fila[$i]['hora5'] .'</td>';
                                }
                            } else {
                                echo '<td>'. $fila[$i]['hora3'] .'</td>';
                                if($fila[$i]['hora4'] == null) {
                                    echo '<td class="vacio"></td>';
                                    if($fila[$i]['hora5'] != null) {
                                        echo '<td>'. $fila[$i]['hora5'] .'</td>';
                                    } else {
                                        echo '<td class="vacio"></td>';
                                    }
                                } else {
                                    if($fila[$i]['hora4'] == $fila[$i]['hora5']) {
                                        echo '<td colspan="2">'. $fila[$i]['hora4'] .'</td>';
                                    } else {
                                        echo '<td>'. $fila[$i]['hora4'] .'</td>';
                                        if($fila[$i]['hora5'] != null) {
                                            echo '<td>'. $fila[$i]['hora5'] .'</td>';
                                        } else {
                                            echo '<td class="vacio"></td>';
                                        }
                                    }
                                }
                            }
                        }
                    } else {
                        echo '<td>'. $fila[$i]['hora1'] .'</td>';
                        if($fila[$i]['hora2'] == null) {
                            echo '<td class="vacio">'. $fila[$i]['hora2'] .'</td>';
                            if($fila[$i]['hora3'] == null) {
                                echo '<td class="vacio">'. $fila[$i]['hora3'] .'</td>';
                                if($fila[$i]['hora4'] == null) {
                                    echo '<td class="vacio">'. $fila[$i]['hora4'] .'</td>';
                                    if($fila[$i]['hora5'] != null) {
                                        echo '<td>'. $fila[$i]['hora5'] .'</td>';
                                    } else {
                                        echo '<td class="vacio">'. $fila[$i]['hora5'] .'</td>';
                                    }
                                } else {
                                    if($fila[$i]['hora4'] == $fila[$i]['hora5']) {
                                        echo '<td colspan="2">'. $fila[$i]['hora4'] .'</td>';
                                        if($fila[$i]['hora5'] != null) {
                                            echo '<td>'. $fila[$i]['hora5'] .'</td>';
                                        } else {
                                            echo '<td class="vacio">'. $fila[$i]['hora5'] .'</td>';
                                        }
                                    }
                                }
                            } else {
                                if($fila[$i]['hora3'] == $fila[$i]['hora4'] && $fila[$i]['hora4'] == $fila[$i]['hora5']) {
                                    echo '<td colspan="3">'. $fila[$i]['hora3'] .'</td>';
                                } else  if($fila[$i]['hora3'] == $fila[$i]['hora4']) {
                                    echo '<td colspan="2">'. $fila[$i]['hora3'] .'</td>';
                                    if($fila[$i]['hora5'] != null) {
                                        echo '<td>'. $fila[$i]['hora5'] .'</td>';
                                    } else {
                                        echo '<td class="vacio">'. $fila[$i]['hora5'] .'</td>';
                                    }
                                } else {
                                    echo '<td>'. $fila[$i]['hora3'] .'</td>';
                                    if($fila[$i]['hora4'] == null) {
                                        echo '<td class="vacio">'. $fila[$i]['hora4'] .'</td>';
                                        if($fila[$i]['hora5'] != null) {
                                            echo '<td>'. $fila[$i]['hora5'] .'</td>';
                                        } else {
                                            echo '<td class="vacio">'. $fila[$i]['hora5'] .'</td>';
                                        }
                                    } else {
                                        if($fila[$i]['hora4'] == $fila[$i]['hora5']) {
                                            echo '<td colspan="2">'. $fila[$i]['hora4'] .'</td>';
                                            
                                        } else {
                                            echo '<td>'. $fila[$i]['hora4'] .'</td>';
                                            if($fila[$i]['hora5'] != null) {
                                                echo '<td>'. $fila[$i]['hora5'] .'</td>';
                                            } else {
                                                echo '<td class="vacio">'. $fila[$i]['hora5'] .'</td>';
                                            }
                                        }
                                    }
                                }
                            }
                        } else {
                            if($fila[$i]['hora2'] == $fila[$i]['hora3'] && $fila[$i]['hora3'] == $fila[$i]['hora4'] && $fila[$i]['hora4'] == $fila[$i]['hora5']) {
                              echo '<td colspan="4">'. $fila[$i]['hora2'].'</td>';  
                            } else if($fila[$i]['hora2'] == $fila[$i]['hora3'] && $fila[$i]['hora3'] == $fila[$i]['hora4']) {
                                echo '<td colspan="3">'. $fila[$i]['hora2'].'</td>';  
                                if($fila[$i]['hora5'] != null) {
                                    echo '<td>'. $fila[$i]['hora5'] .'</td>';
                                } else {
                                    echo '<td class="vacio">'. $fila[$i]['hora5'] .'</td>';
                                }
                            } else if($fila[$i]['hora2'] == $fila[$i]['hora3']) {
                                echo '<td colspan="2">'. $fila[$i]['hora2'].'</td>';  
                                if($fila[$i]['hora4'] == null) {
                                    echo '<td class="vacio">'. $fila[$i]['hora4'] .'</td>';
                                    if($fila[$i]['hora5'] != null) {
                                        echo '<td>'. $fila[$i]['hora5'] .'</td>';
                                    } else {
                                        echo '<td class="vacio">'. $fila[$i]['hora5'] .'</td>';
                                    }
                                } else {
                                    if($fila[$i]['hora4'] == $fila[$i]['hora5']) {
                                        echo '<td colspan="2">'. $fila[$i]['hora4'] .'</td>';
                                        if($fila[$i]['hora5'] != null) {
                                            echo '<td>'. $fila[$i]['hora5'] .'</td>';
                                        } else {
                                            echo '<td class="vacio">'. $fila[$i]['hora5'] .'</td>';
                                        }
                                    } else {
                                        echo '<td>'. $fila[$i]['hora4'] .'</td>';
                                        if($fila[$i]['hora5'] != null) {
                                            echo '<td>'. $fila[$i]['hora5'] .'</td>';
                                        } else {
                                            echo '<td class="vacio">'. $fila[$i]['hora5'] .'</td>';
                                        }
                                    }
                                }
                            } else {
                                echo '<td>'. $fila[$i]['hora2'] .'</td>';
                                if($fila[$i]['hora3'] == null) {
                                    echo '<td class="vacio">'. $fila[$i]['hora3'] .'</td>';
                                    if($fila[$i]['hora4'] == null) {
                                        echo '<td class="vacio">'. $fila[$i]['hora4'] .'</td>';
                                        if($fila[$i]['hora5'] != null) {
                                            echo '<td>'. $fila[$i]['hora5'] .'</td>';
                                        } else {
                                            echo '<td class="vacio">'. $fila[$i]['hora5'] .'</td>';
                                        }
                                    } else {
                                        if($fila[$i]['hora4'] == $fila[$i]['hora5']) {
                                            echo '<td colspan="2">'. $fila[$i]['hora4'] .'</td>';
                                            if($fila[$i]['hora5'] != null) {
                                                echo '<td>'. $fila[$i]['hora5'] .'</td>';
                                            } else {
                                                echo '<td class="vacio">'. $fila[$i]['hora5'] .'</td>';
                                            }
                                        } else {
                                            echo '<td>'. $fila[$i]['hora4'] .'</td>';
                                            if($fila[$i]['hora5'] != null) {
                                                echo '<td>'. $fila[$i]['hora5'] .'</td>';
                                            } else {
                                                echo '<td class="vacio">'. $fila[$i]['hora5'] .'</td>';
                                            }
                                        }
                                    }
                                } else {
                                    if($fila[$i]['hora3'] == $fila[$i]['hora4'] && $fila[$i]['hora4'] == $fila[$i]['hora5']) {
                                        echo '<td colspan="3">'. $fila[$i]['hora3'] .'</td>';
                                    } else  if($fila[$i]['hora3'] == $fila[$i]['hora4']) {
                                        echo '<td colspan="2">'. $fila[$i]['hora3'] .'</td>';
                                        if($fila[$i]['hora5'] != null) {
                                            echo '<td>'. $fila[$i]['hora5'] .'</td>';
                                        } else {
                                            echo '<td class="vacio">'. $fila[$i]['hora5'] .'</td>';
                                        }
                                    } else {
                                        echo '<td>'. $fila[$i]['hora3'] .'</td>';
                                        if($fila[$i]['hora4'] == null) {
                                            echo '<td class="vacio">'. $fila[$i]['hora4'] .'</td>';
                                            if($fila[$i]['hora5'] != null) {
                                                echo '<td>'. $fila[$i]['hora5'] .'</td>';
                                            } else {
                                                echo '<td class="vacio">'. $fila[$i]['hora5'] .'</td>';
                                            }
                                        } else {
                                            if($fila[$i]['hora4'] == $fila[$i]['hora5']) {
                                                echo '<td colspan="2">'. $fila[$i]['hora4'] .'</td>';
                                                if($fila[$i]['hora5'] != null) {
                                                    echo '<td>'. $fila[$i]['hora5'] .'</td>';
                                                } else {
                                                    echo '<td class="vacio">'. $fila[$i]['hora5'] .'</td>';
                                                }
                                            } else {
                                                echo '<td>'. $fila[$i]['hora4'] .'</td>';
                                                if($fila[$i]['hora5'] != null) {
                                                    echo '<td>'. $fila[$i]['hora5'] .'</td>';
                                                } else {
                                                    echo '<td class="vacio">'. $fila[$i]['hora5'] .'</td>';
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
               }
                echo '</tr>';
            }
        
        ?>
    </tbody>

</table>
<?php
/**
 * requires
 */


$html = ob_get_clean();
//echo $html;

require_once '../../../dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape'); //'landscape portrait');
$dompdf->render();
$dompdf->stream('informe llamadas '.$fecha.'.pdf', array("Attachment" => false));