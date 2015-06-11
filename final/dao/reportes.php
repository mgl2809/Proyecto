<?php

/**
 *
 * @Clase para modificar programa. "programa.php"
 * @versión: 0.1      @modificado:   8 de junio de 2015
 * @autor: TRM
 *
 */
class reportes
{

    private $idPrograma;
    private $nombrePrograma;
    private $descripcion;
    private $caracteristicas;
    private $categoria;
    private $convocatoria;
    private $monto;
    private $estatus;
    private $nombre;

    public function __construct(){

    }
    public function setidPrograma($idPrograma){
        $this->idPrograma = $idPrograma;
    }
    
    public function getidPrograma(){
        return $this->idPrograma;
    }

    public function setNombrePrograma($nombrePrograma){
        $this->nombrePrograma = $nombrePrograma;
    }

    public function getNombrePrograma(){
        return $this->nombrePrograma;
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }
    
    public function getDescripcion(){
        return $this->descripcion;
    }
    
    public function setCaracteristicas($caracteristicas){
        $this->caracteristicas = $caracteristicas;
    }
    
    public function getCaracteristicas(){
        return $this->caracteristicas;
    }
   
    public function setMonto($monto){
        $this->monto = $monto;
    }
    
    public function getMonto(){
        return $this->monto;
    }
    
    public function setEstatus($estatus){
        $this->estatus = $estatus;
    }
    
    public function getEstatus(){
        return $this->estatus;
    }
    
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getNombre(){
        return $this->nombre;
    }
}

?>
