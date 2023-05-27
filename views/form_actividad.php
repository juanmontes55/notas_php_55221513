<?php
require '../models/actividad.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/actividadController.php';

use actividad\Actividad;
use actividadController\ActividadController;

$id = empty($_GET['id']) ? '' : $_GET['id'];
$titulo = 'Registrar Actividad';
$urlAction = "accion_registro_actividad.php";
$actividad = new Actividad();
if (!empty($id)) {
    $titulo = 'Modificar actividad';
    $urlAction = "accion_modificar_actividad.php";
    $actividadController = new ActividadController();
    $actividad = $actividadController->readRow($id); 
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <h1><?php echo $titulo; ?></h1>
    <form action="<?php echo $urlAction;?>" method="post">
        <label>
            <input type="hidden" name="id" min="1" value="<?php echo $actividad->getId(); ?>" required>
        </label>
        <br>
        <label>
            <span>Descripción:</span>
            <input type="text" name="descripcion" value="<?php echo $actividad->getDescripcion(); ?>" required>
        </label>
        <br>
        <label>
            <span>Nota:</span>
            <input type="number" name="nota" min="0" max = "5" step="0.1" value="<?php echo $actividad->getNota(); ?>" required>
        </label>
        <br>
        <label>
            <input type="hidden" name="codigoEstudiante" min="1" value="<?php echo $actividad->getCodigoEstudiante(); ?>" required>
        </label>
        <br>
        <button type="submit">Guardar</button>
    </form>
</body>

</html>