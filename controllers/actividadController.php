<?php

    namespace actividadController;

    use baseControler\BaseControllerActividad;
    use conexionDb\ConexionDbController;
    use actividad\Actividad;

    class ActividadController extends BaseControllerActividad
    {   

        function create($actividad)
        {
            $sql = 'INSERT INTO actividades';
            $sql .= '(descripcion, nota, codigoEstudiante) values';
            $sql .= '(';
            $sql .= '"' . $actividad->getDescripcion() . '",';
            $sql .= $actividad->getNota(). ',';
            $sql .= $actividad->getCodigoEstudiante(). ')';
            $conexiondb = new ConexionDbController();
            $resultadoSQL = $conexiondb->execSQL($sql);
            $conexiondb->close();
            return $resultadoSQL;
        }

        function read($code)
        {
            $sql = 'SELECT * FROM actividades';
            $sql .= ' WHERE codigoEstudiante= ' .$code;
            $conexiondb = new ConexionDbController();
            $resultadoSQL = $conexiondb->execSQL($sql);
            $actividades = [];
           while($registro = $resultadoSQL -> fetch_assoc()){
            $actividad = new Actividad();
            $actividad -> setId($registro['id']);
            $actividad -> setDescripcion($registro['descripcion']);
            $actividad -> setNota($registro['nota']);
            $actividad -> setCodigoEstudiante($code);
            array_push($actividades, $actividad);
           } 
           $conexiondb->close();
           return $actividades;
        }

        function update($id, $actividad){
            $sql = 'UPDATE actividades SET ';
            $sql .= 'descripcion = "' . $actividad-> getDescripcion() . '",';
            $sql .= 'nota = ' . $actividad-> getNota() . ' ';
            $sql .= 'WHERE id=' . $id;
            $conexiondb = new ConexionDbController();
            $resultadoSQL = $conexiondb->execSQL($sql);
            $conexiondb->close();
            return $resultadoSQL;
        }

        function delete($id){
            $sql = 'DELETE FROM actividades WHERE id=' . $id;
            $conexiondb = new ConexionDbController();
            $resultadoSQL = $conexiondb->execSQL($sql);
            $conexiondb->close();
            return $resultadoSQL;
        }

        function readRow($id){
            $sql = 'SELECT * FROM actividades';
            $sql .= ' WHERE id=' .$id;
            $conexiondb = new ConexionDbController();
            $resultadoSQL = $conexiondb->execSQL($sql);
            $actividad = new Actividad();
           while($registro = $resultadoSQL -> fetch_assoc()){
                $actividad ->setId($id);
                $actividad -> setDescripcion($registro['descripcion']);
                $actividad -> setNota($registro['nota']);
                $actividad -> setCodigoEstudiante($registro['codigoEstudiante']);
           } 
           $conexiondb->close();
           return $actividad;
        }
    }
?>