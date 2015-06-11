<?php

/**
 *
 * @Clase para modificar los datos del beneficiario
 * @versión: 0.1 
 * @autor: TRM
 *
 */
include_once("../../dao/conexion.php");
include_once("../../dao/reportes.php");
include_once("../../dao/programa.php");
include_once("../../dao/dependencia.php");

class sql_reportes {

    public function __construct() {
        
    }

    //muestra los tipos de programas
    public function MostrarTipos() {


        $tipos = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $info_tipos = $Conexion->ejecutar("select * from programa");
        $i = 0;
        while ($renglon = mysql_fetch_array($info_tipos)) {
            $objeto = new programa();
            $objeto->setidPrograma($renglon['id_programa']);
            $objeto->setNombrePrograma($renglon['nombre_programa']);
            
            array_push($tipos, $renglon['nombre_programa']);
        }

        $Conexion->desconectarse();
        return $tipos;
    }
	
	//muestra los tipos de programas
    public function MostrarDependencias() {


        $tipos = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $info_tipos = $Conexion->ejecutar("select * from dependencia");
        $i = 0;
		
        while ($renglon = mysql_fetch_array($info_tipos)) {
            array_push($tipos, $renglon['nombre']);
        }

        $Conexion->desconectarse();
        return $tipos;
    }
	
	//regresa un arreglo con los montos de los programas
	public function RegresaMontos(){
		$montos = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $list_montos = $Conexion->ejecutar("SELECT sum(programabeneficiario.monto)as monto from dependencia
			left JOIN programa on dependencia.id_dependencia = programa.dependencia_id_dependencia
			LEFT join programabeneficiario on programabeneficiario.id_programa = programa.id_programa
			group BY id_dependencia;");
        
        while ($renglon = mysql_fetch_array($list_montos)){
			
            array_push($montos, ($renglon['monto']!=null)?intval($renglon['monto']):0);
			
			
        }
		
        $Conexion->desconectarse();
        return $montos;
	}
	
	//muestra programas por tipo
    public function MostrarEstatus($estatus,$idPrograma) {

        $programas = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();
		if($dependencia!=null){

			$list_programas = $Conexion->ejecutar("SELECT count(dependencia.id_dependencia) as total from dependencia
			left JOIN programa on dependencia.id_dependencia = programa.dependencia_id_dependencia
			LEFT join programabeneficiario on programabeneficiario.id_programa = programa.id_programa
			and programabeneficiario.estatus = '".$estatus."' where id_dependencia = '".
			$dependencia."' group BY id_dependencia");
		}else{
			$list_programas = $Conexion->ejecutar("SELECT count(dependencia.id_dependencia) as total from dependencia
			left JOIN programa on dependencia.id_dependencia = programa.dependencia_id_dependencia
			LEFT join programabeneficiario on programabeneficiario.id_programa = programa.id_programa
			and programabeneficiario.estatus = '" . $estatus . "' 
			group BY id_dependencia;");
		}
        
        
        while ($renglon = mysql_fetch_array($list_programas)){
            array_push($programas, $renglon['total']);
			
        }

        $Conexion->desconectarse();
        return $programas;
    }
	
	//muestra programas por tipo
    public function MostrarPorPrograma($estatus) {

        $programas = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();
		
		$list_programas = $Conexion->ejecutar("SELECT count(programabeneficiario.id_programa) as total from programa
						left JOIN programabeneficiario on
						programa.id_programa = programabeneficiario.id_programa and
						programabeneficiario.estatus = '".$estatus."' GROUP by programa.id_programa");
        
        
        while ($renglon = mysql_fetch_array($list_programas)){
            array_push($programas, $renglon['total']);
			
        }

        $Conexion->desconectarse();
        return $programas;
    }

    //regresa los programas de un beneficiario
   public function MostrarTiposDependencia() {


        $tipos = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $info_tipos = $Conexion->ejecutar("select * from programas");
        $i = 0;
        while ($renglon = mysql_fetch_array($info_tipos)) {
            $objeto = new programa();
            $objeto->setidPrograma($renglon['id_programa']);
            $objeto->setNombrePrograma($renglon['nombre_programa']);
            
            array_push($tipos, $objeto);
        }

        $Conexion->desconectarse();
        return $tipos;
    }


}

?>
