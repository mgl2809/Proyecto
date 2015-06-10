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
			$objeto->setidBeneficiario($renglon['id_beneficiario']);
            $objeto->setnombre($renglon['nombre_completo']);
            $objeto->setrfc($renglon['rfc']);
            $objeto->setcurp($renglon['curp']);
			$objeto->setEstatus($renglon['estatus']);
			$objeto->setMotivo($renglon['motivo']);
            
            array_push($beneficiario, $objeto);
        }

        $Conexion->desconectarse();
        return $beneficiario;
    }
	
	//modificar beneficiario
    public function UpdateBeneficiario($objeto) {

        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $Conexion->ejecutar("UPDATE beneficiario set nombre_completo='" . $objeto->getnombre() .
							"', rfc = '" . $objeto->getrfc() . "', curp = '" . $objeto->getcurp() . "'
					where id_beneficiario = " . $objeto->getidBeneficiario() . ";");

        $Conexion->desconectarse();
    }
	
	//modificar beneficiario
    public function UpdateBeneficiarioEstatus($objeto) {

        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $Conexion->ejecutar("UPDATE beneficiario set nombre_completo='" . $objeto->getnombre() .
							"', rfc = '" . $objeto->getrfc() . "', curp = '" . $objeto->getcurp() .
							"', estatus = '".$objeto->getEstatus().
							"', motivo = '".$objeto->getMotivo()."' 
					where id_beneficiario = " . $objeto->getidBeneficiario() . ";");

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


}

?>
