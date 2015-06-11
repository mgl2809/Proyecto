<?php

require_once ('../../bbl/sql_apoyo.php');
require_once ('../../dao/apoyo.php');

$action = 'index';
if (isset($_POST['action'])) {
    $action = $_POST['action'];
}

$msql_docente = new sql_dependencia();

$view = new stdClass();
$view = new stdClass(); //clase estandard para contener la vista
$view->disableLayout = false; //se usa o no el layout, si no lo usa imprime directamente el template

switch ($action) {
    case 'index':
//ListaDocentes -> ListaDependencia
        $view->ListaDependencia = $msql_docente->ListarDocentes();
        $view->contentTemplate = "../../presentacion/apoyo/apoyoGrid.php";
        break;

    case 'AltaDependencia':

        // limpio todos los valores antes de guardarlos
        // por ls dudas venga algo raro
        $view->disableLayout = true;
        $view->label = 'Alta Dependencia';
        $view->idd = $idd;
        $view->contentTemplate = "../../presentacion/apoyo/FRM_apoyo.php";
        break;

    case 'Save_Dependencia':
        $view->disableLayout = true;
	
        $name = strval($_POST['nombre_proyecto']);
        $monto = strval($_POST['monto']);
		$resp = strval($_POST['nombre_programa']);
		$resp2 = strval($_POST['dependencia']);

        $objeto = new apoyo();
        $objeto->setnombre_proyecto($name);
        $objeto->setmonto($monto);
		$objeto->setid_programa($resp);
		$objeto->setid_dependencia($resp2);
      

        $msql_docente->SaveDocente($objeto);
        $view->ListaDependencia = $msql_docente->ListarDocentes();
        $view->contentTemplate = "../../presentacion/apoyo/apoyoGrid.php";
        break;

    case 'Eliminar_Dependencia':
        $view->disableLayout = true;
        $idd = intval($_POST['id']);

        $msql_docente->DeleteDocente($idd);
        $view->ListaDependencia = $msql_docente->ListarDocentes();
        $view->contentTemplate = "../../presentacion/apoyo/apoyoGrid.php";
        break;

    case 'ModificarDocente':
        $view->disableLayout = true;
        $id = intval($_POST['id']);

        $msql_docente->SelectDocente($id);
        $view->label = 'Modificar Apoyo';
        $view->ListaDependencia = $msql_docente->SelectDocente($id);
        $view->contentTemplate = "../../presentacion/apoyo/FRM_mod_apoyo.php";
        break;

    case 'ActualizarDocente':
        $view->disableLayout = true;
        $name = strval($_POST['nombre_proyecto']);
        $monto = strval($_POST['monto']);
		$resp = strval($_POST['nombre_programa']);
		$resp = strval($_POST['dependencia']);

        $objeto = new apoyo();
        $objeto->setnombre_proyecto($name);
        $objeto->setmonto($monto);
		$objeto->setnombre_programa($nombre_programa);
		$objeto->setdependencia($dependencia);

        $msql_docente->UpdateDocente($objeto);
        $view->ListaDependencia = $msql_docente->ListarDocentes();
        $view->contentTemplate = "../../presentacion/apoyo/apoyoGrid.php";
        break;

    case 'Buscar_d':
        $view->disableLayout = true;
        $name = strval($_POST['nombre_proyecto']);
        $monto = strval($_POST['monto']);
		$resp = strval($_POST['nombre_programa']);
		$resp = strval($_POST['dependencia']);
		
		
        $view->ListaDependencia = $msql_docente->ListarDocentesBuscados($nombre);
		$view->contentTemplate = "../../presentacion/apoyo/apoyoGrid.php";
		break;
		
	  case 'Consultar':
        $view->disableLayout = true;
        $resp = strval($_POST['id']);
		
        $view->ListaDependencia = $msql_docente->Selectlist($resp);
		$view->contentTemplate = "../../presentacion/Apoyo/dependenciaGrid.php";
        break;

    default:
}

if ($view->disableLayout == true) {
    include_once ($view->contentTemplate);
} else {
    include_once ('../../presentacion/layoutC.php');
} // el layout incluye el template adentro

?>
