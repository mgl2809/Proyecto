/**
 * Autor: Lucas Forchino
 * Web: http://www.tutorialjquery.com
 *
 */
$(document).ready(function(){ //cuando el html fue cargado iniciar

    //Funciones para el manejo de Alumnos
   
    //Buscar Alumnos por nombre
    $('.select_a').live('click',function(){
        //obtengo el id que guardamos en data-id
        var id=$(this).attr('data-id');
	
       
        params={};
        params.id=id;
		
        params.action="Buscar_a";
        $('#content').load('listar_alumnos.php', params,function(){
            
			
            })
	
    })

    //A;ado la funcionalidad para el Manejo de la Carga de los alumnos
    $('#cargar').live('click',function(){
        //this = es el elemento sobre el que se hizo click en este caso el link
        //obtengo el id que guardamos en data-id
        var id=$(this).attr('data-id');
        var cat= document.cat.cat.value;
        //preparo los parametros
        params={};
        params.id=id;
        params.cat = cat;
        params.action="editcarga";
        $('#popupbox').load('listar_carga.php', params,function(){
            $('#block').show();
            $('#popupbox').show();
        })

    })

    $('.delete').live('click',function(){
        //obtengo el id que guardamos en data-id
        var id=$(this).attr('data-id');
        var id2=$(this).attr('data-id2');
        var cat= document.cat.cat.value;
        var entrar = confirm("¿Eliminnar Grupo:  "+id2+"?");
		
		
        if (entrar == true){
		  
       
            params={};
            params.id=id;
            params.cat=cat;
            params.action="baja";
            $('#content').load('listar_carga.php', params,function(){
            
			
                })
        }
    })



    $('.asignar').live('click',function(){
        //obtengo el id que guardamos en data-id
        var id=$(this).attr('data-id');
        var id2=$(this).attr('data-id2');
        var cat= document.carga.cat.value;
        var entrar = confirm("¿Cargar Grupo:  "+id2+"?");
		
		
        if (entrar == true){
		  
       
            params={};
            params.id=id;
            params.cat = cat;
            params.action="AsignarCarga";
            $('#block').hide();
            $('#popupbox').hide();
            $('#content').load('listar_carga.php', params,function(){
                })
		
        }
    })


    $('#buscar').live('click',function(){
        var id= document.forms.cat.docente.value;
        params={};
        params.id=id;
        params.action="BuscarCarga";
        $('#content').load('listar_carga.php', params,function(){
            
			
            })
    })




    // boton cancelar, uso live en lugar de bind para que tome cualquier boton
    // nuevo que pueda aparecer
    $('#cancel').live('click',function(){
        $('#block').hide();
        $('#popupbox').hide();
    })


})

NS={};
