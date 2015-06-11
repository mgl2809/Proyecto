<form name="frm_dependencia" id="frm_dependencia" method="POST" action=" ">
    <?php
    echo "<input type='hidden' name='idd' value='" . $view->idd . "'/>";
    ?>
    <div class="bar">
        <table>	
            <tr>
                <td>
                    Nombre de la Dependencia:
                      <input type="text" id="nombre" name="nombre" size="30" />
				</td>
            </tr>  	
			<tr>
				<td>
					Ubicacion:
					<input type="text" id="ub" name="ub" size="30"/>
				</td>
			</tr>
			<tr>
				<td>
				</td>
			</tr>
            <tr>
                <td>
                    Responsable:
                    <input type="text" id="responsable" name="responsable" size="50" /></td>
            </tr>
            <tr>
                <td>
                    <div class="buttonsBar">
                        <a id="saveE" class="button" href="javascript:void(0);">Guardar</a>
                    </div>                                
                </td>
            </tr>
        </table>
    </div>    
</form>
<form name="frm_listaencargado" id="frm_listaencargado">
    <div class="bar">
        <table>
            <tr>  
                <td>
                    Buscar encargado por nombre:
                    <input type="text" name="nombre_enc" class="nombre_enc" id="nombre_en"size="40"/> 
                    <a id="buscarE" class="button" href="javascript:void(0);">Buscar</a>
                </td>
            </tr>  
        </table>
    </div>
    <table>
        <thead>
            <tr>
				 <th>Id Dependencia </th>
                <th>Nombre de la Dependencia</th>
                <th>Ubicacion</th>
                <th>Responsable</th>
                <th>Modificar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
			 foreach ($view->ListaDependencia as $mDocente):            
            ?>               
                <tr>
                    <td><?php echo $mDocente->getid(); ?></td>
                    <td><?php echo $mDocente->getidusuario(); ?></td>
                    <td><?php echo $mDocente->getnombre(); ?></td>
                    <td><?php echo $mDocente->getresponsable(); ?></td>
                    <td><a class="select_md" href="javascript:void(0);" data-idd="<?php echo $mDocente->getid(); ?>" data-nombre="<?php echo $mDocente->getidusuario();?>">Modificar</a></td>
                    <td><a class="select_ed" href="javascript:void(0);" data-idd="<?php echo $mDocente->getid(); ?>" data-nombre="<?php echo $mDocente->getnombre();?>">Eliminar</a></td>
                </tr>
                <?php
                $i++;
            endforeach;
            ?>    
        </tbody>
    </table>
</form>

