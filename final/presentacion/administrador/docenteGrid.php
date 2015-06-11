<form name="frm_listdocente" id="frm_listdocente">
    <div class="bar">
	<form name="nuevo" id ="new">
	 Nuevo cambio<input type="text" name=nombre_doc class="nombre_doc" id="nombre_doc"size="40"/> 
	</form>
        <table>
            <tr>  
                <td>  
                    Nombre del programa
                    <a id="AgregarD" class="button" href="javascript:void(0);">Agregar</a>
                </td>
                <td>
                    Buscar 
                    <input type="text" name=nombre_doc class="nombre_doc" id="nombre_doc"size="40"/> 
                    <a id="buscarD" class="button" href="javascript:void(0);">Buscar</a>
                </td>
            </tr>  
        </table>
    </div>
    <table>
        <thead>
            <tr>
                <th>Id Programa </th>
                <th>Nombre del Programa</th>
                <th>Descripción</th>
                <th>Caracteristicas</th>
                <th>Modificar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($view->ListaDocentes as $mDocente):
                ?>               
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $mDocente->getid(); ?></td>
                    <td><?php echo $mDocente->getidusuario(); ?></td>
                    <td><?php echo $mDocente->getnombre(); ?></td>
                    <td><a class="select_md" href="javascript:void(0);" data-idd="<?php echo $mDocente->getid(); ?>" data-nombre="<?php echo $mDocente->getnombre();?>">Modificar</a></td>
                    <td><a class="select_ed" href="javascript:void(0);" data-idd="<?php echo $mDocente->getid(); ?>" data-nombre="<?php echo $mDocente->getnombre();?>">Eliminar</a></td>
                </tr>
                <?php
                $i++;
            endforeach;
            ?>    
        </tbody>
    </table>
</form>

