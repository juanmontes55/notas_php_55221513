<?php namespace baseControler;

abstract class BaseControllerEstudiante
{
    abstract function create($model);
    abstract function read();
    abstract function update($codigo, $estudiante);
    abstract function delete($codigo);
    abstract function readRow($codigo);
}

abstract class BaseControllerActividad
{
    abstract function create($model);
    abstract function read($code);
    abstract function update($id, $model);
    abstract function delete($id);
    abstract function readRow($id);
}