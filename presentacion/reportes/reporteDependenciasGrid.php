
<form name="frm_listprogramas" id="frm_listprogramas">
    <!--div class="bar">
        <table>
            <tr>
                <td>
                    Programa:<select name="tipoSelect">
                        <?php
                        foreach ($view->ListaTipos as $mPrograma):
                            ?>               
                             <option value="<?php echo $mPrograma->getIdPrograma(); ?>"><?php echo $mPrograma->getNombrePrograma(); ?></option>
                            <?php
                        endforeach;
                        ?>    
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                     <a id="filtrarTipo" class="button" href="javascript:void(0);">Buscar</a>
                </td>
            </tr>
        </table>
    </div-->
    <div class="bar">
        <?php
            generaGrafica1($view->ArrEstatus1,$view->ArrEstatus2,$view->ArrEstatus3,$view->ArrTitulos);

        ?>  
        <img src="../../bbl/lib/images/grafica1.jpg">
       
    </div>
     
    
</form>
