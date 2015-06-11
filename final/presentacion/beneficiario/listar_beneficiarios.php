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

$view = new stdClass();
$view = new stdClass(); //clase estandard para contener la vista
$view->disableLayout = false; //se usa o no el layout, si no lo usa imprime directamente el template

switch ($action) {
    case 'index':

        $view->ListaBeneficiarios = $msql_beneficiario->listarBeneficiarios(" ");
        $view->contentTemplate = "../../presentacion/beneficiario/beneficiarioGrid.php";
        break;

/*    case 'AgregarEncargado':

        // limpio todos los valores antes de guardarlos
        // por ls dudas venga algo raro
        $view->disableLayout = true;
        $view->label = 'Agregar Encargado';
        $view->idd = $idd;
        $view->contentTemplate = "../../presentacion/encargado/FRM_encargado.php";
        break;*/

    case 'SaveBeneficiario':
        $view->disableLayout = true;
        //$id = intval($_POST['id']);
        $nombre = strval($_POST['nombre']);
		$ap_paterno = strval($_POST['ap_paterno']);
		$ap_materno = strval($_POST['ap_materno']);
        $usuario = strval($_POST['usuario']);
        $contrasenia = strval ($_POST['contrasenia']);
        //$priv = intval($_POST['privilegios']);
        $curp = strval ($_POST['curp']);
        $rfc = strval ($_POST['rfc']);
        $nombre_com = $nombre." ".$ap_paterno." ".$ap_materno;

        //$objeto = new beneficiario();
        
        //$objeto->setId($id);
        $objeto->setNombre($nombre." ".$ap_paterno." ".$ap_materno);  
        $objeto->setRfc($rfc);       
        $objeto->setCurp($curp);
              
        //$objeto1 = new beneficiario();
        $objeto->setUsuario($usuario);
        $objeto->setPass($contrasenia);
       // $objeto->setPrivilegio($priv);
        
        $msql_beneficiario->guardarBeneficiario1($objeto);
        //$msql_beneficiario->guardarUsuario($objeto1);
        $view->ListaBeneficiarios = $msql_beneficiario->listarBeneficiarios();
        $view->contentTemplate = "../../presentacion/beneficiario/beneficiarioGrid.php";
        break;

    case 'EliminarBeneficiario':
        $view->disableLayout = true;
        $id = intval($_POST['id']);

        $msql_beneficiario->deleteBeneficiario($id);
        $view->ListaBeneficiarios = $msql_beneficiario->listarBeneficiarios(" ");
        $view->contentTemplate = "../../presentacion/beneficiario/beneficiarioGrid.php";
        break;

   case 'Buscar_encargado':
        $view->disableLayout = true;
        $nombre = strval($_POST['nombre']);

        $view->ListaEncargados = $msql_encargado->listarEncargadosBuscados($nombre);
        $view->contentTemplate = "../../presentacion/encargado/encargadoGrid.php";
        break;

    default:
        $view->disableLayout = true;
        $view->contenTemplate = "../../registro.html";
	break;
}

if ($view->disableLayout == true) {
    include_once ($view->contentTemplate);
} else {
    include_once ('../../presentacion/layoutC.php');
} // el layout incluye el template adentro

?>
