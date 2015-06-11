<form name="frm_listAnioFiscal" id="frm_listAnioFiscal">
    <div class="bar">
        <table>
            <tr>  
                <td>  
                    Fecha de inicio:
                    <input type="date" name="inicio">
                </td>
            </tr>
            <tr>  
                <td>  
                    Fecha de fin:
                    <input type="date" name="fin">
                </td>
            </tr>
            <tr>
                <td>
                    <a id="altaAnio" class="button" href="javascript:void(0);">Agregar A&ntilde;o</a>
                </td>
            </tr>
        </table>
    </div>
    <table>
        <thead>
            <tr>
                <th>A&ntilde;o</th>
                <th>Fecha inicio</th>
                <th>Fecha fin</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($view->ListaAnios as $mAnio):
                ?>               
                <tr>
                    <td><?php echo $mAnio->getNombre(); ?></td>
                    <td><?php echo $mAnio->getInicio(); ?></td>
                    <td><?php echo $mAnio->getFin(); ?></td>
                    <td><a class="select_eanio" href="javascript:void(0);" data-idd="<?php echo $mAnio->getIdAnio(); ?>" data-nombre="<?php echo $mAnio->getNombre();?>">Eliminar</a></td>
                </tr>
                <?php
            endforeach;
            ?>    
        </tbody>
    </table>
</form>

