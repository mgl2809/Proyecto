<h2><?php echo $view->label; ?></h2>
<form name="frm_mod_beneficiario" id="frm_mod_beneficiario" method="POST" action=" ">
    <div class="bar">
        <table style="vertical-align:middle">
            <?php
            foreach ($view->DatosBeneficiario as $mBeneficiario):
                ?>
                <tr>
                    <td>
                        Nombre:
                        <input type="text" id="nombre" name="nombre" class="nombre" size="50" size="12" value="<?php echo explode(",",$mBeneficiario->getNombre())[0]; ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Apellido Paterno:
                        <input type="text" id="aPaterno" name="aPaterno" class="nombre" size="30" value="<?php echo explode(",",$mBeneficiario->getNombre())[1]; ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Apellido Materno:
                        <input type="text" id="aMaterno" name="aMaterno" class="nombre" size="30" value="<?php echo explode(",",$mBeneficiario->getNombre())[2]; ?>" />
                    </td>
                </tr>
                <tr>
                    <td>
                        CURP:
                        <input type="text" id="curp" name="curp" size="22" value="<?php echo $mBeneficiario->getCurp(); ?>" />
                    </td>
                </tr>
                <tr>
                    <td>
                        RFC:
                        <input type="text" id="rfc" name="rfc" size="15" value="<?php echo $mBeneficiario->getRfc(); ?>" />
                    </td>
                </tr>
                 <tr style="vertical-align:middle">
                    <td >
                        ESTADO:
                        <img width="22" height="22"  src="../../bbl/lib/images/<?php echo $mBeneficiario->getEstatus(); ?>.png" />
                    </td>
                </tr>
                 <?php
                endforeach;
                ?>
        </table>
    </div>
    <div class="buttonsBar">
        <a id="updateBeneficiario" class="button" href="javascript:void(0);">Guardar cambios</a>
        <a id="cancel" class="button" href="javascript:void(0);">Cancelar</a>
    </div>
</form>