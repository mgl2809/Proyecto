<?php

function Menu_administrador()
{

$menu[1]['texto']= "Consultar";
$menu[1]['link']= "../../presentacion/beneficiario/listar_programas.php";

$menu[3]['texto']= "Reporte Programas";
$menu[3]['link']= "../../presentacion/reportes/reporte_programas.php";

$menu[4]['texto']= "Reporte Dependencias";
$menu[4]['link']= "../../presentacion/reportes/reporte_dependencias.php";

$menu[5]['texto']= "Programa";
$menu[5]['link']= "../../presentacion/programa/listar_programa.php";

$menu[6]['texto']= "Beneficiario";
$menu[6]['link']= "../../presentacion/beneficiario/listar_beneficiario.php";

$menu[7]['texto']= "Dependencia";
$menu[7]['link']= "../../presentacion/dependencia/listar_dependencia.php";


return $menu;
}


?>

