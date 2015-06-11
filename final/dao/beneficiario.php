<?php
class beneficiario{
    
    private $id;
    private $nombre;
    private $rfc;
    private $curp;
    private $usuario;
    private $pass;
    private $privilegio;
    private $estatus;
    
    public function __construct(){
        
    }
    public function setId($id){
        $this->id = $id; 
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function setNombre($nombre){
        $this->nombre = $nombre;        
    }
    
    public function getNombre(){
        return $this->nombre;
    }
    
    public function setRfc($rfc){
        $this->rfc = $rfc;
    }
    
    public function getRfc(){
        return $this->rfc;
    }
    
    public function setCurp($curp){
        $this->curp = $curp;
    }
    
    public function getCurp(){
        return $this->curp;
    }
    
    public function setUsuario($usuario){
        $this->usuario= $usuario;
    }
    
    public function getUsuario(){
        return $this->usuario;
    }
    
    
    public function setPass($contrasenia){
        $this->pass= $contrasenia;
    }
    
    public function getPass(){
        return $this->pass;
    }
    
    public function setPrivilegio($priv){
        $this->privilegio= $priv;
    }
    
    public function getPrivilegio(){
        return $this->privilegio;
    }
    
    public function setEstatus($estatus){
        $this->estatus= $estatus;
    }
    
    public function getEstatus(){
        return $this->estatus;
    }
    
}
