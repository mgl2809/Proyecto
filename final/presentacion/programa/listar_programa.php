<?php

require_once ('../../bbl/sql_programa.php');
require_once ('../../dao/programa2.php');

$action = 'index';
if (isset($_POST['action'])) {
    $action = $_POST['action'];
}

$msql_docente = new sql_programa();

$view = new stdClass();
$view = new stdClass(); //clase estandard para contener la vista
$view->disableLayout = false; //se usa o no el layout, si no lo usa imprime directamente el template

switch ($action) {
    case 'index':

        $view->ListaPrograma = $msql_docente->ListarDocentes();
        $view->contentTemplate = "../../presentacion/programa/programaGrid.php";
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
        $descripcion = strval($_POST['descripcion']);
		$caracteristicacs = strval($_POST['caracteristicacs']);
		$categoria = strval($_POST['categoria']);
		$estatus = strval($_POST['estatus']);
        $monto = strval($_POST['monto']);
		$convocatoria = strval($_POST['convocatoria']);

        $objeto = new programa2();
        $objeto->setnombre_programa($name);
        $objeto->setdescripcion($descripcion);
		$objeto->setcaracteristicas($caracteristicacs);
		$objeto->setcategoria($categoria);
		$objeto->setestatus($estatus);
        $objeto->setmonto($monto);
		$objeto->setconvocatoria($convocatoria);


        $msql_docente->SaveDocente($objeto);
        $view->ListaPrograma = $msql_docente->ListarDocentes();
        $view->contentTemplate = "../../presentacion/programa/programaGrid.php";
        break;

    case 'Eliminar_Dependencia':
        $view->disableLayout = true;
        $idd = intval($_POST['id_programa']);

        $msql_docente->DeleteDocente($idd);
        $view->ListaPrograma = $msql_docente->ListarDocentes();
        $view->contentTemplate = "../../presentacion/programa/programaGrid.php";
        break;

    case 'ModificarDocente':
        $view->disableLayout = true;
        $id = intval($_POST['id']);

        $msql_docente->SelectDocente($id);
        $view->label = 'Modificar Programa';
        $view->ListaPrograma = $msql_docente->SelectDocente($id);
        $view->contentTemplate = "../../presentacion/programa/FRM_mod_programa.php";
        break;

    case 'ActualizarDocente':
        $view->disableLayout = true;
		$id_programa = intval ($_POST['id_programa']);
		$name = strval($_POST['nombre']);
        $descripcion = strval($_POST['descripcion']);
		$caracteristicacs = strval($_POST['caracteristicacs']);
		$categoria = strval($_POST['categoria']);
		$estatus = strval($_POST['estatus']);
        $monto = strval($_POST['monto']);
		$convocatoria = strval($_POST['convocatoria']);

        $objeto = new programa2();
		$objeto->setid_programa($id_programa);
        $objeto->setnombre_programa($name);
        $objeto->setdescripcion($descripcion);
		$objeto->setcaracteristicas($caracteristicacs);
		$objeto->setcategoria($categoria);
		$objeto->setestatus($estatus);
        $objeto->setmonto($monto);
		$objeto->setconvocatoria($convocatoria);
				
        $msql_docente->UpdateDocente($objeto);
        $view->ListaPrograma = $msql_docente->ListarDocentes();
        $view->contentTemplate = "../../presentacion/programa/programaGrid.php";
        break;

    case 'Buscar_d':
        $view->disableLayout = true;
     	$name = strval($_POST['nombre']);
        		
        $view->ListaPrograma = $msql_docente->ListarDocentesBuscados($name);
		$view->contentTemplate = "../../presentacion/programa/programaGrid.php";
        break;

    default:
}

if ($view->disableLayout == true) {
    include_once ($view->contentTemplate);
} else {
    include_once ('../../presentacion/layoutC.php');
} // el layout incluye el template adentro

?>
