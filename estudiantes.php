<?php
require 'models/estudiante.php';
require 'controllers/conexionDbController.php';
require 'controllers/baseController.php';
require 'controllers/estudianteController.php';

use estudianteController\EstudianteController;

$estudianteController = new EstudianteController();

$estudiantes = $estudianteController->read();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <main>
        <h1>Lista de estudiantes</h1>
        <a href="views/form_estudiante.php">Registrar estudiante</a>
        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($estudiantes as $estudiante) {
                    echo '<tr>';
                    echo '  <td>' . $estudiante->getCodigo() . '</td>';
                    echo '  <td>' . $estudiante->getNombres() . '</td>';
                    echo '  <td>' . $estudiante->getApellidos() . '</td>';
                    echo '  <td>';
                    echo '      <a href="views/accion_modificar_estudiante.php?codigo=' . $estudiante->getCodigo() . '">Modificar</a>';
                    echo '      <a href="views/accion_borrar_estudiante.php?codigo=' . $estudiante->getCodigo() . '">Borrar</a>';
                    echo '      <a href="actividades.php?codigo=' . $estudiante->getCodigo() . '&nombre=' . $estudiante->getNombres() . '&apellido=' . $estudiante->getApellidos() . '">Notas</a>';
                    echo '  </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </main>
</body>

</html>