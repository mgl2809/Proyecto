<form name="frm_listprogramas" id="frm_listprogramas">
    <table>
        <thead>
            <tr>
                <th>Programa</th>
                <th>Dependencia</th>
                <th>Monto</th>
                <th>Estatus</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($view->ListaProgramas as $mPrograma):
                ?>               
                <tr>
                    <td><a class="select_programa" href="javascript:void(0);" data-idd="<?php echo $mPrograma->getId(); ?>" ><?php echo $mPrograma->getNombrePrograma();?></a></td>
                    <td><?php echo $mPrograma->getNombre(); ?></td>
                    <td><?php echo $mPrograma->getMonto(); ?></td>
                    <td><?php echo $mPrograma->getEstatus(); ?></td>
                </tr>
                <?php
            endforeach;
            ?>    
        </tbody>
    </table>
</form>
