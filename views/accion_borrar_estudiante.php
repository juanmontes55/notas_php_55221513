<?php
require '../models/estudiante.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/estudianteController.php';

use estudianteController\EstudianteController;

$estudianteController = new EstudianteController();
$resultado = $estudianteController->delete($_GET['codigo']);
if ($resultado) {
    echo '<h1>Estudiante borrado</h1>';
} else {
    echo '<h1>No se pudo borrar el estudiante</h1>';
}
