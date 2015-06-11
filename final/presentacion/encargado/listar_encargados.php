<?php

/*
* To change this template, choose Tools | Templates
* and open the template in the editor.
*/

require_once ('../../bbl/sql_encargado.php');
require_once ('../../dao/encargado.php');

$action = 'index';
if (isset($_POST['action'])) {
    $action = $_POST['action'];
}

$msql_encargado = new sql_encargado();

$view = new stdClass();
$view = new stdClass(); //clase estandard para contener la vista
$view->disableLayout = false; //se usa o no el layout, si no lo usa imprime directamente el template

switch ($action) {
    case 'index':

        $view->ListaEncargados = $msql_encargado->listarEncargados(" ");
        $view->contentTemplate = "../../presentacion/encargado/encargadoGrid.php";
        break;

    case 'AgregarEncargado':

        // limpio todos los valores antes de guardarlos
        // por ls dudas venga algo raro
        $view->disableLayout = true;
        $view->label = 'Agregar Encargado';
        $view->idd = $idd;
        $view->contentTemplate = "../../presentacion/encargado/FRM_encargado.php";
        break;

    case 'SaveEncargado':
        $view->disableLayout = true;
        $nombre = strval($_POST['nombre']);
        $paterno = strval($_POST['paterno']);
        $materno = strval($_POST['materno']);
        $puesto = strval($_POST['puesto']);
        $numero = intval($_POST['numero']);
        $usuario = strval($_POST['usuario']);
        $pass = strval($_POST['pass']);

        $objeto = new encargado();
        $objeto->setNombreCompleto($nombre." "+$paterno+" "+$materno);
        $objeto->setPuesto($puesto);
        $objeto->setNumEmpleado($numero);
        $objeto->setUsuario($usuario);
        $objeto->setContrasenia($pass);
               
        $msql_encargado->guardarEncargado($objeto);
        $view->ListaEncargados = $msql_encargado->listarEncargados(" ");
        $view->contentTemplate = "../../presentacion/encargado/encargadoGrid.php";
        break;

    case 'EliminarEncargado':
        $view->disableLayout = true;
        $id = intval($_POST['id']);

        $msql_encargado->eliminarEncargado($id);
        $view->ListaEncargados = $msql_encargado->listarEncargados(" ");
        $view->contentTemplate = "../../presentacion/encargado/encargadoGrid.php";
        break;

    case 'ModificarEncargado':
        $view->disableLayout = true;
        $id = intval($_POST['id']);

        $msql_encargado->seleccionarEncargado($id);
        $view->label = 'Modificar Encargado';
        $view->ListaEncargados = $msql_encargado->seleccionarEncargado($id);
        $view->contentTemplate = "../../presentacion/encargado/FRM_mod_encargado.php";
        break;

    case 'ActualizarEncargado':
        $view->disableLayout = true;
        $id = intval($_POST['id']);
        $nombre = strval($_POST['nombre']);
        $usuario = strval($_POST['usuario']);
        $contrasenia = strval($_POST['contrasenia']);
        $puesto = strval($_POST['puesto']);
        $num_empleado = intval($_POST['num_emp']);

        $objeto = new encargado();
        $objeto->setId($id);
        $objeto->setNombreCompleto($nombre);
        $objeto->setUsuario($usuario);
        $objeto->setContrasenia($contrasenia);
        $objeto->setPuesto($puesto);
        $objeto->setNumEmpleado($num_empleado);

        $msql_encargado->actualizarEncargado($objeto);
        $view->ListaEncargados = $msql_encargado->listarEncargados();
        $view->contentTemplate = "../../presentacion/encargado/encargadoGrid.php";
        break;

    case 'Buscar_encargado':
        $view->disableLayout = true;
        $nombre = strval($_POST['nombre']);

        $view->ListaEncargados = $msql_encargado->listarEncargadosBuscados($nombre);
        $view->contentTemplate = "../../presentacion/encargado/encargadoGrid.php";
        break;

    default:
        //$view->disableLayout = true;
        //$view->contenTemplate = "../../registro.html";
	break;
}

if ($view->disableLayout == true) {
    include_once ($view->contentTemplate);
} else {
    include_once ('../../presentacion/layoutC.php');
} // el layout incluye el template adentro

?>
