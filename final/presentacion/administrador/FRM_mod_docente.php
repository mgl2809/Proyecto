<h2><?php echo $view->label; ?></h2>
<form name="frm_mod_docente" id="frm_mod_docente" method="POST" action=" ">
    <div class="bar">
        <table>
            <?php
            foreach ($view->ListaDocentes as $mDocente):
                ?>
                <tr>
                    <td>
                        Id docente:
                        <input type="text" id="id" name="id" size="12" readonly="readonly" value="<?php echo $mDocente->getid(); ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Id usuario:
                        <input type="text" id="idusuario" name="idusuario" size="12" value="<?php echo $mDocente->getidusuario(); ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Nombre:
                        <input type="text" id="nombre" name="nombre" class="nombre" size="50" value="<?php echo $mDocente->getnombre(); ?>" />
                    </td>
                </tr>
                <?php
                endforeach;
            ?>
        </table>
    </div>
    <div class="buttonsBar">
        <a id="updateD" class="button" href="javascript:void(0);">Guardar cambios</a>
        <a id="cancel" class="button" href="javascript:void(0);">Regresar</a>
    </div>
</form>