<?php
class encargado {
    
    private $id;
    private $nombre_com;
    private $usuario;
    private $contrasenia;
    private $puesto;
    private $num_empleado;
    private $privilegios;

    public function __contruct(){
        
    }
    
    public function setId($id){
        $this->id = $id;
    }
    
    public function getId(){
        return $this->id;
    }

    public function setNombreCompleto($nombre_com){
        $this->nombre_com = $nombre_com;
    }
    
    public function getNombreCompleto(){
        return $this->nombre_com;
    }
    
    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }
    
    public function getUsuario(){
        return $this->usuario;
    }
    
    public function setContrasenia($contrasenia){
        $this->contrasenia = $contrasenia;
    }
    
    public function getContrasenia(){
        return $this->contrasenia;
    }
    
    public function setPuesto($puesto){
        $this->puesto = $puesto;
    }
    
    public function getPuesto(){
        return $this->puesto;
    }
    
    public function setNumEmpleado($num_empleado){
        $this->num_empleado = $num_empleado;
    }
    
    public function getNumEmpleado(){
        return $this->num_empleado;
    }
    
    public function setPrivilegios($privilegios){
        $this->privilegios = $privilegios;
    }
    
    public function getPrivilegios(){
        return $this->privilegios;
    }
}
?>


