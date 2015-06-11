<form name="frm_bene" id="frm_bene" method="POST" action=" ">
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
                    <input type="password" id="contraseñia" name="contrasenia" class="contrasenia" size="20"/>                
                </td>            
            </tr>
            <tr>
                <td>
                    CURP:
                    <input type="text" id="curp" name="curp" class="curp" size="20"/></td>           
            </tr>
            <tr>
                <td>
                    RFC:
                    <input type="text" id="rfc" name="rfc" class="rfc" size="10"/>                
                </td>
            </tr>
            <tr>
                <td>
                    <div class="buttonsBar">
                        <a id="saveB" class="button" href="javascript:void(0);">Guardar</a>
                    </div>                                
                </td>
            </tr>
        </table>
    </div>    
</form>
<form name="frm_listabene" id="frm_listabene">
    <div class="bar">
        <table>
            <tr>  
                <td>
                    Buscar beneficiario por nombre:
                    <input type="text" name="nombre_ben" class="nombre_ben" id="nombre_ben"size="40"/> 
                    <a id="buscarB" class="button" href="javascript:void(0);">Buscar</a>
                </td>
            </tr>  
        </table>
    </div>
    <table>
        <thead>
            <tr>
                
				<th>Id_beneficiario</th>
                <th>Nombre</th>
                <th>CURP</th>
                <th>RFC</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($view->ListaBeneficiarios as $mBeneficiario):            
            ?>               
                <tr>
                    
                    <td><?php echo $mBeneficiario->getId();?></td>
                    <td><?php echo $mBeneficiario->getNombre(); ?></td>
                    <td><?php echo $mBeneficiario->getCurp(); ?></td>                    
                    <td><?php echo $mBeneficiario->getRfc(); ?></td>
                    <td><a class="select_eb" href="javascript:void(0);" data-id = "<?php echo $mBeneficiario->getId();?>">Eliminar</a></td>
                </tr>
                <?php
                $i++;
            endforeach;
            ?>    
        </tbody>
    </table>
</form>


