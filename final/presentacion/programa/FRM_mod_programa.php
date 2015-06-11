<h2><?php echo $view->label; ?></h2>
<form name="frm_mod_dependencia" id="frm_mod_dependencia" method="POST" action=" ">
    <div class="bar">
        <table>
            <?php
            foreach ($view->ListaPrograma as $mDocente):
                ?>
				<tr>
                    <td>
                        Id programa:
                        <input type="text" id="id" name="id" size="12" readonly="readonly" value="<?php echo $mDocente->getid_programa(); ?>"/>
                    </td>
                </tr>
               <tr>
                <td>
                    Nombre del programa:
                      <input type="text" id="nombre" name="nombre" size="30"value="<?php echo $mDocente->getnombre_programa(); ?>"/>
				</td>
            </tr>  	
			<tr>
				<td>
				Descripcion:
					<input type="text" id="desc" name="desc" size="30" value="<?php echo $mDocente->getdescripcion(); ?>"/>
				</td>
			</tr>
			<tr>
                <td>
                     Caracteristicas:
                    <input type="text" id="caracte" name="caracte" size="50" value="<?php echo $mDocente->getcaracteristicas(); ?>"/></td>
            </tr>
			 <tr>
                <td>
                    Estatus:
                    <input type="text" id="estatus" name="estatus" size="50"value="<?php echo $mDocente->getestatus(); ?>"/></td>
            </tr>
			 <tr>
                <td>
                         Monto:
                    <input type="text" id="monto" name="monto" size="50" value="<?php echo $mDocente->getmonto(); ?>"/></td>
            </tr>
			 <tr>
                <td>
                     Categoria:
                    <input type="text" id="cat" name="cat" size="50" value="<?php echo $mDocente->getcategoria(); ?>"/></td>
            </tr>
			 <tr>
                <td>
                      Convocatoria:
                    <input type="text" id="conv" name="conv" size="50" value="<?php echo $mDocente->getconvocatoria(); ?>"/></td>
            </tr>
			   <?php
                endforeach;
            ?>
        </table>
    </div>
    <div class="buttonsBar">
        <a id="updateH" class="button" href="javascript:void(0);">Guardar cambios</a>
        <a id="cancel" class="button" href="javascript:void(0);">Regresar</a>
    </div>
</form>