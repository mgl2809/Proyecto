<h2><?php echo $view->label; ?></h2>
<form name="frm_mod_dependencia" id="frm_mod_dependencia" method="POST" action=" ">
    <div class="bar">
        <table>
            <?php
            foreach ($view->ListaDependencia as $mDocente):
                ?>
				<tr>
                    <td>
                        Nombre del proyecto:
                        <input type="text" id="id" name="id" size="12" readonly="readonly" value="<?php echo $mDocente->getnombre_proyecto(); ?>"/>
                    </td>
                </tr>
               <tr>
                <td>
                    Monto:
                      <input type="text" id="nombre" name="nombre" value="<?php echo $mDocente->getmonto(); ?>"/>
				</td>
            </tr>  	
			<tr>
				<td>
					Nombre del programa:
					 <select name="select1">
							<option value="Certificación PSP">Certificación PSP</option>
							
						</select>                 
				</td>
			</tr>
			<tr>
				<td>
					Dependencia:
					 <select name="select2">
							<option value="Mexico First">Mexico First</option>
							
						</select> 
				</td>
			</tr>
			<tr>
				<td>
				</td>
			</tr>
                         <?php
                endforeach;
            ?>
        </table>
    </div>
    <div class="buttonsBar">
        <a id="updateAP" class="button" href="javascript:void(0);">Guardar cambios</a>
        <a id="cancel" class="button" href="javascript:void(0);">Regresar</a>
    </div>
</form>