<?php

require_once('../../dao/conexion.php');
require_once('../../dao/encargado.php');


class sql_encargado{
    
    public function __construct(){
        
    }
    
    public function guardarEncargado($objeto){
        $Conexion = conectar_bd();
        $Conexion->conectarse();
        
        $Conexion->ejecutar("INSERT INTO enc_dependencia(nombre_completo, puesto, num_empleado, usuario, contrasenia)
        VALUES('".$objeto->getNombreCompleto()."','".$objeto->getPuesto()."','".$objeto->getNumEmpleado()."',
        '".$objeto->getUsuario()."','".$objeto->getContrasenia()."');");
        
        $Conexion->desconectarse();
    }
    
    public function eliminarEncargado($id){
        $Conexion = conectar_bd();
        $Conexion->conectarse();
        
        $Conexion->ejecutar("DELETE FROM enc_dependencia WHERE id = ".$id.";");
        
        $Conexion->desconectarse();
    }
    
   /* public function guardarUsuario($objeto1){
        $Conexion = conectar_bd();
        $Conexion->conectarse();
        
        $Conexion->ejecutar("INSERT INTO usuarios (privilegios, usuario, contrasenia) 
        VALUES(privilegios= ".$objeto1->getPrivilegios().", usuario = '".$objeto1->getUsuario()."', contrasenia = '".$objeto1->getPass()."');");
        
        $Conexion->desconectarse();
    }*/
    
    public function listarEncargados(){
        
        $encargados = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();
        
        $lista_encargados = $Conexion->ejecutar("SELECT id, nombre_completo, puesto, num_empleado FROM enc_dependencia ORDER BY nombre_completo;");
        $i = 0;
        while($renglon = mysql_fetch_array($lista_encargados)){
            $objeto = new encargado();
            $objeto->setId($renglon['id']);
            $objeto->setNombreCompleto($renglon['nombre_completo']);
            $objeto->setPuesto($renglon['puesto']);
            $objeto->setNumEmpleado($renglon['num_empleado']);
            
            array_push($encargados, $objeto);
        }
        
        $Conexion->desconectarse();
        return $encargados;
    }
    
    
    public function listarEncargadosBuscados($nombre){
        
        $encargados = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();
        
        $lista_encargados = $Conexion->ejecutar("SELECT id, nombre_completo, puesto, num_empleado FROM enc_dependencia WHERE nombre_completo like '%" .$nombre. "%' ORDER BY nombre_completo;");
        $i = 0;
        while($renglon = mysql_fetch_array($lista_encargados)){
            $objeto = new encargado();
            $objeto->setId($renglon['id']);
            $objeto->setNombreCompleto($renglon['nombre_completo']);
            $objeto->setPuesto($renglon['puesto']);
            $objeto->setNumEmpleado($renglon['num_empleado']);
            
            array_push($encargados, $objeto);
        }
        
        $Conexion->desconectarse();
        return $encargados;
    }
    
    public function seleccionarEncargado($ide){
        
        $encargados = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();
        
        $lista_encargados = $Conexion->ejecutar("SELECT id, nombre_completo, usuario, contrasenia, puesto, num_empleado FROM enc_dependencia WHERE id = '".$ide."';");
        $i = 0;
        while($renglon = mysql_fetch_array($lista_encargados)){
            $objeto = new encargado();
            $objeto->setId($renglon['id']);
            $objeto->setNombreCompleto($renglon['nombre_completo']);
            $objeto->setUsuario($renglon['usuario']);
            $objeto->setContrasenia($renglon['contrasenia']);
            $objeto->setPuesto($renglon['puesto']);
            $objeto->setNumEmpleado($renglon['num_empleado']);
            
            array_push($encargados, $objeto);
        }
        
        $Conexion->desconectarse();
        return $encargados;
    }
    
    public function actualizarEncargado($objeto){
        $Conexion = conectar_bd();
        $Conexion->conectarse();
        
        $Conexion->ejecutar("UPDATE enc_dependencia set nombre_completo = '" .$objeto->getNombreCompleto()."',usuario ='" .$objeto->getUsuario()."',
        contrasenia= '" .$objeto->getContrasenia(). "',puesto ='" .$objeto->getPuesto(). "', num_empleado = " .$objeto->getNumEmpleado(). " WHERE id = " .$objeto->getid(). ";");
        
        $Conexion->desconectarse();
    }
    
    public function listarDependencias(){
        $dependencias = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();
        
        $lista_dependencias = $Conexion->ejecutar("SELECT nombre FROM dependencia order by nombre;");
        $i = 0;
        while($renglon = mysql_fetch_array($lista_dependencias)){
            $objeto = new dependencia();
            $objeto->setnombre($renglon['nombre']);
            
            array_push($dependencias, $objeto);
        }
        $Conexion->desconectarse();
        return $dependencias;
        
    }
}
?>