<?php

/*
* TRM
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
        $view->contentTemplate = "../../presentacion/beneficiario/FRM_mod_estatus_beneficiario.php";
        break;

    case 'Save_Beneficiario':
        $view->disableLayout = true;

        $idbeneficiario = intval($_POST['idBeneficiario']);
        $nombre = strval($_POST['nombre']);
        $apaterno = strval($_POST['aPaterno']);
        $amaterno = strval($_POST['aMaterno']);
        $rfc = strval($_POST['rfc']);
        $curp = strval($_POST['curp']);
        $estatus = strval($_POST['estatus']);
        $motivo = strval($_POST['motivo']);
        
        $objeto = new beneficiario();
        $objeto->setId($idbeneficiario);
        $objeto->setNombre($nombre.",".$apaterno.",".$amaterno);
        $objeto->setRfc($rfc);
        $objeto->setCurp($curp);
        $objeto->setEstatus($estatus);


        $msql_beneficiario->UpdateBeneficiarioEstatus($objeto);
        $view->DatosBeneficiario = $msql_beneficiario->MostrarBeneficiario(1);
        $view->contentTemplate = "../../presentacion/beneficiario/FRM_mod_estatus_beneficiario.php";
        break;

    case 'ActualizarBeneficiario':
        $view->disableLayout = false;
        $view->DatosBeneficiario = $msql_beneficiario->MostrarBeneficiario(1);
        $view->contentTemplate = "../../presentacion/beneficiario/FRM_mod_estatus_beneficiario.php";
        
        break;


    default:
}

if ($view->disableLayout == true) {
    include_once ($view->contentTemplate);
} else {
    include_once ('../../presentacion/layoutC.php');
} // el layout incluye el template adentro

?>
