<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <title>SIC Sistema Integral de Calificaciones</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <!-- incluyo la libreria jQuery -->
        <script type="text/javascript" src="../../bbl/lib/jquery-1.7.1.min.js"></script>
        <!-- incluyo el archivo que tiene mis funciones javascript -->
		<script type="text/javascript" src="../../bbl/lib/validacion.js"></script>
		<!--incluido el script de la validacion de los campos-->
        <script type="text/javascript" src="../../bbl/lib/functionsC.js"></script>
        <!-- incluyo el framework css , blueprint. -->
        <link rel="stylesheet" type="text/css" href="../../bbl/lib/screen.css" />
        <!-- incluyo mis estilos css -->
        <link rel="stylesheet" type="text/css" href="../../bbl/lib/style.css" />
    </head>
    <body>
        <div id ="block"></div>
        <div class="container">
            <h1 class="title">SCB - Sistema de control de beneficiarios</h1>
            <div id='menucontainer'>
                <div id='menunav'>
                    <ul>
                        <?php
                        include ("../../bbl/lib/funciones_menu.php");
                        $menu = Menu_administrador();
//Generar menu
                        foreach ($menu as $elemento)
                            echo"   <li><a href='" . $elemento['link'] . "' " . $elemento['estatus'] . "><span>" . $elemento['texto'] . "</span></a></li>";
                        ?>
                    </ul>
                </div>
            </div>
            <div id="popupbox">
            </div>
            <div id="content">
                <?php include_once ($view->contentTemplate); // incluyo el template que corresponda ?>


            </div>
        </div>


    </body>
</html>