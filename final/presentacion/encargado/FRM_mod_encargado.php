<h2><?php echo $view->label; ?></h2>
<form name="frm_mod_encargado" id="frm_mod_encargado" method="POST" action=" ">
    <div class="bar">
        <table>
            <?php
            foreach ($view->ListaEncargados as $mEncargado):
                ?>
                <tr>
                    <td>
                        Id encargado:
                        <input type="text" id="id" name="id" size="10" readonly="readonly" value="<?php echo $mEncargado->getid();?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Nombre:
                        <input type="text" id="nombre" name="nombre" size="50" value="<?php echo $mEncargado->getNombreCompleto(); ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Usuario:
                        <input type="text" id="usuario" name="usuario" size="30" value="<?php echo $mEncargado->getUsuario(); ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Contrase&ntilde;a:
                        <input type="text" id="contrasenia" name="contrasenia" class="contrasenia" size="15" value="<?php echo $mEncargado->getContrasenia(); ?>" />
                    </td>
                </tr>
                <tr>
                    <td>
                        Puesto:
                        <input type="text" id="puesto" name="puesto" class="puesto" size="30" value="<?php echo $mEncargado->getPuesto();?>"/>
                    </td>                
                </tr>
                <tr>
                    <td>
                        N&uacute;mero de empleado:
                        <input type="text" id="num_empleado" name="num_empleado" class="num_empleado" value="<?php echo $mEncargado->getNumEmpleado()?>"/>
                    </td>
                </tr>
                <?php
                endforeach;
            ?>
        </table>
    </div>
    <div class="buttonsBar">
        <a id="updateE" class="button" href="javascript:void(0);">Guardar cambios</a>
        <a id="cancel" class="button" href="javascript:void(0);">Regresar</a>
    </div>
</form>