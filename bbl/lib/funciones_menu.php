<?php

function Menu_administrador()
{

$menu[1]['texto']= "Consultar";
$menu[1]['link']= "../../presentacion/beneficiario/listar_programas.php";

$menu[2]['texto']= "Modificar informaci&oacute;n";
$menu[2]['link']= "../../presentacion/beneficiario/listar_beneficiario.php";


$menu[3]['link']="../acceso/logout.php";
$menu[3]['texto']="Salir";

$menu[1]['estatus']=" class='current' ";
return $menu;
}


?>

