/**
 * Autor: Miguel Angel Casas
 * 
 *
 */
$(document).ready(function(){ //cuando el html fue cargado iniciar
 
    //alta anio fiscal
    $('#altaAnio').live('click', function(){
       
        var inicio  = document.frm_listAnioFiscal.inicio.value;
        var fin  = document.frm_listAnioFiscal.fin.value;
   
        
        params  = {};
       
        params.inicio = inicio;
        params.fin = fin;
        params.nombre = fin.substr(0,4);
        
         var entrar = confirm("Se dará de alta el año "+params.nombre );
         
        if(entrar == true){
            params.action="Save_Anio";
            $('#content').load('listar_anio.php', params, function(){
                alert("Se dio de alta el año exitosamente");
            })
        }  
    })
    
    $('#filtrarTipo').live('click', function(){
       
        var selPrograma  = document.frm_listprogramas.tipoSelect;
        var idPrograma = selPrograma.options[selPrograma.selectedIndex].value;
        
        params  = {};
       
        params.idPrograma = idPrograma;
        params.action="filtro";
        $('#content').load('reporte_dependencias.php', params, function(){
            
        })
    })
    
    //mostrar detalles del programa
    $('.select_programa').live('click', function(){
        var idPrograma = $(this).attr('data-idd');
        params = {};
        params.id = idPrograma;
        params.action = "mostrar_programa";
        $('#popupbox').load('listar_programas.php', params, function(){
            $('#block').show();
            $('#popupbox').show();    
        })
    })
    
    
     //elimina anio
    $('.select_eanio').live('click', function(){
        var entrar = confirm("¿Eliminar Año:  "+$(this).attr('data-nombre')+"?");
		
		
        if (entrar == true){
			  
            params={};
            params.id=$(this).attr('data-idd');
		
            params.action="EliminarAnio";
            $('#content').load('listar_anio.php', params,function(){
            
			
            })
        }
    })
    

    
     //función para modificar un beneficiario
    $('#updateBeneficiario').live('click', function(){
        
        var nombre  = document.frm_mod_beneficiario.nombre.value;
        var aPaterno  = document.frm_mod_beneficiario.aPaterno.value;
        var aMaterno  = document.frm_mod_beneficiario.aMaterno.value;
        var curp  = document.frm_mod_beneficiario.curp.value;
        var rfc  = document.frm_mod_beneficiario.rfc.value;
         
         if(nombre == "" || nombre.length == 0 || nombre == null || nombre.match(/^\s+|\s+$/)){
            alert("Ingrese el nombre");
            document.frm_mod_beneficiario.nombre.select();
            document.frm_mod_beneficiario.nombre.focus();
            return false;
        }else if(nombre.match(/^[0-9]+$/)){
            alert("El nombre solo puede contener letras");
            document.frm_mod_beneficiario.nombre.select();
            document.frm_mod_beneficiario.nombre.focus();
            return false;
        }else{
            params  = {};
            params.nombre = nombre;
            params.aPaterno = aPaterno;
            params.aMaterno = aMaterno;
            params.rfc = rfc;
            params.curp = curp;
            
            var entrar = confirm("Se modificarán sus datos.");
            
                if(entrar == true){
                    params.action="Save_Beneficiario";
                    $('#content').load('listar_beneficiario.php', params, function(){
                        alert("Se modificaron sus datos exitosamente");
                    })
                }
            }    
    })
    
    
     //función para modificar un beneficiario
    $('#updateBeneficiarioEstatus').live('click', function(){
        var id = document.frm_mod_beneficiario.idBeneficiario.value;
        var nombre  = document.frm_mod_beneficiario.nombre.value;
        var aPaterno  = document.frm_mod_beneficiario.aPaterno.value;
        var aMaterno  = document.frm_mod_beneficiario.aMaterno.value;
        var curp  = document.frm_mod_beneficiario.curp.value;
        var rfc  = document.frm_mod_beneficiario.rfc.value;
        var radios = document.frm_mod_beneficiario.estatus;
        var motivo = document.frm_mod_beneficiario.motivo.value;
        var estatus;
        
        for (var i = 0, length = radios.length; i < length; i++) {
            if (radios[i].checked) {
                estatus = (radios[i].value);
                break;
            }
        }

         if(nombre == "" || nombre.length == 0 || nombre == null || nombre.match(/^\s+|\s+$/)){
            alert("Ingrese el nombre");
            document.frm_mod_beneficiario.nombre.select();
            document.frm_mod_beneficiario.nombre.focus();
            return false;
        }else if(nombre.match(/^[0-9]+$/)){
            alert("El nombre solo puede contener letras");
            document.frm_mod_beneficiario.nombre.select();
            document.frm_mod_beneficiario.nombre.focus();
            return false;
        }else{
            params  = {};
            params.idBeneficiario = id;
            params.nombre = nombre;
            params.aPaterno = aPaterno;
            params.aMaterno = aMaterno;
            params.rfc = rfc;
            params.curp = curp;
            params.estatus = estatus;
            params.motivo = motivo;
            
            var entrar = confirm("Se modificara sus datos.");
            
                if(entrar == true){
                    params.action="Save_Beneficiario";
                    $('#content').load('listar_beneficiario2.php', params, function(){
                        alert("Se modificaron sus datos exitosamente");
                    })
                }
            }    
    })
    

    // boton cancelar, uso live en lugar de bind para que tome cualquier boton
    // nuevo que pueda aparecer
    $('#cancel').live('click',function(){
        $('#block').hide();
        $('#popupbox').hide();
    })


})

NS={};
