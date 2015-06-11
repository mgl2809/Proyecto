<?php

/*
* To change this template, choose Tools | Templates
* and open the template in the editor.
*/

require_once ('../../bbl/sql_dependencia.php');
require_once ('../../dao/dependencia.php');

$action = 'index';
if (isset($_POST['action'])) {
    $action = $_POST['action'];
}

$msql_docente = new sql_docente();

$view = new stdClass();
$view = new stdClass(); //clase estandard para contener la vista
$view->disableLayout = false; //se usa o no el layout, si no lo usa imprime directamente el template

switch ($action) {
    case 'index':

        $view->ListaDocentes = $msql_docente->ListarDocentes();
        $view->contentTemplate = "../../presentacion/docentes/docenteGrid.php";
        break;

    case 'AgregarDocente':

        // limpio todos los valores antes de guardarlos
        // por ls dudas venga algo raro
        $view->disableLayout = true;
        $view->label = 'Agregar Docente';
        $view->idd = $idd;
        $view->contentTemplate = "../../presentacion/docentes/FRM_docente.php";
        break;

    case 'Save_Docente':
        $view->disableLayout = true;
        $idusuario = intval($_POST['idusuario']);
        $nombre = strval($_POST['nombre']);

        $objeto = new docente();
        $objeto->setidusuario($idusuario);
        $objeto->setnombre($nombre);


        $msql_docente->SaveDocente($objeto);
        $view->ListaDocentes = $msql_docente->ListarDocentes();
        $view->contentTemplate = "../../presentacion/docentes/docenteGrid.php";
        break;

    case 'EliminarDocente':
        $view->disableLayout = true;
        $idd = intval($_POST['id']);

        $msql_docente->DeleteDocente($idd);
        $view->ListaDocentes = $msql_docente->ListarDocentes();
        $view->contentTemplate = "../../presentacion/docentes/docenteGrid.php";
        break;

    case 'ModificarDocente':
        $view->disableLayout = true;
        $id = intval($_POST['id']);

        $msql_docente->SelectDocente($id);
        $view->label = 'Modificar Docente';
        $view->ListaDocentes = $msql_docente->SelectDocente($id);
        $view->contentTemplate = "../../presentacion/docentes/FRM_mod_docente.php";
        break;

    case 'ActualizarDocente':
        $view->disableLayout = true;
        $id = intval($_POST['id']);
        $idusuario = intval($_POST['idusuario']);
        $nombre = strval($_POST['nombre']);

        $objeto = new docente();
        $objeto->setid($id);
        $objeto->setidusuario($idusuario);
        $objeto->setnombre($nombre);

        $msql_docente->UpdateDocente($objeto);
        $view->ListaDocentes = $msql_docente->ListarDocentes();
        $view->contentTemplate = "../../presentacion/docentes/docenteGrid.php";
        break;

    case 'Buscar_d':
        $view->disableLayout = true;
        $nombre = strval($_POST['nombre']);

        $view->ListaDocentes = $msql_docente->ListarDocentesBuscados($nombre);
        $view->contentTemplate = "../../presentacion/docentes/docenteGrid.php";
        break;

    default:
}

if ($view->disableLayout == true) {
    include_once ($view->contentTemplate);
} else {
    include_once ('../../presentacion/layoutC.php');
} // el layout incluye el template adentro

?>
