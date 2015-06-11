<?php

/**
 *
 * @Clase para modificar los datos del anio fiscal
 * @versión: 0.1 
 * @autor: TRM
 *
 */
include_once("../../dao/conexion.php");
include_once("../../dao/anioFiscal.php");

class sql_anioFiscal {

    public function __construct() {
        
    }

    //muestra los datos del beneficiario
    public function MostrarAnio() {


        $anio = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $info_anio = $Conexion->ejecutar("select * from anio_fiscal");
        $i = 0;
        while ($renglon = mysql_fetch_array($info_anio)) {
            $objeto = new anioFiscal();
            $objeto->setidAnio($renglon['idanio_fiscal']);
            $objeto->setNombre($renglon['nombre']);
            $objeto->setInicio($renglon['fecha_inicio']);
            $objeto->setFin($renglon['fecha_fin']);
            
            array_push($anio, $objeto);
        }

        $Conexion->desconectarse();
        return $anio;
    }
	
	//seleccionar anio para modificar
    public function SelectAnio($id) {

        $anios = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $list_anios = $Conexion->ejecutar("SELECT * FROM anio_fiscal where idanio_fiscal = '" . $id . "';");
        
        while ($renglon = mysql_fetch_array($list_anios)){
            $objeto = new anioFiscal();
            $objeto->setIdAnio($renglon['idanio_fiscal']);
            $objeto->setNombre($renglon['nombre']);
            $objeto->setInicio($renglon['fecha_inicio']);
			$objeto->setFin($renglon['fecha_fin']);

            array_push($anios, $objeto);
        }

        $Conexion->desconectarse();
        return $anios;
    }

    //registrar un nuevo anio
    public function SaveAnio($mAnio) {

        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $Conexion->ejecutar("INSERT INTO anio_fiscal (fecha_inicio ,fecha_fin ,nombre) VALUES('" . $mAnio->getInicio() . "','" . $mAnio->getFin() . "','" . $mAnio->getNombre() . "');");

        $Conexion->desconectarse();
    }

    //borrar un anio
    public function DeleteAnio($id) {

        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $Conexion->ejecutar("DELETE FROM anio_fiscal where idanio_fiscal = " . $id . ";");

        $Conexion->desconectarse();
    }

    //modificar los datos de un anio
    public function UpdateAnio($objeto) {

        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $Conexion->ejecutar("UPDATE anio_fiscal set nombre='" . $objeto->getNombre() .
							"', fecha_inicio = " . $objeto->getInicio() .
							", fecha_fin = ". $objeto->getFin() .
							" where idanio_fiscal = " . $objeto->getIdAnio() . ";");

        $Conexion->desconectarse();
    }

}

?>
