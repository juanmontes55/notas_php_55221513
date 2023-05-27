<?php
require '../models/actividad.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/actividadController.php';

use actividad\Actividad;
use actividadController\ActividadController;

$actividad = new Actividad();
$actividad->setDescripcion($_POST['descripcion']);
$actividad->setNota($_POST['nota']);
$actividad->setCodigoEstudiante($_POST['codigoEstudiante']);

$actividadController = new ActividadController();
$resultado = $actividadController->create($actividad);
if ($resultado) {
    echo '<h1>Actividad registrado</h1>';
} else {
    echo '<h1>No se pudo registrar la actividad</h1>';
}
?>
<br>
<a href="../estudiantes.php">Volver al inicio</a>
