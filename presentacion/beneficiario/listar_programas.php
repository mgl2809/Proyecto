<?php

/*
* To change this template, choose Tools | Templates
* and open the template in the editor.
*/

require_once ('../../bbl/sql_beneficiario.php');
require_once ('../../dao/beneficiario.php');

$action = 'index';
if (isset($_POST['action'])) {
    $action = $_POST['action'];
}

$msql_beneficiario = new sql_beneficiario();

$view = new stdClass(); //clase estandard para contener la vista
$view->disableLayout = false; //se usa o no el layout, si no lo usa imprime directamente el template

switch ($action) {
    case 'index':
        $view->ListaProgramas = $msql_beneficiario->ListaProgramas("1");
        $view->contentTemplate = "../../presentacion/beneficiario/programasGrid.php";
        break;

    case 'mostrar_programa':

        $view->disableLayout = true;
         
        $view->ListaProgramas = $msql_beneficiario->ListaProgramas("1", intval($_POST['id']));
        $view->contentTemplate = "../../presentacion/beneficiario/FRM_detalles_programa.php";
        
        break;


    default:
}

if ($view->disableLayout == true) {
    include_once ($view->contentTemplate);
} else {
    include_once ('../../presentacion/layoutC.php');
} // el layout incluye el template adentro

?>
