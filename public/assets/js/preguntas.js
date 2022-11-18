var base_url=document.getElementById("base_url").value;
var alerta = document.getElementById("alert_pregunta");
var datos = '';
var remove = '';
var valor_opcion=-1;
var contador_opcion = 1;
function valida_pregunta(){
    //valido la descripcion
    if (document.form_pregunta.titulo_pregunta.value.length==0){
        document.getElementById("error_desc_preg").style.display="block";
        document.getElementById("error_desc_preg").innerHTML ='Debe ingresar el nombre de la Pregunta';
           document.form_pregunta.titulo_pregunta.focus();
           return 0;
    }
    return true;

}
//validacion existencial de la descripcion
async function validacionPregunta(desc_preg,id_enc){

    let result; /* Variable Resultado de Funcion */

    // Validar existe
        try {

            const postData = {           
                titulo_pregunta : desc_preg,
                id_enc : id_enc
            };

            await $.ajax({
                method: "POST",
                url: base_url+"main/validaPregunta",
                data: postData,
                dataType: "JSON"
            })
            .done(function(respuesta) {
                result = respuesta;
            })
            .fail(function(error) {
                // alert("Se produjo el siguiente error: ".err);
            })
            .always(function() {
            });
        }
        catch(err) {
            // alert("Se produjo el siguiente error: ".err);
        }
    // /.Validar existe

    return result; /* Retorno de Resultado */

};

function verCheckPreg(element,posicion) {
    // console.log(element);
    $opcion = element.id.split('_');
    // console.log(document.getElementById("check_preg_1_"+$opcion[3]));
    // console.log( $opcion[3]);
    document.getElementById("extra_preg_1_"+$opcion[3]).style.display = "block";
    if(!document.getElementById("check_preg_1_"+$opcion[3]).checked){
        document.getElementById("extra_preg_1_"+$opcion[3]).style.display = "none";
    }
}
function removeOpcion(element) {
    event.preventDefault();
    $opcion = element.id.split('_');
    valor_opcion = $opcion[4];
    if($("#preg_1_"+valor_opcion).length == 1){
        // console.log($("#preg_1_"+$opcion[4]));
        $("#preg_1_"+valor_opcion).remove();
        
    }   
    
}
document.getElementById("delete_pregunta").addEventListener("click",function(event){
    event.preventDefault();                      
   document.getElementById("pregunta").style.display="none";   
   document.getElementById("form_pregunta").reset();
   document.getElementById("list_opcion").innerHTML='';

});
document.getElementById("add_pregunta").addEventListener("click",function(event){
    event.preventDefault();   
    document.getElementById("pregunta").style.display="block"; 
    document.form_pregunta.titulo_pregunta.focus();      
    // document.getElementById("pregunta").innerHTML = '<ul class="list-group list-group-flush">'+
    //                                                     '<div class="row">'+
    //                                                         '<div class="col-lg-12 d-flex justify-content-center">'+
    //                                                             '<i class="mdi mdi-drag font-size-24" data-toggle="tooltip" data-placement="top" title="" data-original-title="Arrastrar"></i>'+
    //                                                         '</div>'+
                                                        
    //                                                     '</div>'+
    //                                                     '<li class="list-group-item">'+
    //                                                         '<div class="card-body ">'+
    //                                                             '<div class="row mb-3">'+
    //                                                                 '<div class="col-lg-12">'+
    //                                                                     '<div class="form-group">'+
    //                                                                         '<div class="user-box" id="">'+
    //                                                                             '<input type="text"  name="" id="titulo_pregunta" required="" value="" placeholder="Título de la Pregunta">'+
    //                                                                         '</div>'+
                                                                        
    //                                                                     '</div>'+
    //                                                                 '</div>'+
                                                                    
    //                                                             '</div>'+
    //                                                             '<div id="list_opcion">'+
                                                                
    //                                                             '</div>'+
                                                                

    //                                                                 '<div class="row">'+
    //                                                                     '<div class="col-lg-12">'+
    //                                                                         '<div class="form-group  mb-1">'+
                                                                                
    //                                                                                 '<a href="" id="add_opcion"   class="btn btn-link waves-effect ">'+
    //                                                                                 '<i class=" fas fa-plus-circle align-middle mr-2"></i>Añadir Opción</a>'+
                                                                                    
                                                                                
    //                                                                         '</div>'+
    //                                                                     '</div>'+
    //                                                                 '</div>'+
    //                                                         '</div>'+
    //                                                     '</li>'+
    //                                                     '<li class="list-group-item">'+
    //                                                             '<div class="row d-flex justify-content-end" >'+
    //                                                                 '<div class="col-md-2">'+
    //                                                                     '<div class="form-group">'+
    //                                                                         '<a href="" class="text-success" id="guardar_pregunta" data-toggle="tooltip" data-placement="top" title=""><i class="mdi mdi-content-save font-size-18"></i> Guardar</a>'+
    //                                                                     '</div>'+
    //                                                                 '</div>'+
    //                                                                 '<div class="col-md-2">'+
    //                                                                     '<div class="form-group">'+
    //                                                                         '<a href="" class="text-danger" id="delete_pregunta" data-toggle="tooltip" data-placement="top" title="" ><i class="mdi mdi-trash-can font-size-18"></i> Eliminar</a>'+
    //                                                                     '</div>'+
    //                                                                 '</div>'+
    //                                                                 '<div class="col-md-2">'+
    //                                                                     '<div class="form-group">'+
    //                                                                         '<div class="custom-control custom-switch mb-1" dir="ltr">'+
    //                                                                             '<input type="checkbox" class="custom-control-input" id="obligatorio_pregunta" checked>'+
    //                                                                             '<label class="custom-control-label" for="obligatorio_pregunta">Obligatorio</label>'+
    //                                                                         '</div>'+
    //                                                                     '</div>'+
    //                                                                 '</div>'+
    //                                                             '</div>'+
    //                                                     '</li>'+
    //                                                 '</ul>';


});
document.getElementById("registrar_pregunta").addEventListener("click", async function(event){
    event.preventDefault();
    document.getElementsByName("evento[]").forEach(element => {
        // console.log(element.value);
        // if(element.value.checked){
        //    
        // }
    });
    $obligatorio = 0;
    $valida = valida_pregunta();
    if(document.getElementById("obligatorio_pregunta").checked){
        $obligatorio = 1;
       
    }
        $opciones= document.getElementsByName("opcion[]");
        $data_opciones=Array();
        if($opciones.length == 0){
            $data_opciones=0;
        }else{
            $opciones.forEach(element => {
                // console.log(element.value);
                $data_opciones.push(element.value);
            });
        }
        $eventos= document.getElementsByName("evento[]");
        $data_eventos=Array();
        if($eventos.length == 0){
            $data_eventos=0;
        }else{
            $eventos.forEach(evento => {
                // console.log(element.value);
                $data_eventos.push(evento.value);
            });
        }
    // console.log($data_eventos);
    if($valida){
        
        if (!(await validacionPregunta(document.getElementById("titulo_pregunta").value,document.getElementById("id_enc").value))){
            
            const postData = { 
                titulo_pregunta:document.getElementById("titulo_pregunta").value,
                opciones: $data_opciones,
                eventos: $data_eventos,
                id_enc:document.getElementById("id_enc").value,
                visible:1,
                obligatorio:$obligatorio,      
            };
        // console.log(postData);
            try {
                $.ajax({
                    method: "POST",
                    url: base_url+"main/registerPregunta",
                    data: postData,
                    dataType: "JSON"
                })
                .done(function(respuesta) {
                    // console.log(respuesta);
                    if (respuesta) 
                    {
                    
                        document.getElementById("form_pregunta").reset();
                        document.getElementById("error_desc_preg").innerHTML='';
                        document.getElementById("pregunta").style.display = "none";
                       
                        alerta.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                            'Pregunta Registrada'+
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                                '</button>'+
                        '</div>';
                        setTimeout(window.location.href = base_url+'main/manPreguntas/'+document.getElementById("id_enc").value, 1000);
                        
                    } 
                    else
                    {
                        alerta.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                        'Error al Registrar'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                            '<span aria-hidden="true">&times;</span>'+
                            '</button>'+
                    '</div>';  
                    }
                
                })
                .fail(function(err) {
                    console.log(err);
                })
                .always(function() {
                });
            }
            catch(err) {
                alert(err);
            }
        }else{
            document.getElementById("error_desc_preg").style.display="block";
            document.getElementById("error_desc_preg").innerHTML ='Pregunta ya registrada';
            document.form_pregunta.titulo_pregunta.focus();
        }
       
    }
   
});

function addOpcion(element) {
    event.preventDefault();
    datos = document.querySelectorAll('.pregunta .opcion');
    // contador_opcion = datos.length;
    console.log(datos);
    if(datos.length < 5 ){
        var list_opcion =  document.getElementById("list_opcion");
        // list_opcion.insertAdjacentHTML('afterend', '<div id="preg_1_'+contador_opcion+'"></div>');
        list_opcion.insertAdjacentHTML('beforeend',' <div id="preg_1_'+contador_opcion+'" class="opcion">'+
                                        '<div class="d-flex flex-row">'+
                                            '<div class="custom-control custom-radio mb-3 col-lg-10">'+
                                                        '<input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">'+
                                                        
                                                        '<label class="custom-control-label col-lg-12" for="customRadio1">'+
                                                            '<div class="user-box" id="">'+
                                                                '<input type="text" name="opcion[]" id="preg_opcion_'+contador_opcion+'" placeholder="Opcion">'+
                                                            '</div>'+
                                                        '</label>'+
                                            '</div>'+
                                            '<div class="col-lg-2 col-md-2 col-sm-2 col-2">'+
                                                '<a href="" class="text-danger remove" id="remove_opcion_preg_1_'+contador_opcion+'" data-toggle="tooltip" data-placement="top" title="" data-original-title="Quitar"><i class="mdi mdi-playlist-remove font-size-20"></i></a>'+
                                                
                                            '</div>'+
                                        
                                        '</div>'+
                                        '<div class="custom-control custom-checkbox mb-3">'+
                                            '<input type="checkbox" class="custom-control-input check_opcion" id="check_preg_1_'+contador_opcion+'">'+
                                            '<label class="custom-control-label" for="check_preg_1_'+contador_opcion+'">Indique si esta respuesta va accionar un evento</label>'+
                                        '</div>'+
                                  
                                    '<div class="" id="extra_preg_1_'+contador_opcion+'" style="display:none">'+
                                                                    '<div class="col-lg-12">'+
                                                                        '<div class="form-group row">'+
                                                                            
                                                                            '<label for="" class="col-sm-2 col-form-label">Enviar correo a : </label>'+
                                                                            '<div class="col-sm-10">'+
                                                                                '<select id="select_preg_1_'+contador_opcion+'" name="evento[]" class="form-control">'+
                                                                                    '<option value="0">Seleccione</option>'+
                                                                                    '<option value="1">valtex.com</option>'+
                                                                                '</select>'+
                                                                            '</div>'+
                                                                            
                                                                            
                                                                        '</div>  '+
                                                                    '</div>'+
                                                            
                                                                    

                                    '</div>'+
                                    '</div>');
        contador_opcion++;
    }
    datos = document.querySelectorAll('.pregunta .list-group-item .check_opcion');
    remove = document.querySelectorAll('.pregunta .list-group-item .remove');
    // console.log(remove);
    datos.forEach((btn,i) => { 
        btn.addEventListener('click',()=>verCheckPreg(btn));
    });

    remove.forEach((btn,i) => { 
       
       btn.addEventListener('click',()=>removeOpcion(btn,i));
    });
}

window.addEventListener("load", () => {
   
    $opcion = document.querySelectorAll('.pregunta .list-group-item #add_opcion');
    // $datos = document.querySelectorAll('.pregunta .list-group-item .check_opcion');
      
    // $cancel = document.querySelectorAll('.pregunta .row .cancel');
    $opcion.forEach((btn,i) => {   
        btn.addEventListener('click',()=>addOpcion(btn));
    });

    
     
    
   
 
})