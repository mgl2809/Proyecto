<form name="frm_listprogramas" id="frm_listprogramas">
    <table>
        <thead>
            <tr>
                <th>Programa</th>
                <th>Dependencia</th>
                <th>Monto</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($view->ListaProgramas as $mPrograma):
                ?>               
                <tr>
                    <td><a class="select_programa" href="javascript:void(0);" data-idd="<?php echo $mPrograma->getId(); ?>" ><?php echo $mPrograma->getNombrePrograma();?></a></td>
                    <td><?php echo $mPrograma->getNombre(); ?></td>
                    <td><?php echo "$ ".number_format($mPrograma->getMonto(), 2, '.', ' '); ?></td>
                </tr>
                <?php
            endforeach;
            ?>    
        </tbody>
    </table>
</form>
