<?php

require_once ('../../bbl/sql_dependencia.php');
require_once ('../../dao/dependencia.php');

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
        $view->contentTemplate = "../../presentacion/dependencia/dependenciaGrid.php";
        break;

    case 'AltaDependencia':

        // limpio todos los valores antes de guardarlos
        // por ls dudas venga algo raro
        $view->disableLayout = true;
        $view->label = 'Alta Dependencia';
        $view->idd = $idd;
        $view->contentTemplate = "../../presentacion/dependencia/FRM_dependencia.php";
        break;

    case 'Save_Dependencia':
        $view->disableLayout = true;
        $name = strval($_POST['nombre']);
        $ubicacion = strval($_POST['ubicacion']);
		$resp = strval($_POST['responsable']);

        $objeto = new dependencia();
        $objeto->setidusuario($name);
        $objeto->setnombre($ubicacion);
		$objeto->setresponsable($resp);


        $msql_docente->SaveDocente($objeto);
        $view->ListaDependencia = $msql_docente->ListarDocentes();
        $view->contentTemplate = "../../presentacion/dependencia/dependenciaGrid.php";
        break;

    case 'Eliminar_Dependencia':
        $view->disableLayout = true;
        $idd = intval($_POST['id']);

        $msql_docente->DeleteDocente($idd);
        $view->ListaDependencia = $msql_docente->ListarDocentes();
        $view->contentTemplate = "../../presentacion/dependencia/dependenciaGrid.php";
        break;

    case 'ModificarDocente':
        $view->disableLayout = true;
        $id = intval($_POST['id']);

        $msql_docente->SelectDocente($id);
        $view->label = 'Modificar Dependencia';
        $view->ListaDependencia = $msql_docente->SelectDocente($id);
        $view->contentTemplate = "../../presentacion/dependencia/FRM_mod_dependencia.php";
        break;

    case 'ActualizarDocente':
        $view->disableLayout = true;
        $id = intval($_POST['id']);
        $nombre = strval($_POST['nombre']);
		$ubicacion = strval($_POST['ubicacion']);
		$idusuario = strval($_POST['responsable']);

        $objeto = new dependencia();
        $objeto->setid($id);
        $objeto->setidusuario($idusuario);
        $objeto->setnombre($nombre);
		$objeto->setresponsable($ubicacion);

        $msql_docente->UpdateDocente($objeto);
        $view->ListaDependencia = $msql_docente->ListarDocentes();
        $view->contentTemplate = "../../presentacion/dependencia/dependenciaGrid.php";
        break;

    case 'Buscar_d':
        $view->disableLayout = true;
        $resp = strval($_POST['id_dependencia']);
		$nombre = strval($_POST['nombre']);
		$ubicacion = strval($_POST['ubicacion']);
		$resp = strval($_POST['responsable']);
		
		
        $view->ListaDependencia = $msql_docente->ListarDocentesBuscados($nombre);
		$view->contentTemplate = "../../presentacion/dependencia/dependenciaGrid.php";
        break;

    default:
}

if ($view->disableLayout == true) {
    include_once ($view->contentTemplate);
} else {
    include_once ('../../presentacion/layoutC.php');
} // el layout incluye el template adentro

?>
