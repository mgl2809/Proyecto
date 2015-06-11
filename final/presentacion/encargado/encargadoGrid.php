<h2><?php echo $view->label; ?></h2>
<form name="Encargado" id="Encargado" method="POST" action=" ">
    <?php
    echo "<input type='hidden' name='idd' value='" . $view->idd . "'/>";
    ?>
    <div class="bar">
        <table>	
            <tr>
                <td>
                    Nombre:
                    <input type="text" id="nombre" name="nombre" size="30" />
				</td>
            </tr>  	
			<tr>
				<td>
					Apellido paterno:
					<input type="text" id="ap_paterno" name="ap_paterno" size="30"/>
				</td>
			</tr>
			<tr>
				<td>
					Apellido materno:
					<input type="text" id="ap_materno" name="ap_materno" size="30" />
				</td>
			</tr>
            <tr>
                <td>
                    Usuario:
                    <input type="text" id="usuario" name="usuario" class="usuario" size="30" /></td>
            </tr>
            <tr>
                <td>
                    Contrase&ntilde;a:
                    <input type="password" id="contrasenia" name="contrasenia" class="contrasenia" size="20"/>                
                </td>            
            </tr>
            <tr>
                <td>
                    Puesto:
                    <input type="text" id="puesto" name="puesto" class="puesto" size="30"/></td>           
            </tr>
            <tr>
                <td>
                    N&uacute;mero de empleado:
                    <input type="text" id="numero" name="numero" class="numero" size="10"/>                </td>
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
				<th>Id encargado</th>
                <th>Nombre</th>
                <th>Puesto</th>
                <th>Num. empleado</th>
                <th>Modificar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($view->ListaEncargados as $mEncargado):            
            ?>               
                <tr>
                    <td><?php echo $mEncargado->getId();?></td>
                    <td><?php echo $mEncargado->getNombreCompleto(); ?></td>
                    <td><?php echo $mEncargado->getPuesto(); ?></td>                    
                    <td><?php echo $mEncargado->getNumEmpleado(); ?></td>
                    <td><a class="select_me" href="javascript:void(0);" data-id = "<?php echo $mEncargado->getId();?>">Modificar</a></td>                    
                    <td><a class="select_ee" href="javascript:void(0);" data-id = "<?php echo $mEncargado->getId();?>">Eliminar</a></td>
                </tr>
                <?php
                $i++;
            endforeach;
            ?>    
        </tbody>
    </table>
</form>


