<?php

namespace estudianteController;

use baseControler\BaseControllerEstudiante;
use conexionDb\ConexionDbController;
use estudiante\Estudiante;

class EstudianteController extends BaseControllerEstudiante
{

    function create($estudiante)
    {
        $sql = 'INSERT INTO estudiantes';
        $sql .= '(codigo,nombres,apellidos) values';
        $sql .= '(';
        $sql .= $estudiante->getCodigo() . ',';
        $sql .= '"' . $estudiante->getNombres() . '",';
        $sql .= '"' . $estudiante->getApellidos() . '"';
        $sql .= ')';
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }

    function read()
    {
        $sql = 'SELECT * FROM estudiantes';
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $estudiantes = [];
        while ($registro = $resultadoSQL->fetch_assoc()) {
            $estudiante = new Estudiante();
            $estudiante->setCodigo($registro['codigo']);
            $estudiante->setNombres($registro['nombres']);
            $estudiante->setApellidos($registro['apellidos']);
            array_push($estudiantes, $estudiante);
        }
        $conexiondb->close();
        return $estudiantes;
    }

    function update($codigo, $estudiante)
    {
        $sql = 'UPDATE estudiantes SET ';
        $sql .= 'codigo=' . $estudiante->getCodigo() . ',';
        $sql .= 'nombres="' . $estudiante->getNombres() . '",';
        $sql .= 'apellidos="' . $estudiante->getApellidos() . '"';
        $sql .= ' where codigo=' . $codigo;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }

    function delete($codigo)
    {
        $sql = 'DELETE FROM estudiantes WHERE codigo=' . $codigo;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }

    function readRow($codigo){
        $sql = 'SELECT * FROM estudiantes';
        $sql .= ' WHERE codigo=' .$codigo;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $estudiante = new Estudiante();
       while($registro = $resultadoSQL -> fetch_assoc()){
            $estudiante -> setCodigo($registro['codigo']);
            $estudiante -> setNombres($registro['nombres']);
            $estudiante -> setApellidos($registro['apellidos']);
       } 
       $conexiondb->close();
       return $estudiante;
    }
}