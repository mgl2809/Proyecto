<form name="frm_dependencia" id="frm_dependencia" method="POST" action=" ">
    <?php
    echo "<input type='hidden' name='idd' value='" . $view->idd . "'/>";
    ?>
    <div class="bar">
        <table>	
            <tr>
                <td>
                    Nombre del proyecto:
                      <input type="text" id="nombre" name="nombre" size="30" />
				</td>
            </tr>  	
			<tr>
				<td>
					Monto:
					<input type="text" id="ub" name="ub" size="30"/>
				</td>
			</tr>
			<tr>
				<td>
				</td>
			</tr>
            <td>
                        Nombre del programa:
                        <select name="select1">
							<option value="Certificación PSP">Certificación PSP</option>
							
						</select>                 
                    </td>
			<tr>
                <td>
                    Dependencia:
                       <select name="select2">
							<option value="Mexico First">Mexico First</option>
							
						</select>                 
                    </td>
            <tr>
                <td>
                    <div class="buttonsBar">
                        <a id="saveAp" class="button" href="javascript:void(0);">Guardar</a>
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
                    Buscar Proyecto:
                    <input type="text" name="nombre_enc" class="nombre_enc" id="nombre_en"size="40"/> 
                    <a id="buscarE" class="button" href="javascript:void(0);">Buscar</a>
                </td>
            </tr>  
        </table>
    </div>
    <table>
        <thead>
            <tr>
				 <th>Id Apoyo </th>
                <th>Nombre del proyecto</th>
                <th>Nombre del Programa</th>
                <th>Dependencia</th>
				<th>Monto</th>
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
					 <td><?php echo $mDocente->getnombre_proyecto(); ?></td>
                    <td><?php echo $mDocente->getid_programa(); ?></td>
                    <td><?php echo $mDocente->getid_dependencia(); ?></td>
                    <td><?php echo "$ ".number_format($mDocente->getmonto(), 2, ',', ' '); ?></td>
					
                    <td><a class="select_ap" href="javascript:void(0);" data-idd="<?php echo $mDocente->getid(); ?>" data-nombre="<?php echo $mDocente->getid_programa();?>">Modificar</a></td>
                    <td><a class="select_ed" href="javascript:void(0);" data-idd="<?php echo $mDocente->getid(); ?>" data-nombre="<?php echo $mDocente->getid_programa();?>">Eliminar</a></td>
                </tr>
                <?php
                $i++;
            endforeach;
            ?>    
        </tbody>
    </table>
</form>

