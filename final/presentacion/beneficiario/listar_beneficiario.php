<?php

/*
 *
 *TRM
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

        $view->DatosBeneficiario = $msql_beneficiario->MostrarBeneficiario("1");
        $view->contentTemplate = "../../presentacion/beneficiario/FRM_mod_beneficiario.php";
        break;

    case 'Save_Beneficiario':
        $view->disableLayout = true;

        $idbeneficiario = "1";
        $nombre = strval($_POST['nombre']);
        $apaterno = strval($_POST['aPaterno']);
        $amaterno = strval($_POST['aMaterno']);
        $rfc = strval($_POST['rfc']);
        $curp = strval($_POST['curp']);
        $estado = strval($_POST['estado']);
        
        $objeto = new beneficiario();
        $objeto->setId($idbeneficiario);
        $objeto->setNombre($nombre.",".$apaterno.",".$amaterno);
        $objeto->setRfc($rfc);
        $objeto->setCurp($curp);


        $msql_beneficiario->UpdateBeneficiario($objeto);
        $view->DatosBeneficiario = $msql_beneficiario->MostrarBeneficiario(1);
        $view->contentTemplate = "../../presentacion/beneficiario/FRM_mod_beneficiario.php";
        break;

    case 'ActualizarBeneficiario':
        $view->disableLayout = false;
        $view->DatosBeneficiario = $msql_beneficiario->MostrarBeneficiario(1);
        $view->contentTemplate = "../../presentacion/beneficiario/FRM_mod_beneficiario.php";
        
        break;


    default:
}

if ($view->disableLayout == true) {
    include_once ($view->contentTemplate);
} else {
    include_once ('../../presentacion/layoutC.php');
} // el layout incluye el template adentro

?>
