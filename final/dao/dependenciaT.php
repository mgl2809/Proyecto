<?php

/**
 *
 * @Clase para modificar programa. "programa.php"
 * @versión: 0.1      @modificado:   8 de junio de 2015
 * @autor: TRM
 *
 */
class dependencia
{

    private $idDependencia;
    private $encargado;
    private $nombre;
    private $ubicacion;
    private $responsable;

    public function __construct(){

    }
    public function setIdDependencia($idDependencia){
        $this->idDependencia = $idDependencia;
    }
    
    public function getIdDependencia(){
        return $this->idDependencia;
    }

    public function setEncargado($encargado){
        $this->encargado = $encargado;
    }

    public function getEncargado(){
        return $this->encargado;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    
    public function getNombre(){
        return $this->nombre;
    }
    
}

?>
