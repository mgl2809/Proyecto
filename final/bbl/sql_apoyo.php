<?php

/**
 *
 * @Clase para validar el acceso al sistema. "sql_acceso.php"
 * @versión: 0.1      @modificado:   15 de Abril del 2013
 * @autor: JMST
 *
 */
include_once("../../dao/conexion2.php");
include_once("../../dao/apoyo.php");

class sql_dependencia {

    public function __construct() {
        
    }

    //mostrar todos los docentes del sistema
    public function ListarDocentes() {


        $docentes = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $lista_docentes = $Conexion->ejecutar("select * from apoyo");
        $i = 0;
        while ($renglon = mysql_fetch_array($lista_docentes)) {
            $objeto = new apoyo();
            $objeto->setid($renglon['id']);
            $objeto->setnombre_proyecto($renglon['nombre_proyecto']);
            $objeto->setmonto($renglon['monto']);
			$objeto->setid_programa($renglon['id_programa']);
			$objeto->setid_dependencia($renglon['id_dependencia']);

            array_push($docentes, $objeto);
        }

        $Conexion->desconectarse();
        return $docentes;
    }

    public function ListarDocentesBuscados($nombre) {


        $docentes = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $lista_docentes = $Conexion->ejecutar("select id_dependencia, nombre, ubicacion, responsable from dependencia where nombre like '%" . $nombre . "%';");
        $i = 0;
        while ($renglon = mysql_fetch_array($lista_docentes)) {
            $objeto = new dependencia();
            $objeto->setid($renglon['id_dependencia']);
            $objeto->setnombre($renglon['nombre']);
			$objeto->setresponsable($renglon['ubicacion']);
			$objeto->setidusuario($renglon['responsable']);
            array_push($docentes, $objeto);
        }

        $Conexion->desconectarse();
        return $docentes;
    }

    public function BusacarDocente($id) {

        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $docentes = $Conexion->ejecutar("SELECT id_dependencia, nombre, ubicacion, responsable FROM dependencia where nombre = '" . $id . "';");


        if ($renglon = mysql_fetch_array($docentes)) {
            $objeto = new dependencia();
             $objeto->setnombre($renglon['nombre']);
        }

        $Conexion->desconectarse();
        return $objeto;
    }

    //seleccionar docente para modificar
    public function SelectDocente($id) {

        $docentes = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $list_docentes = $Conexion->ejecutar("SELECT id, nombre_proyecto, id_dependencia, id_programa, monto, estatus FROM apoyo where id = '" . $id . "';");
        
        while ($renglon = mysql_fetch_array($list_docentes)){
            $objeto = new apoyo();
			 $objeto->setid($renglon['id']);
            $objeto->setnombre_proyecto($renglon['nombre_proyecto']);
            $objeto->setmonto($renglon['monto']);
			$objeto->setid_programa($renglon['id_programa']);
			$objeto->setid_dependencia($renglon['id_dependencia']);
			          
            array_push($docentes, $objeto);
        }

        $Conexion->desconectarse();
        return $docentes;
    }

    //registrar un nuevo docente
    public function SaveDocente($mDocente) {
		$Conexion = conectar_bd();
        $Conexion->conectarse();
			
     	$Conexion->ejecutar("INSERT INTO apoyo (nombre_proyecto, monto, id_programa, id_dependencia) VALUES('" . $mDocente->getnombre_proyecto() . "','" . $mDocente->getmonto() . "','" . $mDocente->getid_programa() . "','" . $mDocente->getid_dependencia() . "');");
		
		$Conexion->desconectarse();
    }

    //borrar un docente
    public function DeleteDocente($id) {

        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $Conexion->ejecutar("DELETE FROM dependencia where id_dependencia = " . $id . ";");

        $Conexion->desconectarse();
    }

    //modificar los datos de un docente
    public function UpdateDocente($objeto) {

        $Conexion = conectar_bd();
        $Conexion->conectarse();
		$Conexion->ejecutar("UPDATE dependencia set nombre= '".$objeto->getnombre()."', ubicacion = '".$objeto->getresponsable()."', responsable ='".$objeto->getidusuario()."' where id_dependencia = " .$objeto->getid().";");
		$Conexion->desconectarse();
    }

}

?>
