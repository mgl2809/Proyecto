<h2><?php echo $view->label; ?></h2>
<form name="frm_mod_dependencia" id="frm_mod_dependencia" method="POST" action=" ">
    <div class="bar">
        <table>
            <?php
            foreach ($view->ListaDependencia as $mDocente):
                ?>
				<tr>
                    <td>
                        Id Dependencia:
                        <input type="text" id="id" name="id" size="12" readonly="readonly" value="<?php echo $mDocente->getid(); ?>"/>
                    </td>
                </tr>
               <tr>
                <td>
                    Nombre de la Dependencia:
                      <input type="text" id="nombre" name="nombre" size="30" value="<?php echo $mDocente->getnombre(); ?>"/>
				</td>
            </tr>  	
			<tr>
				<td>
					Ubicacion:
					<input type="text" id="ub" name="ub" size="30" value="<?php echo $mDocente->getresponsable(); ?>" />
				</td>
			</tr>
			<tr>
				<td>
				</td>
			</tr>
            <tr>
                <td>
                    Responsable:
                    <input type="text" id="responsable" name="responsable" size="50" value="<?php echo $mDocente->getidusuario(); ?>" /></td>
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