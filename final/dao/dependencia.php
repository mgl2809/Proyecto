<?php

class dependencia
{

    private $id;
    private $nombre;
    private $ubicacion;
	private $responsable;

    public function __construct(){

    }
    public function setidusuario($ubicacion){
        $this->ubicacion = $ubicacion;
    }
    public function getidusuario(){
        return $this->ubicacion;
    }
	public function setresponsable($responsable){
        $this->responsable = $responsable;
    }
	public function getresponsable(){
        return $this->responsable;
    }
    public function setid($id1){
        $this->id = $id1;
    }
	public function getid(){
        return $this->id;
    }
    public function setnombre($nombre1){
        $this->nombre = $nombre1;
    }
	public function getnombre(){
        return $this->nombre;
    }
	
    

}

?>
