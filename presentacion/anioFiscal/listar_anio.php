<?php

/*
* To change this template, choose Tools | Templates
* and open the template in the editor.
*/

require_once ('../../bbl/sql_anioFiscal.php');
require_once ('../../dao/anioFiscal.php');

$action = 'index';
if (isset($_POST['action'])) {
    $action = $_POST['action'];
}

$msql_anio = new sql_anioFiscal();

$view = new stdClass();
$view = new stdClass(); //clase estandard para contener la vista
$view->disableLayout = false; 

switch ($action) {
    case 'index':

        $view->ListaAnios = $msql_anio->MostrarAnio();
        $view->contentTemplate = "../../presentacion/anioFiscal/anioGrid.php";
        break;

    case 'AgregarAnio':
        $view->disableLayout = true;
        $view->label = 'Agregar A&ntilde;o';
        $view->idd = $idd;
        $view->contentTemplate = "../../presentacion/anioFiscal/FRM_anio.php";
        break;

    case 'Save_Anio':
        $view->disableLayout = true;
        $nombre = strval($_POST['nombre']);
        $fInicio = strval ($_POST['inicio']);
        $fFinal = strval($_POST['fin']);

        $objeto = new anioFiscal();
        $objeto->setNombre($nombre);
        $objeto->setInicio($fInicio);
        $objeto->setFin($fFinal);


        $msql_anio->SaveAnio($objeto);
        $view->ListaAnios = $msql_anio->MostrarAnio();
        $view->contentTemplate = "../../presentacion/anioFiscal/anioGrid.php";
        break;

    case 'EliminarAnio':
        $view->disableLayout = true;
        $idd = intval($_POST['id']);

        $msql_anio->DeleteAnio($idd);
        $view->ListaAnios = $msql_anio->MostrarAnio();
        $view->contentTemplate = "../../presentacion/anioFiscal/anioGrid.php";
        break;


    default:
}

if ($view->disableLayout == true) {
    include_once ($view->contentTemplate);
} else {
    include_once ('../../presentacion/layoutC.php');
} // el layout incluye el template adentro

?>
