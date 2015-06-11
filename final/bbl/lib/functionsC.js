/**
 * 
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

 $('#saveE').live('click',function(){
        
        var nombre = document.Encargado.nombre.value;
		var ap_paterno = document.Encargado.ap_paterno.value;
		var ap_materno = document.Encargado.ap_materno.value;
        var puesto = document.Encargado.puesto.value;
        var num_empleado = document.Encargado.numero.value;
        var usuario = document.Encargado.usuario.value;
        var contrasenia = document.Encargado.contrasenia.value;
                
        /*if(apellidos == "" || apellidos.length == 0 || apellidos == null || apellidos.match(/^\s+|\s+$/)){
            alert("Ingrese los apellidos");
            document.frm_alumno.apellidos.select();
            document.frm_alumno.apellidos.focus();
            return false;
        }else if(apellidos.match(/^[0-9]+$/)){
            alert("Los apellidos solo pueden contener letras");
            document.frm_alumno.apellidos.select();
            document.frm_alumno.apellidos.focus();
            return false;        
        }else if(nombre == "" || nombre.length == 0 || nombre == null || nombre.match(/^\s+|\s+$/)){
            alert("Ingrese el nombre");
            document.frm_alumno.nombre.select();
            document.frm_alumno.nombre.focus();
            return false;
        }else if(nombre.match(/^[0-9]+$/)){
            alert("El nombre solo puede contener letras");
            document.frm_alumno.nombre.select();
            document.frm_alumno.nombre.focus();
            return false;        
        }else if(nocontrol == "" || nocontrol.length == 0 || nocontrol.length > 10 || nocontrol == null || nocontrol.match(/^\s+|\s+$/)){
            alert("Ingrese el número de control maximo 10 caracteres");
            document.frm_alumno.nocontrol.select();
            document.frm_alumno.nocontrol.focus();
            return false;
        }else if(idusuario == "" || idusuario == null || idusuario.length == 0 || idusuario.match(/^\s+|\s+$/)) {
            alert("Ingrese el id de usuario");
            document.frm_alumno.idusuario.select();
            document.frm_alumno.idusuario.focus();
            return false;
        }else if(isNaN(idusuario)){
            alert("Debe ingresar un número entero");
            document.frm_alumno.idusuario.select();
            document.frm_alumno.idusuario.focus();
            return false;
        }else if(curp.match(/^\s+|\s+$/) || curp.length < 18 || curp.length > 18){
            alert("Ingrese la curp, solo 18 caracteres");
            document.frm_alumno.curp.select();
            document.frm_alumno.curp.focus();
            return false;
        }else if(sexo == "" || sexo.length == 0 || sexo == null || sexo.match(/^\s+|\s+$/)){
            alert("Por favor seleccione el sexo");
            return false;
        }else if(civil.match(/^\s+|\s+$/)){
            alert("Selecccione el estado civil");
            return false;
        }else if(especialidad == "" || especialidad.length == 0 || especialidad == null || especialidad.match(/^\s+|\s+$/)){
            alert("Por favor seleccione la especialidad");
            return false;
        }else if(dia == "" || dia.length == 0 || dia == null || dia.match(/^\s+|\s+$/)){
            alert("Por favor seleccione el día");
            return false;
        }else if(mes == "" || mes.length == 0 || mes == null || mes.match(/^\s+|\s+$/)){
            alert("Por favor seleccione el mes");
            return false;
        }else if(anio == "" || anio.length == 0 || anio == null || anio.match(/^\s+|\s+$/)){
            alert("Por favor seleccione el año");
            return false;
        }else if(calle.match(/^\s+|\s+$/)){
            alert("Solo se aceptan letras y numeros");
            document.frm_alumno.calle.select();
            document.frm_alumno.calle.focus();
            return false;
        }else if(colonia.match(/^\s+|\s+$/)){
            alert("Solo se aceptan letras y numeros");
            document.frm_alumno.colonia.select();
            document.frm_alumno.colonia.focus();
            return false;
        }else if(localidad.match(/^\s+|\s+$/)){
            alert("Solo se aceptan letras y numeros");
            document.frm_alumno.localidad.select();
            document.frm_alumno.localidad.focus();
            return false;
        }else if(municipio.match(/^\s+|\s+$/)){
            alert("Solo se aceptan letras y numeros");
            document.frm_alumno.municipio.select();
            document.frm_alumno.municipio.focus();
            return false;
        }else if(estado.match(/^\s+|\s+$/)){
            alert("Por favor seleccione el estado");
            return false; 
        }else if(telefono.match(/^\s+|\s+$/) || telefono.length > 10 || isNaN(telefono)){
            alert("Número de telefono invalido solo 10 digitos seguidos");
            document.frm_alumno.telefono.select();
            document.frm_alumno.telefono.focus();
            return false;
        }else if(correo.match(/^\s+|\s+$/)){
            alert("Correo no valido");
            document.frm_alumno.correo.select();
            document.frm_alumno.correo.focus();
            return false;
        }else if(nssocial.match(/^\s+|\s+$/) || isNaN(nssocial)){
                if(nssocial.length <11){
            alert("Número de seguro social no valido solo 11 digitos seguidos");
            document.frm_alumno.nssocial.select();
            document.frm_alumno.nssocial.focus();
            return false;}
        }else if(tutor.match(/^\s+|\s+$/) || tutor.match(/^[0-9]*.$/)){
            alert("Se aceptan solo letras");
            document.frm_alumno.tutor.select();
            document.frm_alumno.tutor.focus();
            return false;
        }else{*/
            
        params={};
        params.nombre = nombre;
        params.paterno = ap_paterno;
        params.materno = ap_materno;
        params.puesto = puesto;
        params.numero = num_empleado;
        params.usuario = usuario; 
        params.pass = contrasenia;
        
                       
        var entrar = confirm("¿Se guardara el encargado:  "+nombre+"?");	
		
        if (entrar == true){            
            params.action="SaveEncargado";
            $('#content').load('listar_encargados.php', params,function(){
                		 $('#block').hide();
                $('#popupbox').hide();
            })        
       } 
    })
   
    //Buscar encargado por nombre
    $('#buscarE').live('click',function(){
        var nombre= document.frm_listaencargado.nombre_enc.value;	
               
        params={};
        params.nombre=nombre;
		
        params.action="Buscar_encargado";
        $('#content').load('listar_encargados.php', params,function(){
            
			
            })
		
		
	
    })
   
    //funcion modificar encargado
    $('.select_me').live('click', function(){        
        var id = $(this).attr('data-id');
        
        var entrar = confirm("¿Modificar encargado numero: "+id+"?");
        
        if(entrar == true){
            params = {};
            params.id = id;
                        
            params.action = "ModificarEncargado";
            $('#popupbox').load('listar_encargados.php', params, function(){
                $('#block').show();
                $('#popupbox').show();    
            })
        }
    })
    //función para eliminar un encargado
    $('.select_ee').live('click',function(){
        //obtengo el id que guardamos en data-id
        var id=$(this).attr('data-id'); 
        var entrar = confirm("¿Eliminar encargado número: "+id+" ?");		
		
        if (entrar == true){			  
            params={};
            params.id=id;
            
            params.action="EliminarEncargado";
            $('#content').load('listar_encargados.php', params,function(){		
                })
        }
    })
    
    //Actualizar los datos de un encargado
    $('#updateE').live('click',function(){
        var id = document.frm_mod_encargado.id.value;
        var nombre = document.frm_mod_encargado.nombre.value;
        var usuario = document.frm_mod_encargado.usuario.value;
        var contrasenia = document.frm_mod_encargado.contrasenia.value;
        var puesto = document.frm_mod_encargado.puesto.value;
        var num_emp = document.frm_mod_encargado.num_empleado.value;
        
        params = {};
        params.id = id;
        params.nombre = nombre;
        params.usuario = usuario;
        params.contrasenia = contrasenia;
        params.puesto = puesto;
        params.num_emp = num_emp;
        
        var entrar = confirm("Se modificara el encargado: " +id+ ".");
        
        if(entrar == true){
            params.action = "ActualizarEncargado";
            $('#content').load('listar_encargados.php',params, function(){
                $('#block').show();
                $('#popupbox').show();
            })
        }   
    })
    //Registrar beneficiario
    $('#saveB').live('click',function(){
        
        var nombre = document.frm_bene.nombre.value;
		var ap_paterno = document.frm_bene.ap_paterno.value;
		var ap_materno = document.frm_bene.ap_materno.value;
        var usuario = document.frm_bene.usuario.value;
        var contrasenia = document.frm_bene.contrasenia.value;
        var curp = document.frm_bene.curp.value;
        var rfc = document.frm_bene.rfc.value;
        var privilegios = 1;
        
        
        /*if(apellidos == "" || apellidos.length == 0 || apellidos == null || apellidos.match(/^\s+|\s+$/)){
            alert("Ingrese los apellidos");
            document.frm_alumno.apellidos.select();
            document.frm_alumno.apellidos.focus();
            return false;
        }else if(apellidos.match(/^[0-9]+$/)){
            alert("Los apellidos solo pueden contener letras");
            document.frm_alumno.apellidos.select();
            document.frm_alumno.apellidos.focus();
            return false;        
        }else if(nombre == "" || nombre.length == 0 || nombre == null || nombre.match(/^\s+|\s+$/)){
            alert("Ingrese el nombre");
            document.frm_alumno.nombre.select();
            document.frm_alumno.nombre.focus();
            return false;
        }else if(nombre.match(/^[0-9]+$/)){
            alert("El nombre solo puede contener letras");
            document.frm_alumno.nombre.select();
            document.frm_alumno.nombre.focus();
            return false;        
        }else if(nocontrol == "" || nocontrol.length == 0 || nocontrol.length > 10 || nocontrol == null || nocontrol.match(/^\s+|\s+$/)){
            alert("Ingrese el número de control maximo 10 caracteres");
            document.frm_alumno.nocontrol.select();
            document.frm_alumno.nocontrol.focus();
            return false;
        }else if(idusuario == "" || idusuario == null || idusuario.length == 0 || idusuario.match(/^\s+|\s+$/)) {
            alert("Ingrese el id de usuario");
            document.frm_alumno.idusuario.select();
            document.frm_alumno.idusuario.focus();
            return false;
        }else if(isNaN(idusuario)){
            alert("Debe ingresar un número entero");
            document.frm_alumno.idusuario.select();
            document.frm_alumno.idusuario.focus();
            return false;
        }else if(curp.match(/^\s+|\s+$/) || curp.length < 18 || curp.length > 18){
            alert("Ingrese la curp, solo 18 caracteres");
            document.frm_alumno.curp.select();
            document.frm_alumno.curp.focus();
            return false;
        }else if(sexo == "" || sexo.length == 0 || sexo == null || sexo.match(/^\s+|\s+$/)){
            alert("Por favor seleccione el sexo");
            return false;
        }else if(civil.match(/^\s+|\s+$/)){
            alert("Selecccione el estado civil");
            return false;
        }else if(especialidad == "" || especialidad.length == 0 || especialidad == null || especialidad.match(/^\s+|\s+$/)){
            alert("Por favor seleccione la especialidad");
            return false;
        }else if(dia == "" || dia.length == 0 || dia == null || dia.match(/^\s+|\s+$/)){
            alert("Por favor seleccione el día");
            return false;
        }else if(mes == "" || mes.length == 0 || mes == null || mes.match(/^\s+|\s+$/)){
            alert("Por favor seleccione el mes");
            return false;
        }else if(anio == "" || anio.length == 0 || anio == null || anio.match(/^\s+|\s+$/)){
            alert("Por favor seleccione el año");
            return false;
        }else if(calle.match(/^\s+|\s+$/)){
            alert("Solo se aceptan letras y numeros");
            document.frm_alumno.calle.select();
            document.frm_alumno.calle.focus();
            return false;
        }else if(colonia.match(/^\s+|\s+$/)){
            alert("Solo se aceptan letras y numeros");
            document.frm_alumno.colonia.select();
            document.frm_alumno.colonia.focus();
            return false;
        }else if(localidad.match(/^\s+|\s+$/)){
            alert("Solo se aceptan letras y numeros");
            document.frm_alumno.localidad.select();
            document.frm_alumno.localidad.focus();
            return false;
        }else if(municipio.match(/^\s+|\s+$/)){
            alert("Solo se aceptan letras y numeros");
            document.frm_alumno.municipio.select();
            document.frm_alumno.municipio.focus();
            return false;
        }else if(estado.match(/^\s+|\s+$/)){
            alert("Por favor seleccione el estado");
            return false; 
        }else if(telefono.match(/^\s+|\s+$/) || telefono.length > 10 || isNaN(telefono)){
            alert("Número de telefono invalido solo 10 digitos seguidos");
            document.frm_alumno.telefono.select();
            document.frm_alumno.telefono.focus();
            return false;
        }else if(correo.match(/^\s+|\s+$/)){
            alert("Correo no valido");
            document.frm_alumno.correo.select();
            document.frm_alumno.correo.focus();
            return false;
        }else if(nssocial.match(/^\s+|\s+$/) || isNaN(nssocial)){
                if(nssocial.length <11){
            alert("Número de seguro social no valido solo 11 digitos seguidos");
            document.frm_alumno.nssocial.select();
            document.frm_alumno.nssocial.focus();
            return false;}
        }else if(tutor.match(/^\s+|\s+$/) || tutor.match(/^[0-9]*.$/)){
            alert("Se aceptan solo letras");
            document.frm_alumno.tutor.select();
            document.frm_alumno.tutor.focus();
            return false;
        }else{*/
            
        params={};
        params.nombre = nombre;
		params.ap_paterno = ap_paterno;
		params.ap_materno = ap_materno;
        params.usuario = usuario; 
        params.contrasenia = contrasenia;
        params.curp = curp;
        params.rfc = rfc;
        params.privilegios = privilegios;
        
        var entrar = confirm("¿Se guardara el beneficiario:  "+nombre+" "+ ap_paterno +" " +ap_materno+"?");	
		
        if (entrar == true){            
            params.action="SaveBeneficiario";
            $('#content').load('listar_beneficiarios.php', params,function(){
                		
            })        
       } 
    })
    
     //función para eliminar un beneficiario
    $('.select_eb').live('click',function(){
        //obtengo el id que guardamos en data-id
        var id=$(this).attr('data-id'); 
              
		
        var entrar = confirm("¿Eliminar beneficiario número: "+id+" ?");		
		
        if (entrar == true){			  
            params={};
            params.id=id;
            
            //params.nombre = nombre;		
            params.action="EliminarBeneficiario";
            $('#content').load('listar_beneficiarios.php', params,function(){		
                })
        }
    })
    
   

    //Consultar la nformacion de manera rapida
       $('.select_ca').live('click', function(){
             var nc = $(this).attr('data-id');
             
        params = {};
        params.nc = nc;        
        params.action= "ConsultarAlumno";
        $('#popupbox').load('listar_alumnos.php', params,function(){
            $('#block').show();
            $('#popupbox').show();
        })
    })
    
    
    
    //modificar alumno   
  $('.select_ma').live('click',function(){
    var nc = $(this).attr('data-id');
    var nombre = $(this).attr('data-nombre');
    
    var entrar = confirm("¿Modificar alumno: "+nombre+"?");
    
    if(entrar == true){
        params = {};
        params.nc = nc;
        
        params.action = "ModificarAlumno";
        $('#popupbox').load('listar_alumnos.php', params, function(){
            $('#block').show();
            $('#popupbox').show();
        }) 
    }
  }) 
    //Actualizar datos de alumno
    $('#updateA').live('click',function(){
         
        var idAlumno = document.frm_mod_alumno.id_alumno.value;
        var nombre = document.frm_mod_alumno.nombre.value.toUpperCase();
        var nocontrol = document.frm_mod_alumno.nocontrol.value.toUpperCase();
        var idusuario = document.frm_mod_alumno.idusuario.value;
        var id_info = document.frm_mod_alumno.id_info.value;      
        var dia = document.frm_mod_alumno.dia.value;
        var mes = document.frm_mod_alumno.mes.value;
        var anio = document.frm_mod_alumno.anio.value;
        var calle = document.frm_mod_alumno.calle.value.toUpperCase();
        var colonia = document.frm_mod_alumno.colonia.value.toUpperCase();
        var localidad = document.frm_mod_alumno.localidad.value.toUpperCase();
        var municipio = document.frm_mod_alumno.municipio.value.toUpperCase();
        var estado = document.frm_mod_alumno.estados.value.toUpperCase();
        var curp = document.frm_mod_alumno.curp.value.toUpperCase(); 
        var sexo = document.frm_mod_alumno.sexo.value.toUpperCase();
        var civil = document.frm_mod_alumno.civil.value;
        var especialidad = document.frm_mod_alumno.especialidad.value;
        var telefono = document.frm_mod_alumno.telefono.value;
        var correo = document.frm_mod_alumno.correo.value;
        var nssocial = document.frm_mod_alumno.nssocial.value;
        var tutor = document.frm_mod_alumno.tutor.value.toUpperCase();
        var estatus = document.frm_mod_alumno.estatus.value;
		
         if(nombre == "" || nombre.length == 0 || nombre == null || nombre.match(/^\s+|\s+$/)){
            alert("Ingrese el nombre");
            document.frm__mod_alumno.nombre.select();
            document.frm_mod_alumno.nombre.focus();
            return false;
        }else if(nombre.match(/^[0-9]+$/)){
            alert("El nombre solo puede contener letras");
            document.frm_mod_alumno.nombre.select();
            document.frm_mod_alumno.nombre.focus();
            return false;        
        }else if(nocontrol == "" || nocontrol.length == 0 || nocontrol.length > 10 || nocontrol == null || nocontrol.match(/^\s+|\s+$/)){
            alert("Ingrese el número de control maximo 10 caracteres");
            document.frm_mod_alumno.nocontrol.select();
            document.frm_mod_alumno.nocontrol.focus();
            return false;
        }else if(idusuario == "" || idusuario == null || idusuario.length == 0 || idusuario.match(/^\s+|\s+$/)) {
            alert("Ingrese el id de usuario");
            document.frm_mod_alumno.idusuario.select();
            document.frm_mod_alumno.idusuario.focus();
            return false;
        }else if(isNaN(idusuario)){
            alert("Debe ingresar un número entero");
            document.frm_mod_alumno.idusuario.select();
            document.frm_mod_alumno.idusuario.focus();
            return false;
        }else if(curp.match(/^\s+|\s+$/) || curp.length < 18 || curp.length > 18){
            alert("Ingrese la curp, solo 18 caracteres");
            document.frm_mod_alumno.curp.select();
            document.frm_mod_alumno.curp.focus();
            return false;
        }else if(sexo == "" || sexo.length == 0 || sexo == null || sexo.match(/^\s+|\s+$/)){
            alert("Por favor seleccione el sexo");
            return false;
        }else if(civil.match(/^\s+|\s+$/)){
            alert("Selecccione el estado civil");
            return false;
        }else if(especialidad == "" || especialidad.length == 0 || especialidad == null || especialidad.match(/^\s+|\s+$/)){
            alert("Por favor seleccione la especialidad");
            return false;
        }else if(estatus == "" || estatus.length == 0 || estatus == null || estatus.match(/^\s+|\s+$/)){
            alert("Por favor seleccione el estatus");
            return false;
        }else if(dia == "" || dia.length == 0 || dia == null || dia.match(/^\s+|\s+$/)){
            alert("Por favor seleccione el día");
            return false;
        }else if(mes == "" || mes.length == 0 || mes == null || mes.match(/^\s+|\s+$/)){
            alert("Por favor seleccione el mes");
            return false;
        }else if(anio == "" || anio.length == 0 || anio == null || anio.match(/^\s+|\s+$/)){
            alert("Por favor seleccione el año");
            return false;
        }else if(calle.match(/^\s+|\s+$/)){
            alert("Solo se aceptan letras y numeros");
            document.frm_mod_alumno.calle.select();
            document.frm_mod_alumno.calle.focus();
            return false;
        }else if(colonia.match(/^\s+|\s+$/)){
            alert("Solo se aceptan letras y numeros");
            document.frm_mod_alumno.colonia.select();
            document.frm_mod_alumno.colonia.focus();
            return false;
        }else if(localidad.match(/^\s+|\s+$/)){
            alert("Solo se aceptan letras y numeros");
            document.frm_mod_alumno.localidad.select();
            document.frm_mod_alumno.localidad.focus();
            return false;
        }else if(municipio.match(/^\s+|\s+$/)){
            alert("Solo se aceptan letras y numeros");
            document.frm_mod_alumno.municipio.select();
            document.frm_mod_alumno.municipio.focus();
            return false;
        }else if(estado.match(/^\s+|\s+$/)){
            alert("Por favor seleccione el estado");
            return false; 
        }else if(telefono.match(/^\s+|\s+$/) || telefono.length > 10 || isNaN(telefono)){
            alert("Número de telefono invalido solo 10 digitos seguidos");
            document.frm_mod_alumno.telefono.select();
            document.frm_mod_alumno.telefono.focus();
            return false;
        }else if(correo.match(/^\s+|\s+$/)){
            alert("Correo no valido");
            document.frm_mod_alumno.correo.select();
            document.frm_mod_alumno.correo.focus();
            return false;
        }else if(nssocial.match(/^\s+|\s+$/) || isNaN(nssocial)){
                if(nssocial.length <11){
            alert("Número de seguro social no valido solo 11 digitos seguidos");
            document.frm_mod_alumno.nssocial.select();
            document.frm_mod_alumno.nssocial.focus();
            return false;}
        }else if(tutor.match(/^\s+|\s+$/) || tutor.match(/^[0-9]*.$/)){
            alert("Se aceptan solo letras");
            document.frm_alumno.tutor.select();
            document.frm_alumno.tutor.focus();
            return false;
        }else{
              
        params={};
        params.idAlumno = idAlumno;
        params.nombre = nombre;
        params.nocontrol = nocontrol;
        params.idusuario = idusuario;
        params.id_info = id_info;
        params.curp = curp; 
        params.sexo = sexo;
        params.civil = civil;       
        params.especialidad = especialidad;
        params.dia = dia;
        params.mes = mes;
        params.anio = anio;
        params.calle = calle;
        params.colonia = colonia;
        params.localidad = localidad;
        params.municipio = municipio;
        params.estado = estado;
        params.telefono = telefono;
        params.correo = correo;
        params.nssocial = nssocial;
        params.tutor = tutor;
        params.estatus = estatus;
        
        
        
        
        var entrar = confirm("Se modificara el alumno:  "+idAlumno+".");
		
		
        if (entrar == true){            
            params.action="ActualizarAlumno";
            $('#content').load('listar_alumnos.php', params,function(){
                $('#block').show();
                $('#popupbox').show();
			
			
            })
        }
       } 
    })
    //Buscar Alumnos por nombre
    $('#buscarA').live('click',function(){
        //obtengo el id que guardamos en data-id
        var cat= document.BuscaAlumno.alumno.value;
	
       
        params={};
        params.id=cat;
		
        params.action="Buscar_a";
        $('#content').load('listar_alumnos.php', params,function(){
            
			
            })
		
		
	
    })

    //Buscar por Numero de Control

    $('#buscarnc').live('click',function(){
        //obtengo el id que guardamos en data-id
        var cat= document.BuscaAlumno.nc.value;
	
       
        params={};
        params.id=cat;
		
        params.action="Buscar_nc";
        $('#content').load('listar_alumnos.php', params,function(){
            
			
            })
		
		
	
    })

    //Seleccionar a un Alumno

    $('.select_a').live('click',function(){
        //obtengo el id que guardamos en data-id
        var id=$(this).attr('data-id');
        
        params={};
        params.id=id;
		
        params.action="Mostrar_Alumno";
        $('#content').load('listar_alumnos.php', params,function(){
            
			
            })
	
    })
	
    //Elimianr a un alumno de la carga de la materia
	
    $('.elimianr_credito').live('click',function(){
        //obtengo el id que guardamos en data-id
        var id=$(this).attr('data-id');	
        var crt=$(this).attr('data-id2');	
        var inc= document.ListaCargaA.nc.value;
		
        var entrar = confirm("¿Eliminnar Actividad:  "+crt+"?");
		
		
        if (entrar == true){
			  
            params={};
            params.id=id;
            params.inc=inc;
		
            params.action="ElimianrSol";
            $('#content').load('listar_alumnos.php', params,function(){
            
			
                })
        }
    })
    //Imprimir el Formato

    $('.imprimir_credito').live('click',function(){
        //obtengo el id que guardamos en data-id
        var id=$(this).attr('data-id');	
        	
        var inc= document.ListaCargaA.nc.value;
		
	
				
       
       
        var ruta="../../presentacion/reportes/solicitud_actividad.php?id="+id+"";
      
        var caracteristicas="toolbar=0, location=0, directories=0, resizable=0, scrollbars=0, height=600, width=800, top=200, left=200";
        win=window.open(ruta ,"",caracteristicas);
     
		  
    })
    //Asignar una Materia a un Alumno// Seleccionar el Semestre

    $('#AsignaraCred').live('click',function(){
        //obtengo el id que guardamos en data-id
        var cat= document.ListaCargaA.ida.value;
        var nc= document.ListaCargaA.nc.value;
        var car= document.ListaCargaA.idc.value;
	
	    
        params={};
        params.ida=cat;
        params.nc =nc;
        params.car=car;
		
        params.action="AsignarCredito";
        $('#popupbox').load('listar_alumnos.php', params,function(){
            $('#block').show();
            $('#popupbox').show();
        })
		
		
	
    })
	
	
	

    //Mostrar Materias a Seleccioanar

    $('#slect_carrera').live('click',function(){
        //obtengo el id que guardamos en data-id
        var ida= document.select_Carrera.ida.value;
        var idcar= document.select_Carrera.carrera.value;
        var idsem= document.select_Carrera.semestre.value;
        var nc = document.select_Carrera.nc.value;
	
	  
	    
        params={};
        params.ida=ida;
        params.idcar=idcar;
        params.idsem = idsem;
        params.nc=nc;
	
        params.action="ListarCargaAsignar";
        $('#popupbox').load('listar_alumnos.php', params,function(){
            $('#block').show();
            $('#popupbox').show();
        })
		
		
	
    })
	
    //Seleccionar Caga A Agregar a un Alumno
	
	
    $('.select_credito').live('click',function(){
        //obtengo el id que guardamos en data-id
        var id=$(this).attr('data-id');
        var id2=$(this).attr('data-id2');
        var ida= document.ListaCreditos.ida.value;
        var nc= document.ListaCreditos.nc.value;
		
	  
        var entrar = confirm("¿Asignar el Credito:  "+id2+"?");
		
		
        if (entrar == true){
            params={};
            params.id=id;
            params.ida=ida;
            params.inc=nc;
	
            params.action="AsignarCreditoAlumno";
            $('#content').load('listar_alumnos.php', params,function(){
                $('#block').hide();
                $('#popupbox').hide();
			
            })
		
        }
	
    })
    
    $('#saveC').live('click',function(){
        var car= document.frm_Credito.idc.value;
        var nc= document.frm_Credito.nc.value;
        var ida= document.frm_Credito.ida.value; 
        var credito= document.frm_Credito.Credito.value;  
        var docente= document.frm_Credito.Docente.value; 
        var desc = document.frm_Credito.txtdescripcion.value;    
        
        
        params={};
        params.idc=car;
        params.ida=ida;
        params.nc=nc;
        params.credito=credito;
        params.docente=docente;
        params.desc = desc;
		
        var entrar = confirm("¿Se Asignara una Activiad Complementaria a:  "+nc+"?");
		
		
        if (entrar == true){
            params.action="Save_Credito";
            $('#content').load('listar_alumnos.php', params,function(){
                $('#block').hide();
                $('#popupbox').hide();
			
			
            })
        }
    })
    //funcion para lanzar el formulario para registrar materia
    $('#AgregarM').live('click', function(){
             
        params = {};
                
        params.action= "AgregarMateria";
        $('#popupbox').load('listar_materias.php', params,function(){
            $('#block').show();
            $('#popupbox').show();
        })
    })
                                    
                                       
      //guarda la materia desde el formulario                                 
    $('#saveM').live('click',function(){
        
        var nombre = document.frm_materia.nombre.value.toUpperCase();
        var creditos = document.frm_materia.creditos.value; 
        var hteo = document.frm_materia.hteo.value;
        var hpra = document.frm_materia.hpra.value;
        var clave = document.frm_materia.clave.value.toUpperCase();
        var nomcorto = document.frm_materia.nomcorto.value.toUpperCase();
        var carrera_dep = document.frm_materia.carreradep.value;
        var ret_cvo = document.frm_materia.retcvo.value.toUpperCase();
        var semestre = document.frm_materia.semestre.value;
        var unidades = document.frm_materia.unidades.value;
        
        if(nombre == "" || nombre.length == 0 || nombre == null || nombre.match(/^\s+|\s+$/)){
            alert("Ingrese el nombre");
            document.frm_materia.nombre.select();
            document.frm_materia.nombre.focus();
            return false;
        }else if(nombre.match(/^[0-9]+$/)){
            alert("El nombre solo puede contener letras");
            document.frm_materia.nombre.select();
            document.frm_materia.nombre.focus();
            return false;        
        }else if(creditos == "" || creditos == null || creditos.match(/^\s+|\s+$/)){
            alert("Ingrese los creditos");
            document.frm_materia.creditos.select();
            document.frm_materia.creditos.focus();
            return false;
        }else if(isNaN(creditos)){
            alert("Debe ingresar un número entero");
            document.frm_materia.creditos.select();
            document.frm_materia.creditos.focus();
            return false;
        }else if(hpra == "" || hpra == null || isNaN(hpra) || hpra.match(/^\s+|\s+$/)){
            alert("Ingrese las horas practicas, solo numeros");
            document.frm_materia.hpra.select();
            document.frm_materia.hpra.focus();
            return false;
        }else if(hteo == "" || hteo == null || isNaN(hteo) || hteo.match(/^\s+|\s+$/)){
            alert("Ingrese las horas teoricas, solo numeros");
            document.frm_materia.hteo.select();
            document.frm_materia.hteo.focus();
            return false;
        }else if(!clave.match(/^[0-9a-zA-Z]+$/) || clave.match(/^\s+|\s+$/)){
            alert("Ingrese la clave, solo se aceptan letras y numeros");
            document.frm_materia.clave.select();
            document.frm_materia.clave.focus();
            return false;
        }else if(nomcorto.match(/^\s+|\s+$/)){
            alert("Ingrese el nombre corto, solo se aceptan letras y numeros");
            document.frm_materia.nomcorto.select();
            document.frm_materia.nomcorto.focus();
            return false;
        }else if(isNaN(carrera_dep) || carrera_dep.match(/^\s+|\s+$/)){
            alert("Ingrese el departamento de la carrera, solo se aceptan numeros");
            document.frm_materia.carrera_dep.select();
            document.frm_materia.carrera_dep.focus();
            return false;
        }else if(ret_cvo.match(/^\s+|\s+$/)){
            alert("Ingrese la clave de retícula, solo se aceptan letras y numeros");
            document.frm_materia.ret_cvo.select();
            document.frm_materia.ret_cvo.focus();
            return false;
        }else if(isNaN(semestre) || semestre.match(/^\s+|\s+$/)){
            alert("Ingrese el semestre, solo se aceptan numeros");
            document.frm_materia.semestre.select();
            document.frm_materia.semestre.focus();
            return false;
        }else if(unidades == "" || unidades == null || unidades.match(/^\s+|\s+$/)|| isNaN(unidades)){
            alert("Ingrese el número de unidades");
            document.frm_materia.unidades.select();
            document.frm_materia.unidades.focus();
            return false;
        }else{
        params={};
        params.nombre=nombre;
        params.creditos=creditos;
        params.hteo=hteo;
        params.hpra=hpra;
        params.clave=clave;
        params.nomcorto=nomcorto;
        params.carrera_dep=carrera_dep;
        params.ret_cvo=ret_cvo;
        params.semestre=semestre;
        params.unidades=unidades;
				
        var entrar = confirm("¿Se guardara la materia:  "+nombre+"?");
		
		
        if (entrar == true){            
            params.action="Save_Materia";
            $('#content').load('listar_materias.php', params,function(){
                $('#block').hide();
                $('#popupbox').hide();
			
			
                })
            }
    
        }
    })
        //funcion para eliminar una materia
         $('.select_em').live('click',function(){
        //obtengo el id que guardamos en data-id
        var id=$(this).attr('data-idm');
        var nombre = $(this).attr('data-nombre');		
        var entrar = confirm("¿Eliminar Materia: "+id+" "+nombre+"?");
		
		
        if (entrar == true){
			  
            params={};
            params.id=id;

		
            params.action="EliminarMateria";
            $('#content').load('listar_materias.php', params,function(){
            
			
                })
        }
    })    
    
     //fucnción para modificar una materia
    $('.select_mm').live('click', function(){
        var id=$(this).attr('data-idm');
        var nombre = $(this).attr('data-nombre');
        var entrar = confirm("¿Modificar Materia: "+id+" "+nombre+"?");
        
        if(entrar == true){
            params = {};
            params.id = id;
            
            params.action = "ModificarMateria";
            $('#popupbox').load('listar_materias.php', params, function(){
                $('#block').show();
                $('#popupbox').show();    
            })
        }
    })
    
      $('#updateM').live('click', function(){
         
        var id = document.frm_mod_materia.id.value; 
        var nombre  = document.frm_mod_materia.nombre.value.toUpperCase();
        var creditos = document.frm_mod_materia.creditos.value; 
        var hpra = document.frm_mod_materia.hpra.value;
        var hteo = document.frm_mod_materia.hteo.value;        
        var clave = document.frm_mod_materia.clave.value.toUpperCase();
        var nomcorto = document.frm_mod_materia.nomcorto.value.toUpperCase();
        var carrera_dep = document.frm_mod_materia.carreradep.value;
        var ret_cvo = document.frm_mod_materia.retcvo.value;
        var semestre = document.frm_mod_materia.semestre.value;
        var unidades = document.frm_mod_materia.unidades.value;
        
         if(nombre == "" || nombre.length == 0 || nombre == null || nombre.match(/^\s+|\s+$/)){
            alert("Ingrese el nombre");
            document.frm_mod_materia.nombre.select();
            document.frm_mod_materia.nombre.focus();
            return false;
        }else if(nombre.match(/^[0-9]+$/)){
            alert("El nombre solo puede contener letras");
            document.frm_mod_materia.nombre.select();
            document.frm_mod_materia.nombre.focus();
            return false;        
        }else if(creditos == "" || creditos == null || creditos.match(/^\s+|\s+$/)){
            alert("Ingrese los creditos");
            document.frm_mod_materia.creditos.select();
            document.frm_mod_materia.creditos.focus();
            return false;
        }else if(isNaN(creditos)){
            alert("Debe ingresar un número entero");
            document.frm_mod_materia.creditos.select();
            document.frm_mod_materia.creditos.focus();
            return false;
        }else if(hpra == "" || hpra == null || isNaN(hpra) || hpra.match(/^\s+|\s+$/)){
            alert("Ingrese las horas practicas, solo numeros");
            document.frm_mod_materia.hpra.select();
            document.frm_mod_materia.hpra.focus();
            return false;
        }else if(hteo == "" || hteo == null || isNaN(hteo) || hteo.match(/^\s+|\s+$/)){
            alert("Ingrese las horas teoricas, solo numeros");
            document.frm_mod_materia.hteo.select();
            document.frm_mod_materia.hteo.focus();
            return false;
        }else if(!clave.match(/^[0-9a-zA-Z]+$/) || clave.match(/^\s+|\s+$/)){
            alert("Ingrese la clave, solo se aceptan letras y numeros");
            document.frm_mod_materia.clave.select();
            document.frm_mod_materia.clave.focus();
            return false;
        }else if(nomcorto.match(/^\s+|\s+$/)){
            alert("Ingrese el nombre corto, solo se aceptan letras y numeros");
            document.frm_mod_materia.nomcorto.select();
            document.frm_mod_materia.nomcorto.focus();
            return false;
        }else if(isNaN(carrera_dep) || carrera_dep.match(/^\s+|\s+$/)){
            alert("Ingrese el departamento de la carrera, solo se aceptan numeros");
            document.frm_mod_materia.carrera_dep.select();
            document.frm_mod_materia.carrera_dep.focus();
            return false;
        }else if(ret_cvo.match(/^\s+|\s+$/)){
            alert("Ingrese la clave de retícula, solo se aceptan letras y numeros");
            document.frm_mod_materia.ret_cvo.select();
            document.frm_mod_materia.ret_cvo.focus();
            return false;
        }else if(isNaN(semestre) || semestre.match(/^\s+|\s+$/)){
            alert("Ingrese el semestre, solo se aceptan numeros");
            document.frm_mod_materia.semestre.select();
            document.frm_mod_materia.semestre.focus();
            return false;
        }else if(unidades == "" || unidades == null || unidades.match(/^\s+|\s+$/)|| isNaN(unidades)){
            alert("Ingrese el número de unidades");
            document.frm_mod_materia.unidades.select();
            document.frm_mod_materia.unidades.focus();
            return false;
        }else{ 
        params={};
        params.id=id;
        params.nombre=nombre;
        params.creditos=creditos;
        params.hpra=hpra;
        params.hteo=hteo;        
        params.clave=clave;
        params.nomcorto=nomcorto;
        params.carrera_dep=carrera_dep;
        params.ret_cvo=ret_cvo;
        params.semestre=semestre;
        params.unidades=unidades;
        
        
        var entrar = confirm("Se modificara la materia: "+id+".");
        
            if(entrar == true){
                params.action="ActualizarMateria";
                $('#content').load('listar_materias.php', params, function(){
                    $('#block').show();
                    $('#popupbox').show();
                })
            }
        }    
    })
      //Buscar materia por nombre
   
   $('#buscarM').live('click',function(){
          
          var nombre = document.frm_listmateria.nombre_mat.value.toUpperCase();
          
         
          params={};
          params.nombre=nombre;
          
  		
          params.action="Buscar_m";
          $('#content').load('listar_materias.php', params,function(){
              
  			
              })
  		
  		
  	
      })
 
    
    //función que lanza el formulario para registrar un docente
      $('#AgregarD').live('click',function(){
        //obtengo el id que guardamos en data-id
        params={};
		
		
        params.action="AgregarDocente";
        $('#popupbox').load('listar_docentes.php', params,function(){
            $('#block').show();
            $('#popupbox').show();
        })
		
		
	
    })
	  //función para registrar un docente desde el formulario
	  $('#saveD').live('click', function(){

        var idusuario = document.frm_docente.idusuario.value;
      	var nombre = document.frm_docente.nombre.value.toUpperCase();
       
        if(idusuario == "" || idusuario == null || idusuario.length == 0 || idusuario.match(/^\s+|\s+$/)) {
            alert("Ingrese el id de usuario");
            document.frm_docente.idusuario.select();
            document.frm_docente.idusuario.focus();
            return false;
        }else if(isNaN(idusuario)){
            alert("Debe ingresar un número entero");
            document.frm_docente.idusuario.select();
            document.frm_docente.idusuario.focus();
            return false;
        }else if(nombre == "" || nombre.length == 0 || nombre == null || nombre.match(/^\s+|\s+$/)){
            alert("Ingrese el nombre");
            document.frm_docente.nombre.select();
            document.frm_docente.nombre.focus();
            return false;
        }else if(nombre.match(/^[0-9a-zA-Z0-9]+$/)){
            alert("El nombre solo puede contener letras");
            document.frm_docente.nombre.select();
            document.frm_docente.nombre.focus();
            return false;
        }else{
       	params = {};
		params.idusuario = idusuario;
		params.nombre = nombre;
        
        
        var entrar = confirm("¿Se guardara el docente:  "+nombre+"?");
		
         if (entrar == true){
            params.action="Save_Docente";
            $('#content').load('listar_docentes.php', params,function(){
                $('#block').hide();
                $('#popupbox').hide();
			
			
            })
          }  
        
       }
        							   
	})  
	
	
    //buscar un docente
    $('#buscarD').live('click',function(){
          
          var nombre = document.frm_listdocente.nombre_doc.value.toUpperCase();
  	
         
          params={};
          params.nombre=nombre;
  		
          params.action="Buscar_d";
          $('#content').load('listar_docentes.php', params,function(){
              
  			
              })
  		
  		
  	
      })

    	//función para eliminar un docente
    $('.select_ed').live('click',function(){
        //obtengo el id que guardamos en data-id
        var id=$(this).attr('data-idd'); 
        var nombre = $(this).attr('data-nombre');      
		
        var entrar = confirm("¿Eliminar Docente: "+id+" "+nombre+"?");
		
		
        if (entrar == true){			  
            params={};
            params.id=id;		
            params.action="EliminarDocente";
            $('#content').load('listar_docentes.php', params,function(){		
                })
        }
    })
    //fucnción para modifcar un docente
    $('.select_md').live('click', function(){
        var id=$(this).attr('data-idd');
        var nombre = $(this).attr('data-nombre');
        
        var entrar = confirm("¿Modificar Docente: "+id+" "+nombre+"?");
        
        if(entrar == true){
            params = {};
            params.id = id;
            
            params.action = "ModificarDocente";
            $('#popupbox').load('listar_docentes.php', params, function(){
                $('#block').show();
                $('#popupbox').show();    
            })
        }
    })
    
       //función para modificar un docente
    $('#updateD').live('click', function(){
         
        var id = document.frm_mod_docente.id.value;
        var idusuario = document.frm_mod_docente.idusuario.value;
        var nombre  = document.frm_mod_docente.nombre.value.toUpperCase();
         
         if(idusuario == "" || idusuario == null || idusuario.length == 0 || idusuario.match(/^\s+|\s+$/)) {
            alert("Ingrese el id de usuario");
            document.frm_mod_docente.idusuario.select();
            document.frm_mod_docente.idusuario.focus();
            return false;
        }else if(isNaN(idusuario)){
            alert("Debe ingresar un número entero");
            document.frm_mod_docente.idusuario.select();
            document.frm_mod_docente.idusuario.focus();
            return false;
        }else if(nombre == "" || nombre.length == 0 || nombre == null || nombre.match(/^\s+|\s+$/)){
            alert("Ingrese el nombre");
            document.frm_mod_docente.nombre.select();
            document.frm_mod_docente.nombre.focus();
            return false;
        }else if(nombre.match(/^[0-9a-zA-Z0-9]+$/)){
            alert("El nombre solo puede contener letras");
            document.frm_mod_docente.nombre.select();
            document.frm_mod_docente.nombre.focus();
            return false;
        }else{
        params  = {};
        params.id = id;
        params.idusuario = idusuario;
        params.nombre = nombre;
       
        var entrar = confirm("Se modificara el docente: "+id+".");
        
            if(entrar == true){
                params.action="ActualizarDocente";
                $('#content').load('listar_docentes.php', params, function(){
                    $('#block').show();
                    $('#popupbox').show();
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

      //Funciones para el manejo de encargados
    //Registrar encargado
       $('#AgregarE').live('click', function(){
             
        params = {};
                
        params.action= "AgregarEncargado";
        $('#popupbox').load('listar_encargados.php', params,function(){
            $('#block').show();
            $('#popupbox').show();
        })
    })
	   
	//Guarda encargado desde el formulario
     $('#saveE').live('click',function(){
      //  alert("sientra");
        var nombre = document.frm_dependencia.nombre.value;
		var ubicacion = document.frm_dependencia.ub.value;
	    var responsable = document.frm_dependencia.responsable.value;
        
             
        params={};
        params.nombre = nombre;
		params.ubicacion = ubicacion;
		 params.responsable = responsable; 
               
        var entrar = confirm("¿Se guardara el encargado:  "+nombre+" "+ ubicacion +" " +responsable+"?");	
		
        if (entrar == true){            
            params.action="Save_Dependencia";
            $('#content').load('listar_dependencia.php', params,function(){
                		
            })        
       } 
    })
	//Guarda apoyo
     $('#saveAp').live('click',function(){
        
        var nombre_proyecto = document.frm_dependencia.nombre.value;
		var monto = document.frm_dependencia.ub.value;
	    var nombre_programa = document.frm_dependencia.select1.value;
		var dependencia = document.frm_dependencia.select2.value;
        
             
        params={};
        params.nombre_proyecto = nombre_proyecto;
		params.monto = monto;
		params.nombre_programa = nombre_programa; 
		params.dependencia = dependencia;
	   var entrar = confirm("¿Se guardara el encargado:  "+nombre_proyecto+" "+ monto +" " +nombre_programa+" "+dependencia+"?");	
		  if (entrar == true){       
	        params.action="Save_Dependencia";
            $('#content').load('listar_apoyo.php', params,function(){
                		
            })        
       } 
    })
	// Sección Programa
   //Guarda encargado desde el formulario
     $('#savePro').live('click',function(){
         var nombre = document.frm_dependencia.nombre.value;
		var descripcion = document.frm_dependencia.desc.value;
	    var caracteristicacs = document.frm_dependencia.caracte.value;
		var estatus = document.frm_dependencia.estatus.value;
		var monto = document.frm_dependencia.monto.value;
		var categoria = document.frm_dependencia.cat.value;
		var convocatoria = document.frm_dependencia.conv.value;
	   params={};
        params.nombre = nombre;
		params.descripcion = descripcion;
		params.caracteristicacs = caracteristicacs; 
		params.estatus = estatus;
		params.monto = monto;
		params.categoria = categoria;
		params.convocatoria = convocatoria; 
        var entrar = confirm("¿Se guardara el programa:  "+nombre+" "+ descripcion +" " +caracteristicacs+" "+estatus+" "+monto+" "+categoria+" "+convocatoria+"?");	
		  if (entrar == true){            
            params.action="Save_Dependencia";
            $('#content').load('listar_programa.php', params,function(){
             })        
       } 
    })
	 //Buscar programa por nombre
    $('#buscarEst').live('click',function(){
        var nombre= document.frm_listaencargado.nombre_prog.value;	
        params={};
        params.nombre=nombre;
		 params.action="Buscar_d";
        $('#content').load('listar_programa.php', params,function(){
            })
	})
	
	 //fucnción para modifcar un programa
    $('.select_modpr').live('click', function(){
        var id=$(this).attr('data-idd');
        var nombre = $(this).attr('data-nombre');
        var entrar = confirm("¿Modificar programa: "+id+" "+"?");
        if(entrar == true){
            params = {};
            params.id = id;
            
            params.action = "ModificarDocente";
			
            $('#popupbox').load('listar_programa.php', params, function(){
                $('#block').show();
                $('#popupbox').show();    
            })
        }
    })
	
    //Buscar encargado por nombre
    $('#buscarE').live('click',function(){
        var nombre= document.frm_listaencargado.nombre_enc.value;	
       
        params={};
        params.nombre=nombre;
		
        params.action="Buscar_d";
        $('#content').load('listar_dependencia.php', params,function(){
            
			
            })
		
		
	
    })
   
    //funcion modificar encargado
    $('#select_me').live('click', function(){
        var id = $(this).attr('data-ide');
        //var nombre = $(this).sttr('data-nombre');
        alert("aqui");
        //alert(nombre);
       // var nombre = $(this).attr('data-nombre');
        var entrar = confirm("¿Modificar Encargado: "+id+" "+nombre+"?");
        
        if(entrar == true){
            params = {};
            params.id = id;
            
            params.action = "ModificarEncargado";
            $('#popupbox').load('listar_encargados.php', params, function(){
                $('#block').show();
                $('#popupbox').show();    
            })
        }
    })
    //función para eliminar un encargado
    $('.select_ee').live('click',function(){
        //obtengo el id que guardamos en data-id
        var ide=$(this).attr('data-ide'); 
        var nombre = $(this).attr('data-nombre');      
		
        var entrar = confirm("¿Eliminar Encargado: "+ide+" "+nombre+"?");		
		
        if (entrar == true){			  
            params={};
            params.id=id;		
            params.action="EliminarEncargado";
            $('#content').load('listar_encargados.php', params,function(){		
                })
        }
    })
    
    //Consultar la nformacion de manera rapida
       $('.select_ca').live('click', function(){
             var nc = $(this).attr('data-id');
             
        params = {};
        params.nc = nc;        
        params.action= "ConsultarAlumno";
        $('#popupbox').load('listar_alumnos.php', params,function(){
            $('#block').show();
            $('#popupbox').show();
        })
    })
    
    
    
    //modificar alumno   
  $('.select_ma').live('click',function(){
    var nc = $(this).attr('data-id');
    var nombre = $(this).attr('data-nombre');
    
    var entrar = confirm("¿Modificar alumno: "+nombre+"?");
    
    if(entrar == true){
        params = {};
        params.nc = nc;
        
        params.action = "ModificarAlumno";
        $('#popupbox').load('listar_alumnos.php', params, function(){
            $('#block').show();
            $('#popupbox').show();
        }) 
    }
  }) 
    //Actualizar datos de alumno
    $('#updateA').live('click',function(){
         
        var idAlumno = document.frm_mod_alumno.id_alumno.value;
        var nombre = document.frm_mod_alumno.nombre.value.toUpperCase();
        var nocontrol = document.frm_mod_alumno.nocontrol.value.toUpperCase();
        var idusuario = document.frm_mod_alumno.idusuario.value;
        var id_info = document.frm_mod_alumno.id_info.value;      
        var dia = document.frm_mod_alumno.dia.value;
        var mes = document.frm_mod_alumno.mes.value;
        var anio = document.frm_mod_alumno.anio.value;
        var calle = document.frm_mod_alumno.calle.value.toUpperCase();
        var colonia = document.frm_mod_alumno.colonia.value.toUpperCase();
        var localidad = document.frm_mod_alumno.localidad.value.toUpperCase();
        var municipio = document.frm_mod_alumno.municipio.value.toUpperCase();
        var estado = document.frm_mod_alumno.estados.value.toUpperCase();
        var curp = document.frm_mod_alumno.curp.value.toUpperCase(); 
        var sexo = document.frm_mod_alumno.sexo.value.toUpperCase();
        var civil = document.frm_mod_alumno.civil.value;
        var especialidad = document.frm_mod_alumno.especialidad.value;
        var telefono = document.frm_mod_alumno.telefono.value;
        var correo = document.frm_mod_alumno.correo.value;
        var nssocial = document.frm_mod_alumno.nssocial.value;
        var tutor = document.frm_mod_alumno.tutor.value.toUpperCase();
        var estatus = document.frm_mod_alumno.estatus.value;
		
         if(nombre == "" || nombre.length == 0 || nombre == null || nombre.match(/^\s+|\s+$/)){
            alert("Ingrese el nombre");
            document.frm__mod_alumno.nombre.select();
            document.frm_mod_alumno.nombre.focus();
            return false;
        }else if(nombre.match(/^[0-9]+$/)){
            alert("El nombre solo puede contener letras");
            document.frm_mod_alumno.nombre.select();
            document.frm_mod_alumno.nombre.focus();
            return false;        
        }else if(nocontrol == "" || nocontrol.length == 0 || nocontrol.length > 10 || nocontrol == null || nocontrol.match(/^\s+|\s+$/)){
            alert("Ingrese el número de control maximo 10 caracteres");
            document.frm_mod_alumno.nocontrol.select();
            document.frm_mod_alumno.nocontrol.focus();
            return false;
        }else if(idusuario == "" || idusuario == null || idusuario.length == 0 || idusuario.match(/^\s+|\s+$/)) {
            alert("Ingrese el id de usuario");
            document.frm_mod_alumno.idusuario.select();
            document.frm_mod_alumno.idusuario.focus();
            return false;
        }else if(isNaN(idusuario)){
            alert("Debe ingresar un número entero");
            document.frm_mod_alumno.idusuario.select();
            document.frm_mod_alumno.idusuario.focus();
            return false;
        }else if(curp.match(/^\s+|\s+$/) || curp.length < 18 || curp.length > 18){
            alert("Ingrese la curp, solo 18 caracteres");
            document.frm_mod_alumno.curp.select();
            document.frm_mod_alumno.curp.focus();
            return false;
        }else if(sexo == "" || sexo.length == 0 || sexo == null || sexo.match(/^\s+|\s+$/)){
            alert("Por favor seleccione el sexo");
            return false;
        }else if(civil.match(/^\s+|\s+$/)){
            alert("Selecccione el estado civil");
            return false;
        }else if(especialidad == "" || especialidad.length == 0 || especialidad == null || especialidad.match(/^\s+|\s+$/)){
            alert("Por favor seleccione la especialidad");
            return false;
        }else if(estatus == "" || estatus.length == 0 || estatus == null || estatus.match(/^\s+|\s+$/)){
            alert("Por favor seleccione el estatus");
            return false;
        }else if(dia == "" || dia.length == 0 || dia == null || dia.match(/^\s+|\s+$/)){
            alert("Por favor seleccione el día");
            return false;
        }else if(mes == "" || mes.length == 0 || mes == null || mes.match(/^\s+|\s+$/)){
            alert("Por favor seleccione el mes");
            return false;
        }else if(anio == "" || anio.length == 0 || anio == null || anio.match(/^\s+|\s+$/)){
            alert("Por favor seleccione el año");
            return false;
        }else if(calle.match(/^\s+|\s+$/)){
            alert("Solo se aceptan letras y numeros");
            document.frm_mod_alumno.calle.select();
            document.frm_mod_alumno.calle.focus();
            return false;
        }else if(colonia.match(/^\s+|\s+$/)){
            alert("Solo se aceptan letras y numeros");
            document.frm_mod_alumno.colonia.select();
            document.frm_mod_alumno.colonia.focus();
            return false;
        }else if(localidad.match(/^\s+|\s+$/)){
            alert("Solo se aceptan letras y numeros");
            document.frm_mod_alumno.localidad.select();
            document.frm_mod_alumno.localidad.focus();
            return false;
        }else if(municipio.match(/^\s+|\s+$/)){
            alert("Solo se aceptan letras y numeros");
            document.frm_mod_alumno.municipio.select();
            document.frm_mod_alumno.municipio.focus();
            return false;
        }else if(estado.match(/^\s+|\s+$/)){
            alert("Por favor seleccione el estado");
            return false; 
        }else if(telefono.match(/^\s+|\s+$/) || telefono.length > 10 || isNaN(telefono)){
            alert("Número de telefono invalido solo 10 digitos seguidos");
            document.frm_mod_alumno.telefono.select();
            document.frm_mod_alumno.telefono.focus();
            return false;
        }else if(correo.match(/^\s+|\s+$/)){
            alert("Correo no valido");
            document.frm_mod_alumno.correo.select();
            document.frm_mod_alumno.correo.focus();
            return false;
        }else if(nssocial.match(/^\s+|\s+$/) || isNaN(nssocial)){
                if(nssocial.length <11){
            alert("Número de seguro social no valido solo 11 digitos seguidos");
            document.frm_mod_alumno.nssocial.select();
            document.frm_mod_alumno.nssocial.focus();
            return false;}
        }else if(tutor.match(/^\s+|\s+$/) || tutor.match(/^[0-9]*.$/)){
            alert("Se aceptan solo letras");
            document.frm_alumno.tutor.select();
            document.frm_alumno.tutor.focus();
            return false;
        }else{
              
        params={};
        params.idAlumno = idAlumno;
        params.nombre = nombre;
        params.nocontrol = nocontrol;
        params.idusuario = idusuario;
        params.id_info = id_info;
        params.curp = curp; 
        params.sexo = sexo;
        params.civil = civil;       
        params.especialidad = especialidad;
        params.dia = dia;
        params.mes = mes;
        params.anio = anio;
        params.calle = calle;
        params.colonia = colonia;
        params.localidad = localidad;
        params.municipio = municipio;
        params.estado = estado;
        params.telefono = telefono;
        params.correo = correo;
        params.nssocial = nssocial;
        params.tutor = tutor;
        params.estatus = estatus;
        
        
        
        
        var entrar = confirm("Se modificara el alumno:  "+idAlumno+".");
		
		
        if (entrar == true){            
            params.action="ActualizarAlumno";
            $('#content').load('listar_alumnos.php', params,function(){
                $('#block').show();
                $('#popupbox').show();
			
			
            })
        }
       } 
    })
    //Buscar Alumnos por nombre
    $('#buscarA').live('click',function(){
        //obtengo el id que guardamos en data-id
        var cat= document.BuscaAlumno.alumno.value;
	
       
        params={};
        params.id=cat;
		
        params.action="Buscar_a";
        $('#content').load('listar_alumnos.php', params,function(){
            
			
            })
		
		
	
    })

    //Buscar por Numero de Control

    $('#buscarnc').live('click',function(){
        //obtengo el id que guardamos en data-id
        var cat= document.BuscaAlumno.nc.value;
	
       
        params={};
        params.id=cat;
		
        params.action="Buscar_nc";
        $('#content').load('listar_alumnos.php', params,function(){
            
			
            })
		
		
	
    })

    //Seleccionar a un Alumno

    $('.select_a').live('click',function(){
        //obtengo el id que guardamos en data-id
        var id=$(this).attr('data-id');
        
        params={};
        params.id=id;
		
        params.action="Mostrar_Alumno";
        $('#content').load('listar_alumnos.php', params,function(){
            
			
            })
	
    })
	
    //Elimianr a un alumno de la carga de la materia
	
    $('.elimianr_credito').live('click',function(){
        //obtengo el id que guardamos en data-id
        var id=$(this).attr('data-id');	
        var crt=$(this).attr('data-id2');	
        var inc= document.ListaCargaA.nc.value;
		
        var entrar = confirm("¿Eliminnar Actividad:  "+crt+"?");
		
		
        if (entrar == true){
			  
            params={};
            params.id=id;
            params.inc=inc;
		
            params.action="ElimianrSol";
            $('#content').load('listar_alumnos.php', params,function(){
            
			
                })
        }
    })
    //Imprimir el Formato

    $('.imprimir_credito').live('click',function(){
        //obtengo el id que guardamos en data-id
        var id=$(this).attr('data-id');	
        	
        var inc= document.ListaCargaA.nc.value;
		
	
				
       
       
        var ruta="../../presentacion/reportes/solicitud_actividad.php?id="+id+"";
      
        var caracteristicas="toolbar=0, location=0, directories=0, resizable=0, scrollbars=0, height=600, width=800, top=200, left=200";
        win=window.open(ruta ,"",caracteristicas);
     
		  
    })
    //Asignar una Materia a un Alumno// Seleccionar el Semestre

    $('#AsignaraCred').live('click',function(){
        //obtengo el id que guardamos en data-id
        var cat= document.ListaCargaA.ida.value;
        var nc= document.ListaCargaA.nc.value;
        var car= document.ListaCargaA.idc.value;
	
	    
        params={};
        params.ida=cat;
        params.nc =nc;
        params.car=car;
		
        params.action="AsignarCredito";
        $('#popupbox').load('listar_alumnos.php', params,function(){
            $('#block').show();
            $('#popupbox').show();
        })
		
		
	
    })
	
	
	

    //Mostrar Materias a Seleccioanar

    $('#slect_carrera').live('click',function(){
        //obtengo el id que guardamos en data-id
        var ida= document.select_Carrera.ida.value;
        var idcar= document.select_Carrera.carrera.value;
        var idsem= document.select_Carrera.semestre.value;
        var nc = document.select_Carrera.nc.value;
	
	  
	    
        params={};
        params.ida=ida;
        params.idcar=idcar;
        params.idsem = idsem;
        params.nc=nc;
	
        params.action="ListarCargaAsignar";
        $('#popupbox').load('listar_alumnos.php', params,function(){
            $('#block').show();
            $('#popupbox').show();
        })
		
		
	
    })
	
    //Seleccionar Caga A Agregar a un Alumno
	
	
    $('.select_credito').live('click',function(){
        //obtengo el id que guardamos en data-id
        var id=$(this).attr('data-id');
        var id2=$(this).attr('data-id2');
        var ida= document.ListaCreditos.ida.value;
        var nc= document.ListaCreditos.nc.value;
		
	  
        var entrar = confirm("¿Asignar el Credito:  "+id2+"?");
		
		
        if (entrar == true){
            params={};
            params.id=id;
            params.ida=ida;
            params.inc=nc;
	
            params.action="AsignarCreditoAlumno";
            $('#content').load('listar_alumnos.php', params,function(){
                $('#block').hide();
                $('#popupbox').hide();
			
            })
		
        }
	
    })
    
    $('#saveC').live('click',function(){
        var car= document.frm_Credito.idc.value;
        var nc= document.frm_Credito.nc.value;
        var ida= document.frm_Credito.ida.value; 
        var credito= document.frm_Credito.Credito.value;  
        var docente= document.frm_Credito.Docente.value; 
        var desc = document.frm_Credito.txtdescripcion.value;    
        
        
        params={};
        params.idc=car;
        params.ida=ida;
        params.nc=nc;
        params.credito=credito;
        params.docente=docente;
        params.desc = desc;
		
        var entrar = confirm("¿Se Asignara una Activiad Complementaria a:  "+nc+"?");
		
		
        if (entrar == true){
            params.action="Save_Credito";
            $('#content').load('listar_alumnos.php', params,function(){
                $('#block').hide();
                $('#popupbox').hide();
			
			
            })
        }
    })
    //funcion para lanzar el formulario para registrar materia
    $('#AgregarM').live('click', function(){
             
        params = {};
                
        params.action= "AgregarMateria";
        $('#popupbox').load('listar_materias.php', params,function(){
            $('#block').show();
            $('#popupbox').show();
        })
    })
                                    
                                       
      //guarda la materia desde el formulario                                 
    $('#saveM').live('click',function(){
        
        var nombre = document.frm_materia.nombre.value.toUpperCase();
        var creditos = document.frm_materia.creditos.value; 
        var hteo = document.frm_materia.hteo.value;
        var hpra = document.frm_materia.hpra.value;
        var clave = document.frm_materia.clave.value.toUpperCase();
        var nomcorto = document.frm_materia.nomcorto.value.toUpperCase();
        var carrera_dep = document.frm_materia.carreradep.value;
        var ret_cvo = document.frm_materia.retcvo.value.toUpperCase();
        var semestre = document.frm_materia.semestre.value;
        var unidades = document.frm_materia.unidades.value;
        
        if(nombre == "" || nombre.length == 0 || nombre == null || nombre.match(/^\s+|\s+$/)){
            alert("Ingrese el nombre");
            document.frm_materia.nombre.select();
            document.frm_materia.nombre.focus();
            return false;
        }else if(nombre.match(/^[0-9]+$/)){
            alert("El nombre solo puede contener letras");
            document.frm_materia.nombre.select();
            document.frm_materia.nombre.focus();
            return false;        
        }else if(creditos == "" || creditos == null || creditos.match(/^\s+|\s+$/)){
            alert("Ingrese los creditos");
            document.frm_materia.creditos.select();
            document.frm_materia.creditos.focus();
            return false;
        }else if(isNaN(creditos)){
            alert("Debe ingresar un número entero");
            document.frm_materia.creditos.select();
            document.frm_materia.creditos.focus();
            return false;
        }else if(hpra == "" || hpra == null || isNaN(hpra) || hpra.match(/^\s+|\s+$/)){
            alert("Ingrese las horas practicas, solo numeros");
            document.frm_materia.hpra.select();
            document.frm_materia.hpra.focus();
            return false;
        }else if(hteo == "" || hteo == null || isNaN(hteo) || hteo.match(/^\s+|\s+$/)){
            alert("Ingrese las horas teoricas, solo numeros");
            document.frm_materia.hteo.select();
            document.frm_materia.hteo.focus();
            return false;
        }else if(!clave.match(/^[0-9a-zA-Z]+$/) || clave.match(/^\s+|\s+$/)){
            alert("Ingrese la clave, solo se aceptan letras y numeros");
            document.frm_materia.clave.select();
            document.frm_materia.clave.focus();
            return false;
        }else if(nomcorto.match(/^\s+|\s+$/)){
            alert("Ingrese el nombre corto, solo se aceptan letras y numeros");
            document.frm_materia.nomcorto.select();
            document.frm_materia.nomcorto.focus();
            return false;
        }else if(isNaN(carrera_dep) || carrera_dep.match(/^\s+|\s+$/)){
            alert("Ingrese el departamento de la carrera, solo se aceptan numeros");
            document.frm_materia.carrera_dep.select();
            document.frm_materia.carrera_dep.focus();
            return false;
        }else if(ret_cvo.match(/^\s+|\s+$/)){
            alert("Ingrese la clave de retícula, solo se aceptan letras y numeros");
            document.frm_materia.ret_cvo.select();
            document.frm_materia.ret_cvo.focus();
            return false;
        }else if(isNaN(semestre) || semestre.match(/^\s+|\s+$/)){
            alert("Ingrese el semestre, solo se aceptan numeros");
            document.frm_materia.semestre.select();
            document.frm_materia.semestre.focus();
            return false;
        }else if(unidades == "" || unidades == null || unidades.match(/^\s+|\s+$/)|| isNaN(unidades)){
            alert("Ingrese el número de unidades");
            document.frm_materia.unidades.select();
            document.frm_materia.unidades.focus();
            return false;
        }else{
        params={};
        params.nombre=nombre;
        params.creditos=creditos;
        params.hteo=hteo;
        params.hpra=hpra;
        params.clave=clave;
        params.nomcorto=nomcorto;
        params.carrera_dep=carrera_dep;
        params.ret_cvo=ret_cvo;
        params.semestre=semestre;
        params.unidades=unidades;
				
        var entrar = confirm("¿Se guardara la materia:  "+nombre+"?");
		
		
        if (entrar == true){            
            params.action="Save_Materia";
            $('#content').load('listar_materias.php', params,function(){
                $('#block').hide();
                $('#popupbox').hide();
			
			
                })
            }
    
        }
    })
        //funcion para eliminar una materia
         $('.select_em').live('click',function(){
        //obtengo el id que guardamos en data-id
        var id=$(this).attr('data-idm');
        var nombre = $(this).attr('data-nombre');		
        var entrar = confirm("¿Eliminar Materia: "+id+" "+nombre+"?");
		
		
        if (entrar == true){
			  
            params={};
            params.id=id;

		
            params.action="EliminarMateria";
            $('#content').load('listar_materias.php', params,function(){
            
			
                })
        }
    })    
    
     //fucnción para modificar una materia
    $('.select_mm').live('click', function(){
        var id=$(this).attr('data-idm');
        var nombre = $(this).attr('data-nombre');
        var entrar = confirm("¿Modificar Materia: "+id+" "+nombre+"?");
        
        if(entrar == true){
            params = {};
            params.id = id;
            
            params.action = "ModificarMateria";
            $('#popupbox').load('listar_materias.php', params, function(){
                $('#block').show();
                $('#popupbox').show();    
            })
        }
    })
    
      $('#updateM').live('click', function(){
         
        var id = document.frm_mod_materia.id.value; 
        var nombre  = document.frm_mod_materia.nombre.value.toUpperCase();
        var creditos = document.frm_mod_materia.creditos.value; 
        var hpra = document.frm_mod_materia.hpra.value;
        var hteo = document.frm_mod_materia.hteo.value;        
        var clave = document.frm_mod_materia.clave.value.toUpperCase();
        var nomcorto = document.frm_mod_materia.nomcorto.value.toUpperCase();
        var carrera_dep = document.frm_mod_materia.carreradep.value;
        var ret_cvo = document.frm_mod_materia.retcvo.value;
        var semestre = document.frm_mod_materia.semestre.value;
        var unidades = document.frm_mod_materia.unidades.value;
        
         if(nombre == "" || nombre.length == 0 || nombre == null || nombre.match(/^\s+|\s+$/)){
            alert("Ingrese el nombre");
            document.frm_mod_materia.nombre.select();
            document.frm_mod_materia.nombre.focus();
            return false;
        }else if(nombre.match(/^[0-9]+$/)){
            alert("El nombre solo puede contener letras");
            document.frm_mod_materia.nombre.select();
            document.frm_mod_materia.nombre.focus();
            return false;        
        }else if(creditos == "" || creditos == null || creditos.match(/^\s+|\s+$/)){
            alert("Ingrese los creditos");
            document.frm_mod_materia.creditos.select();
            document.frm_mod_materia.creditos.focus();
            return false;
        }else if(isNaN(creditos)){
            alert("Debe ingresar un número entero");
            document.frm_mod_materia.creditos.select();
            document.frm_mod_materia.creditos.focus();
            return false;
        }else if(hpra == "" || hpra == null || isNaN(hpra) || hpra.match(/^\s+|\s+$/)){
            alert("Ingrese las horas practicas, solo numeros");
            document.frm_mod_materia.hpra.select();
            document.frm_mod_materia.hpra.focus();
            return false;
        }else if(hteo == "" || hteo == null || isNaN(hteo) || hteo.match(/^\s+|\s+$/)){
            alert("Ingrese las horas teoricas, solo numeros");
            document.frm_mod_materia.hteo.select();
            document.frm_mod_materia.hteo.focus();
            return false;
        }else if(!clave.match(/^[0-9a-zA-Z]+$/) || clave.match(/^\s+|\s+$/)){
            alert("Ingrese la clave, solo se aceptan letras y numeros");
            document.frm_mod_materia.clave.select();
            document.frm_mod_materia.clave.focus();
            return false;
        }else if(nomcorto.match(/^\s+|\s+$/)){
            alert("Ingrese el nombre corto, solo se aceptan letras y numeros");
            document.frm_mod_materia.nomcorto.select();
            document.frm_mod_materia.nomcorto.focus();
            return false;
        }else if(isNaN(carrera_dep) || carrera_dep.match(/^\s+|\s+$/)){
            alert("Ingrese el departamento de la carrera, solo se aceptan numeros");
            document.frm_mod_materia.carrera_dep.select();
            document.frm_mod_materia.carrera_dep.focus();
            return false;
        }else if(ret_cvo.match(/^\s+|\s+$/)){
            alert("Ingrese la clave de retícula, solo se aceptan letras y numeros");
            document.frm_mod_materia.ret_cvo.select();
            document.frm_mod_materia.ret_cvo.focus();
            return false;
        }else if(isNaN(semestre) || semestre.match(/^\s+|\s+$/)){
            alert("Ingrese el semestre, solo se aceptan numeros");
            document.frm_mod_materia.semestre.select();
            document.frm_mod_materia.semestre.focus();
            return false;
        }else if(unidades == "" || unidades == null || unidades.match(/^\s+|\s+$/)|| isNaN(unidades)){
            alert("Ingrese el número de unidades");
            document.frm_mod_materia.unidades.select();
            document.frm_mod_materia.unidades.focus();
            return false;
        }else{ 
        params={};
        params.id=id;
        params.nombre=nombre;
        params.creditos=creditos;
        params.hpra=hpra;
        params.hteo=hteo;        
        params.clave=clave;
        params.nomcorto=nomcorto;
        params.carrera_dep=carrera_dep;
        params.ret_cvo=ret_cvo;
        params.semestre=semestre;
        params.unidades=unidades;
        
        
        var entrar = confirm("Se modificara la materia: "+id+".");
        
            if(entrar == true){
                params.action="ActualizarMateria";
                $('#content').load('listar_materias.php', params, function(){
                    $('#block').show();
                    $('#popupbox').show();
                })
            }
        }    
    })
      //Buscar materia por nombre
   
   $('#buscarM').live('click',function(){
          
          var nombre = document.frm_listmateria.nombre_mat.value.toUpperCase();
          
         
          params={};
          params.nombre=nombre;
          
  		
          params.action="Buscar_m";
          $('#content').load('listar_materias.php', params,function(){
              
  			
              })
  		
  		
  	
      })
 
    
    //función que lanza el formulario para registrar un docente
      $('#AgregarD').live('click',function(){
        //obtengo el id que guardamos en data-id
        params={};
		
		
        params.action="AgregarDocente";
        $('#popupbox').load('listar_docentes.php', params,function(){
            $('#block').show();
            $('#popupbox').show();
        })
		
		
	
    })
	  //función para registrar un docente desde el formulario
	  $('#saveD').live('click', function(){

        var idusuario = document.frm_docente.idusuario.value;
      	var nombre = document.frm_docente.nombre.value.toUpperCase();
       
        if(idusuario == "" || idusuario == null || idusuario.length == 0 || idusuario.match(/^\s+|\s+$/)) {
            alert("Ingrese el id de usuario");
            document.frm_docente.idusuario.select();
            document.frm_docente.idusuario.focus();
            return false;
        }else if(isNaN(idusuario)){
            alert("Debe ingresar un número entero");
            document.frm_docente.idusuario.select();
            document.frm_docente.idusuario.focus();
            return false;
        }else if(nombre == "" || nombre.length == 0 || nombre == null || nombre.match(/^\s+|\s+$/)){
            alert("Ingrese el nombre");
            document.frm_docente.nombre.select();
            document.frm_docente.nombre.focus();
            return false;
        }else if(nombre.match(/^[0-9a-zA-Z0-9]+$/)){
            alert("El nombre solo puede contener letras");
            document.frm_docente.nombre.select();
            document.frm_docente.nombre.focus();
            return false;
        }else{
       	params = {};
		params.idusuario = idusuario;
		params.nombre = nombre;
        
        
        var entrar = confirm("¿Se guardara el docente:  "+nombre+"?");
		
         if (entrar == true){
            params.action="Save_Docente";
            $('#content').load('listar_docentes.php', params,function(){
                $('#block').hide();
                $('#popupbox').hide();
			
			
            })
          }  
        
       }
        							   
	})  
	
	
    //buscar un docente
    $('#buscarD').live('click',function(){
          
          var nombre = document.frm_listdocente.nombre_doc.value.toUpperCase();
  	
         
          params={};
          params.nombre=nombre;
  		
          params.action="Buscar_d";
          $('#content').load('listar_docentes.php', params,function(){
              
  			
              })
  		
  		
  	
      })

    	//función para eliminar un docente
   $('.select_ed').live('click',function(){
        //obtengo el id que guardamos en data-id
        var id=$(this).attr('data-idd'); 
        var nombre = $(this).attr('data-nombre');      
		
        var entrar = confirm("¿Eliminar Docente: "+id+" "+nombre+"?");
		
		
        if (entrar == true){			  
            params={};
            params.id=id;		
            params.action="Eliminar_Dependencia";
            $('#content').load('listar_dependencia.php', params,function(){		
                })
        }
    })
	  	//función para eliminar un programa
   $('.select_prog').live('click',function(){
        //obtengo el id que guardamos en data-id
        var id_programa=$(this).attr('data-idd'); 
        var nombre_programa = $(this).attr('data-nombre');      
		
        var entrar = confirm("¿Eliminar Programa: "+id_programa+" "+nombre_programa+"?");
		
		
        if (entrar == true){			  
            params={};
            params.id_programa=id_programa;		
            params.action="Eliminar_Dependencia";
            $('#content').load('listar_programa.php', params,function(){		
                })
        }
    })
    //fucnción para modifcar un docente
    $('.select_md').live('click', function(){
        var id=$(this).attr('data-idd');
        var nombre = $(this).attr('data-nombre');
        var entrar = confirm("¿Modificar dependencia: "+id+" "+"?");
        
        if(entrar == true){
            params = {};
            params.id = id;
            
            params.action = "ModificarDocente";
            $('#popupbox').load('listar_dependencia.php', params, function(){
                $('#block').show();
                $('#popupbox').show();    
            })
        }
    })
	  //fucnción para modifcar un apoyo
    $('.select_ap').live('click', function(){
        var id=$(this).attr('data-idd');
        var nombre = $(this).attr('data-nombre');
        var entrar = confirm("¿Modificar apoyo: "+id+" "+"?");
        
        if(entrar == true){
            params = {};
            params.id = id;
            
            params.action = "ModificarDocente";
            $('#popupbox').load('listar_apoyo.php', params, function(){
                $('#block').show();
                $('#popupbox').show();    
            })
        }
    })
	 //fucnción para modifcar un docente
    $('.usuarios').live('click', function(){
       var id = document.frm_dependencia.usuarios.value;
	  var entrar = confirm("¿Modificar dependencia: "+id+" "+"?");
        alert("aquientro");
        if(entrar == true){
            params = {};
            params.id = id;
            
            params.action = "Consultar";
            $('#popupbox').load('listar_apoyo.php', params, function(){
                $('#block').show();
                $('#popupbox').show();    
            })
        }
    })
       //función para modificar un docente
    $('#updateD').live('click', function(){
        // var id=$(this).attr('data-idad');
		 var id = document.frm_mod_dependencia.id.value;
		  var nombre = document.frm_mod_dependencia.nombre.value;
        var responsable  = document.frm_mod_dependencia.responsable.value;
		 var ubicacion  = document.frm_mod_dependencia.ub.value;
	    {
        params  = {};
        params.id = id;
	    params.nombre = nombre;
		params.responsable = responsable;
		params.ubicacion = ubicacion;
		var entrar = confirm("Se modificá la dependencia: "+id+".");
         if(entrar == true){
                params.action="ActualizarDocente";
                $('#content').load('listar_dependencia.php', params, function(){
                    $('#block').show();
                    $('#popupbox').show();
                })
            }
         }   
    })
       //función para modificar un docente
    $('#updateAP').live('click', function(){
        // var id=$(this).attr('data-idad');
		 var nombre_proyecto = document.frm_mod_dependencia.nombre.value;
		var monto = document.frm_mod_dependencia.ub.value;
	    var nombre_programa = document.frm_mod_dependencia.select1.value;
		var dependencia = document.frm_mod_dependencia.select2.value;
		alert (nombre_proyecto);
	 {
        params  = {};
        params.nombre_proyecto = nombre_proyecto;
		params.monto = monto;
		params.nombre_programa = nombre_programa; 
		params.dependencia = dependencia;
		var entrar = confirm("Se modificá la apoyo: "+nombre+".");
         if(entrar == true){
                params.action="ActualizarDocente";
                $('#content').load('listar_apoyo.php', params, function(){
                    $('#block').show();
                    $('#popupbox').show();
                })
            }
         }   
    })
   $('#updateH').live('click', function(){
         var id_programa = document.frm_mod_dependencia.id.value;
		 var nombre = document.frm_mod_dependencia.nombre.value;
		var descripcion = document.frm_mod_dependencia.desc.value;
	    var caracteristicacs = document.frm_mod_dependencia.caracte.value;
		var estatus = document.frm_mod_dependencia.estatus.value;
		var monto = document.frm_mod_dependencia.monto.value;
		var categoria = document.frm_mod_dependencia.cat.value;
		var convocatoria = document.frm_mod_dependencia.conv.value;
	  {
       params={};
	    params.id_programa = id_programa;
        params.nombre = nombre;
		params.descripcion = descripcion;
		params.caracteristicacs = caracteristicacs; 
		params.estatus = estatus;
		params.monto = monto;
		params.categoria = categoria;
		params.convocatoria = convocatoria; 
		 var entrar = confirm("Se modificá el programa: "+nombre+".");
         if(entrar == true){
                params.action="ActualizarDocente";
                $('#content').load('listar_programa.php', params, function(){
                    $('#block').show();
                    $('#popupbox').show();
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
