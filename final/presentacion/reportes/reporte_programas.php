<?php

/**
 * Autor: Tania Reyes
 * 
 *
 */

require_once('../../presentacion/reportes/grafica2.php');
require_once ('../../bbl/sql_reportes.php');
require_once ('../../dao/reportes.php');


$action = 'index';
if (isset($_POST['action'])) {
    $action = $_POST['action'];
}

$msql_reportes = new sql_reportes();

$view = new stdClass();

$view->disableLayout = false; 

switch ($action) {
    case 'index':

       // $view->ListaTipos = $msql_reportes->MostrarTipos();
        $view->ArrEstatus1 = $msql_reportes->MostrarPorPrograma(1);
        $view->ArrEstatus2 = $msql_reportes->MostrarPorPrograma(2);
        $view->ArrEstatus3 = $msql_reportes->MostrarPorPrograma(3);
        $view->ArrTitulos = $msql_reportes->MostrarTipos();
        $view->contentTemplate = "../../presentacion/reportes/reporteProgramasGrid.php";
        break;
    
    
}

if ($view->disableLayout == true) {
    include_once ($view->contentTemplate);
} else {
    include_once ('../../presentacion/layoutC.php');
} // el layout incluye el template adentro

?>
