<?php

function Inicio_estilo_CSS($titulo, $menu) {
    ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html>
        <head>
            <title>SCB Sistema de Control de Beneficiarios</title>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <!-- incluyo la libreria jQuery -->
            <script type="text/javascript" src="../../bbl/lib/jquery-1.7.1.min.js"></script>
            <!-- incluyo el archivo que tiene mis funciones javascript -->
            <script type="text/javascript" src="../../bbl/lib/functions.js"></script>
            <!-- incluyo el framework css , blueprint. -->
            <link rel="stylesheet" type="text/css" href="../../bbl/lib/screen.css" />
            <!-- incluyo mis estilos css -->
            <link rel="stylesheet" type="text/css" href="../../bbl/lib/style.css" />
        </head>
        <body>
            <div id ="block"></div>
            <div class="container">
                <h1 class="title"> <?php echo $titulo ?></h1>
                <div id='menucontainer'>
                    <div id='menunav'>
                        <ul>
                            <?php
//Generar menu
                            foreach ($menu as $elemento)
                                echo"<li><a href='" . $elemento['link'] . "' " . $elemento['estatus'] . "><span>" . $elemento['texto'] . "</span></a></li>";

                            echo "</ul>
        </div>
        </div>
        <div id='popupbox'>
        </div>
        <div id='content'>
            <?php include_once ($view->contentTemplate); // incluyo el template que corresponda ?> ";
                        }

                        function Fin_estilo_CSS() {
                            echo "		
			</div>
   
</body>
</html>";
                        }
                        ?>