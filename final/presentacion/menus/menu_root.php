<?php
/*Verificamos que haya ingresado al sistema*/
session_start();
if($_SESSION[access]==true) {

}
else{

    echo $_SESSION[access];
   
   header('Location:../acceso/no_acceso.php');
}

?>

<?php
include ("../../bbl/lib/funciones_estilo.php");
include ("../../bbl/lib/funciones_menu.php");
$titulo="SCE - Opciones para Administrador";
$menu=Menu_administrador();

Inicio_estilo_CSS($titulo, $menu);

echo "<h3>Bienvenido ".$_COOKIE['nombre_usuario']."</h3><br>";

	Fin_estilo_CSS();
?>
