<script type="text/javascript">
    function validar(){
      if (document.frm_docente.nombre.value == ""){
            alert("Debe rellenar el formulario");
       //     return false;
      }else{
            document.frm_docente.submit();
       //     return true;
       }  
    }
</script>
<h2><?php echo $view->label; ?></h2>
<form name="frm_docente" id="frm_docente" method="POST" action=" ">
    <?php
    echo "<input type='hidden' name='idd' value='" . $view->idd . "'/>";
    ?>
    <div class="bar">
        <table>	
            <tr>
                <td>
                    Nombre de la Dependencia:
                    <input type="text" id="idusuario" name="idusuario" size="12" />
                </td>
            </tr>  	
            <tr>
                <td>
                    Ubicacion:
                    <input type="text" id="nombre" name="nombre" class="nombre" size="50" />
                </td>
            </tr>
			<tr>
                <td>
                    Responsable:
                    <input type="text" id="responsable" name="responsable" class="nombre" size="50" />
                </td>
            </tr>
        </table>
    </div>
    <div class="buttonsBar">
        <a id="saveD" class="button" href="javascript:void(0);">Guardar</a>
        <a id="cancel" class="button" href="javascript:void(0);">Regresar</a>
    </div>
</form>


