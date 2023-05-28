<?php
require 'models/actividad.php';
require 'controllers/conexionDbController.php';
require 'controllers/baseController.php';
require 'controllers/actividadController.php';

use estudiante\Estudiante;
use actividad\Actividad;
use ActividadController\actividadController;

$contadorNotas = 0;
    $sumaNotas = 0;

    $codigo = $_GET['codigo'];
    $nombre = $_GET['nombre'];
    $apellido = $_GET['apellido'];
    
    $actividadController = new ActividadController();
    $actividades = $actividadController->read($codigo);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lista de actividades</title>
</head>

<body>
    
</body>

    <main>
            <h1>Actividades</h1>

            <br>

            <table class="table-bordered">
                <thead>
                    <tr class="table-encabezado">
                        <th>ID</th>
                        <th>Actividad</th>
                        <th>Nota</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($actividades as $actividad){
                        echo '<tr>';
                        echo '<td>' . $actividad->getId() . '</td>';
                        echo '<td>' . $actividad->getDescripcion() . '</td>';
                        echo '<td>' . $actividad->getNota() . '</td>';
                        echo '<td class="table-content">';
                        echo '      <a href="views/form_actividad.php?id=' . $actividad->getId() . ' &codigo=' . $codigo . '&nombre=' . $nombre . '&apellido=' . $apellido . '">Modificar</a>';
                        echo '      <a href="views/action_elim_act.php?id=' . $actividad->getId() . '&codigo=' . $codigo . '&nombre=' . $nombre . '&apellido=' . $apellido . '">Eliminar</a>';
                        echo '</td>';
                        echo '</tr>';
                        $contadorNotas ++;
                        $sumaNotas = $sumaNotas + $actividad->getNota();
                    }

                    if($contadorNotas == 0){
                        $resultado = "No hay registro de actividades";
                    }else{
                        $promedio = $sumaNotas / $contadorNotas;

                        if($promedio >= 3){
                            $resultado = "<label style='color: green'>" . number_format($promedio,3);
                        }else if($promedio < 3){
                            $resultado = "<label style='color: red'>" . number_format($promedio,3);
                        }
                    }

                    ?>
                </tbody>
            </table>
            <br>
            <?php
            ?>
            <p>Promedio: <?php echo $resultado; ?></p>


            <?php

            echo '<form action="views/form_actividad.php" method="post">';
            echo '<button type="submit">Agregar actividad</button>';
            echo '</form>';

            ?>


            <a href="estudiantes.php">Volver</a>
        </main>

</html>