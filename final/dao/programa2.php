<?php

class programa2
{

    private $id_programa;
    private $nombre_programa;
    private $descripcion;
	private $caracteristicas;
	private $categoria;
	private $monto;
	private $estatus;
	private $convocatoria;

    public function __construct(){

    }
    public function setdescripcion($descripcion){
        $this->descripcion = $descripcion;
    }
    public function getdescripcion(){
        return $this->descripcion;
    }
	public function setcaracteristicas($caracteristicas){
        $this->caracteristicas = $caracteristicas;
    }
	public function getcaracteristicas(){
        return $this->caracteristicas;
    }
    public function setid_programa($id_programa){
        $this->id_programa = $id_programa;
    }
	public function getid_programa(){
        return $this->id_programa;
    }
    public function setnombre_programa($nombre_programa){
        $this->nombre_programa = $nombre_programa;
    }
	public function getnombre_programa(){
        return $this->nombre_programa;
    }
	public function setcategoria($categoria){
        $this->categoria = $categoria;
    }
	public function getcategoria(){
        return $this->categoria;
    }
	public function setmonto($monto){
        $this->monto = $monto;
    }
	public function getmonto(){
        return $this->monto;
    }
	public function setestatus($estatus){
        $this->estatus = $estatus;
    }
	public function getestatus(){
        return $this->estatus;
    }
	public function setconvocatoria($convocatoria){
        $this->convocatoria = $convocatoria;
    }
	public function getconvocatoria(){
        return $this->convocatoria;
    }
	
    
}

?>
