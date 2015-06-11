<?php

/**
 *
 * @Clase para modificar los datos del beneficiario
 * @versión: 0.1 
 * @autor: TRM
 *
 */
include_once("../../dao/conexion.php");
include_once("../../dao/beneficiario.php");
include_once("../../dao/programa.php");

class sql_beneficiario {

    public function __construct() {
        
    }

    //muestra los datos del beneficiario
    public function MostrarBeneficiario($id) {


        $beneficiario = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $info_beneficiario = $Conexion->ejecutar("select * from beneficiario where id_beneficiario = ".$id);
        $i = 0;
        while ($renglon = mysql_fetch_array($info_beneficiario)) {
            $objeto = new beneficiario();
			$objeto->setId($renglon['id_beneficiario']);
            $objeto->setNombre($renglon['nombre_completo']);
            $objeto->setRfc($renglon['rfc']);
            $objeto->setCurp($renglon['curp']);
			$objeto->setEstatus($renglon['estatus']);
			
            array_push($beneficiario, $objeto);
        }

        $Conexion->desconectarse();
        return $beneficiario;
    }
	
	//modificar beneficiario
    public function UpdateBeneficiario($objeto) {

        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $Conexion->ejecutar("UPDATE beneficiario set nombre_completo='" . $objeto->getNombre() .
							"', rfc = '" . $objeto->getRfc() . "', curp = '" . $objeto->getCurp() . "'
					where id_beneficiario = " . $objeto->getId() . ";");

        $Conexion->desconectarse();
    }
	
	//modificar beneficiario
    public function UpdateBeneficiarioEstatus($objeto) {

        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $Conexion->ejecutar("UPDATE beneficiario set nombre_completo='" . $objeto->getNombre() .
							"', rfc = '" . $objeto->getRfc() . "', curp = '" . $objeto->getCurp() .
							"', estatus = '".$objeto->getEstatus().
					"' where id_beneficiario = " . $objeto->getId() . ";");

        $Conexion->desconectarse();
    }

    //regresa los programas de un beneficiario
    public function ListaProgramas($idBeneficiario,$idPrograma) {
		$programa = array();
		
        $Conexion = conectar_bd();
        $Conexion->conectarse();
		if($idPrograma){
			$info_programa = $Conexion->ejecutar("SELECT * FROM programa, programabeneficiario, dependencia WHERE programa.id_programa = programabeneficiario.id_programa and
								programa.dependencia_id_dependencia = dependencia.id_dependencia and programabeneficiario.id_beneficiario = 1 and
								programabeneficiario.idPB = ".$idPrograma);
			
		}else{
			$info_programa = $Conexion->ejecutar("SELECT * FROM programa, programabeneficiario, dependencia WHERE programa.id_programa = programabeneficiario.id_programa and
												 programa.dependencia_id_dependencia = dependencia.id_dependencia and programabeneficiario.id_beneficiario = 1");	
		}
       
		while ($renglon = mysql_fetch_array($info_programa)) {
            $objeto = new programa();
			$objeto->setId($renglon['idPB']);
			$objeto->setidPrograma($renglon['id_programa']);
            $objeto->setNombrePrograma($renglon['nombre_programa']);
            $objeto->setDescripcion($renglon['descripcion']);
            $objeto->setCaracteristicas($renglon['caracteristicas']);
            $objeto->setMonto($renglon['monto']);
			$objeto->setEstatus($renglon['estatus']);
			$objeto->setNombre($renglon['nombre']);
           
            array_push($programa, $objeto);
        }

        $Conexion->desconectarse();
        return $programa;
    }

	public function guardarBeneficiario1($objeto){
        $Conexion = conectar_bd();
        $Conexion->conectarse();
        
        $Conexion->ejecutar("INSERT INTO beneficiario (nombre_completo, rfc, curp, usuario, contrasenia) VALUES ('".$objeto->getNombre()."',
        '".$objeto->getRfc()."','".$objeto->getCurp()."','".$objeto->getUsuario()."','".$objeto->getPass()."');");
        
        $Conexion->desconectarse();
    }
    

    
    public function listarBeneficiarios(){
        
        $beneficiarios = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();
        
        $lista_beneficiarios = $Conexion->ejecutar("SELECT id_beneficiario, nombre_completo, rfc, curp 
         FROM beneficiario ORDER BY nombre_completo;");
        $i = 0;
        while($renglon = mysql_fetch_array($lista_beneficiarios)){
            $objeto = new beneficiario();
            $objeto->setId($renglon['id_beneficiario']);
            $objeto->setNombre($renglon['nombre_completo']);
            $objeto->setRfc($renglon['rfc']);
            $objeto->setCurp($renglon['curp']);
            
            array_push($beneficiarios, $objeto);
        }
        
        $Conexion->desconectarse();
        return $beneficiarios;
    }
    
    public function deleteBeneficiario($id){
        $Conexion = conectar_bd();
        $Conexion->conectarse();
        
        $Conexion->ejecutar("DELETE FROM beneficiario WHERE id_beneficiario = ".$id.";");
        
        $Conexion->desconectarse();
    }
}

?>
