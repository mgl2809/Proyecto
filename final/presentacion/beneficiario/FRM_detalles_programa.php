<h2><?php echo $view->label; ?></h2>
<form name="frm_detalles_programa" id="frm_detalles_programa" method="POST" action=" ">
    <div class="bar">
        <table>
            <?php
            foreach ($view->ListaProgramas as $mPrograma):
                ?>
                <tr>
                    <td>
                        Nombre del programa:                        

                        <?php echo $mPrograma->getNombrePrograma(); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Descripci&oacute;n:

                        <?php echo $mPrograma->getDescripcion(); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Caracter&iacute;sticas: 

                        <?php echo $mPrograma->getCaracteristicas(); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Monto:
                        <?php echo "$ ".number_format($mPrograma->getMonto(), 2, '.', ' '); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Estatus:
                        <img width="22" height="22"  src="../../bbl/lib/images/<?php echo $mPrograma->getEstatus(); ?>.png" />
                    </td>
                </tr>
                <tr>
                    <td>
                        Dependencia:
                         <?php echo $mPrograma->getNombre(); ?>
                    </td>
                </tr>
                <?php
                endforeach;
            ?>
        </table>
    </div>
    <div class="buttonsBar">
        <a id="cancel" class="button" href="javascript:void(0);">Regresar</a>
    </div>
</form>