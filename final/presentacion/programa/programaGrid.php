<form name="frm_dependencia" id="frm_dependencia" method="POST" action=" ">
    <?php
    echo "<input type='hidden' name='idd' value='" . $view->idd . "'/>";
    ?>
    <div class="bar">
        <table>	
            <tr>
                <td>
                   Nombre del programa:
                      <input type="text" id="nombre" name="nombre" size="30" />
				</td>
            </tr>  	
			<tr>
				<td>
					Descripcion:
					<input type="text" id="desc" name="desc" size="30"/>
				</td>
			</tr>
			<tr>
				<td>
				</td>
			</tr>
            <tr>
                 <td>
                    Caracteristicas:
                    <input type="text" id="caracte" name="caracte" size="50" /></td>
            </tr>
			<tr>
                 <td>
                    Estatus:
                    <input type="text" id="estatus" name="estatus" size="50" /></td>
            </tr>
			<tr>
                <td>
                           Monto:
                    <input type="text" id="monto" name="monto" size="50" /></td>
            </tr>
			<tr>
                <td>
                         Categoria:
                    <input type="text" id="cat" name="cat" size="50" /></td>
            </tr>
            <tr>
                <td>
                           Convocatoria:
                    <input type="text" id="conv" name="conv" size="50" /></td>
            </tr>
            
			<tr>
			
                <td>
                    <div class="buttonsBar">
                        <a id="savePro" class="button" href="javascript:void(0);">Guardar</a>
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
                    Buscar programa por nombre:
                    <input type="text" name="nombre_prog" class="nombre_enc" id="nombre_prog"size="40"/> 
                    <a id="buscarEst" class="button" href="javascript:void(0);">Buscar</a>
                </td>
            </tr>  
        </table>
    </div>
    <table>
        <thead>
            <tr>
				 <th>Id programa </th>
                <th>Nombre del programa</th>
                <th>Descripcion</th>
                <th>Caracteristicas</th>
                <th>Categoria</th>
                <th>Monto</th>
				<th>Estatus</th>
				<th>Convocatoria</th>
				<th>Modificar</th>
				<th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
			 foreach ($view->ListaPrograma as $mDocente):            
            ?>               
                <tr>
                    <td><?php echo $mDocente->getid_programa(); ?></td>
                    <td><?php echo $mDocente->getnombre_programa(); ?></td>
					<td><?php echo $mDocente->getdescripcion(); ?></td>
                     <td><?php echo $mDocente->getcaracteristicas(); ?></td>
					 <td><?php echo $mDocente->getcategoria(); ?></td>
					 <td><?php echo $mDocente->getmonto(); ?></td>
					  <td><?php echo $mDocente->getestatus(); ?></td>
					   <td><?php echo $mDocente->getconvocatoria(); ?></td>
					   
                    <td><a class="select_modpr" href="javascript:void(0);" data-idd="<?php echo $mDocente->getid_programa(); ?>" data-nombre="<?php echo $mDocente->getnombre_programa();?>">Modificar</a></td>
                    <td><a class="select_prog" href="javascript:void(0);" data-idd="<?php echo $mDocente->getid_programa(); ?>" data-nombre="<?php echo $mDocente->getnombre_programa();?>">Eliminar</a></td>
                </tr>
                <?php
                $i++;
            endforeach;
            ?>    
        </tbody>
    </table>
</form>

