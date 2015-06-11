<?php

class apoyo
{

    private $id;
    private $nombre_proyecto;
    private $monto;
	private $id_programa;
	private $id_dependencia;

    public function __construct(){

    }
    public function setnombre_proyecto($nombre_proyecto){
        $this->nombre_proyecto = $nombre_proyecto;
    }
    public function getnombre_proyecto(){
        return $this->nombre_proyecto;
    }
	public function setmonto($monto){
        $this->monto = $monto;
    }
	public function getmonto(){
        return $this->monto;
    }
    public function setid($id1){
        $this->id = $id1;
    }
	public function getid(){
        return $this->id;
    }
    public function setid_programa($id_programa){
        $this->id_programa = $id_programa;
    }
	public function getid_programa(){
        return $this->id_programa;
    }
	public function setid_dependencia($id_dependencia){
        $this->id_dependencia = $id_dependencia;
    }
	public function getid_dependencia(){
        return $this->id_dependencia;
    }
	
    

}

?>
