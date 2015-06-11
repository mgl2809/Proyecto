<?php

/**
 *
 * @Clase para modificar anioFiscal. "anioFiscal.php"
 * @versión: 0.1      @modificado:   9 de junio de 2015
 * @autor: TRM
 *
 */
class anioFiscal
{

    private $idAnio;
    private $nombre;
    private $inicio;
    private $fin;

    public function __construct(){

    }
    public function setIdAnio($idAnio){
        $this->idAnio = $idAnio;
    }
    
    public function getIdAnio(){
        return $this->idAnio;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setFin($fin){
        $this->fin = $fin;
    }
    
    public function getFin(){
        return $this->fin;
    }
    
    public function setInicio($inicio){
        $this->inicio = $inicio;
    }
    
    public function getInicio(){
        return $this->inicio;
    }
   
}

?>
