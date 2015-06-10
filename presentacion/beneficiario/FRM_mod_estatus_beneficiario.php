<h2><?php echo $view->label; ?></h2>
<form name="frm_mod_beneficiario" id="frm_mod_beneficiario" method="POST" action=" ">
    <div class="bar">
        <table style="vertical-align:middle">
            <?php
            foreach ($view->DatosBeneficiario as $mBeneficiario):
                ?>
                <input type="hidden" id="idBeneficiario" value="<?php echo $mBeneficiario->getidBeneficiario();?>"/>
                <tr>
                    <td>
                        Nombre:
                        <input type="text" id="nombre" name="nombre" class="nombre" size="50" size="12" value="<?php echo explode(",",$mBeneficiario->getnombre())[0]; ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Apellido Paterno:
                        <input type="text" id="aPaterno" name="aPaterno" class="nombre" size="30" value="<?php echo explode(",",$mBeneficiario->getnombre())[1]; ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Apellido Materno:
                        <input type="text" id="aMaterno" name="aMaterno" class="nombre" size="30" value="<?php echo explode(",",$mBeneficiario->getnombre())[2]; ?>" />
                    </td>
                </tr>
                <tr>
                    <td>
                        CURP:
                        <input type="text" id="curp" name="curp" size="18" value="<?php echo $mBeneficiario->getcurp(); ?>" />
                    </td>
                </tr>
                <tr>
                    <td>
                        RFC:
                        <input type="text" id="rfc" name="rfc" size="13" value="<?php echo $mBeneficiario->getrfc(); ?>" />
                    </td>
                </tr>
                 <tr style="vertical-align:middle">
                    <td >
                        Estado:
                        <input type="radio" id="3" name="estatus" value="3" <?php if(strval($mBeneficiario->getEstatus()=='3')){echo 'checked="checked"';} ?>> Vetar
                        <input type="radio" id="1" name="estatus" value="1" <?php if(strval($mBeneficiario->getEstatus()=='1')){echo 'checked="checked"';} ?>> &Eacute;xito
                    </td>
                </tr>
                 <tr style="vertical-align:middle">
                    <td >
                        Raz&oacute;n veto:
                        <input type="text" id="motivo" name="motivo" size="50" value="<?php echo $mBeneficiario->getMotivo(); ?>" />
                    </td>
                </tr>
                 <?php
                endforeach;
                ?>
        </table>
    </div>
    <div class="buttonsBar">
        <a id="updateBeneficiarioEstatus" class="button" href="javascript:void(0);">Guardar cambios</a>
        <a id="cancel" class="button" href="javascript:void(0);">Cancelar</a>
    </div>
</form>