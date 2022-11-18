var base_url=document.getElementById("base_url").value;
var alerta = document.getElementById("alert_respuesta");
var id_enc=0;
function MostrarCaja(element) {
    event.preventDefault();
    $opcion = element.id.split('_');
    document.getElementById("caja_"+$opcion[2]).style.display="block";
    document.getElementById("con_bajar_"+$opcion[2]).style.display="none";
    document.getElementById("con_subir_"+$opcion[2]).style.display="block";
    $('#camp_'+$opcion[2]).addClass('activado'); 
}
function OcultarCaja(element) {
    event.preventDefault();
    $opcion = element.id.split('_');
    document.getElementById("caja_"+$opcion[2]).style.display="none";
    document.getElementById("con_bajar_"+$opcion[2]).style.display="block";
    document.getElementById("con_subir_"+$opcion[2]).style.display="none";
    $('#camp_'+$opcion[2]).removeClass('activado'); 
}

// JQUERY
// $.each($('a.disabled'), function(index, value) {
//     $(this).css('pointer-events','none');
//     $(this).css('cursor','not-allowed');
// });
async function validacionDni(dni,id_enc){

    let result; /* Variable Resultado de Funcion */

    // Validar existe
        try {

            const postData = {           
                dni : dni,
                id_enc : id_enc
            };

            await $.ajax({
                method: "POST",
                url: base_url+"asesor/validaCliente",
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

function  resetearValida() {
    document.getElementById("error_desc_dni").style.display="none";
    document.getElementById("error_desc_nombres").style.display="none";
    document.getElementById("error_desc_correo").style.display="none";
}

function valida_datos(){
    //valido la descripcion
    $cadena=0;
    if (document.form_respuestas.cliente_dni.value.length==0 ){
        document.getElementById("error_desc_dni").style.display="block";
        document.getElementById("error_desc_dni").innerHTML ='Debe ingresar el número de Dni';
           document.form_respuestas.cliente_dni.focus();
           $cadena++;
    }
    if (document.form_respuestas.cliente_dni.value.length  < 8){
        document.getElementById("error_desc_dni").style.display="block";
        document.getElementById("error_desc_dni").innerHTML ='Debe ingresar un dni de 8 números';
           document.form_respuestas.cliente_dni.focus();
           $cadena++;
    }
    if (document.form_respuestas.cliente_nombres.value.length==0 ){
        document.getElementById("error_desc_nombres").style.display="block";
        document.getElementById("error_desc_nombres").innerHTML ='Debe ingresar nombres y apellidos';
           document.form_respuestas.cliente_nombres.focus();
           $cadena++;
    }
    if (document.form_respuestas.cliente_correo.value.length==0 ){
        document.getElementById("error_desc_correo").style.display="block";
        document.getElementById("error_desc_correo").innerHTML ='Debe ingresar correo';
           document.form_respuestas.cliente_correo.focus();
           $cadena++;
    }
    if($cadena == 0){
        return true;
        
    }else{
        return 0;
    }
   

}
$(document).ready( function() {
  // Action next
  $('.btn-next').on('click', async function() {
    // Get value from data-to in button next
    const n = $(this).attr('data-to');
    // Action trigger click for tag a with id in value n
    resetearValida();
    $valida = valida_datos();
    if($valida){
         if ((await validacionDni(document.getElementById("cliente_dni").value,id_enc))){
                //   console.log("error");
                    alerta.innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert">'+
                    'El cliente ya fue encuestado'+
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                        '<span aria-hidden="true">&times;</span>'+
                        '</button>'+
                    '</div>';
                    document.form_respuestas.cliente_dni.focus();
      
 
         }else{
            $(n).removeClass('disabled');
            $(n).trigger('click');
         }
      
          
       
      
    }
   
  });
  // Action back
  $('.btn-prev').on('click', function() {
    // Get value from data-to in button prev
    const n = $(this).attr('data-to');
  
  });
  $('.btn-finish').on('click', function() {
    // Get value from data-to in button prev
    const n = $(this).attr('data-to');
    $dato=document.querySelectorAll('.nav-link');
    console.log($dato);
    $dato.forEach(element => {
        // const n = $(this).attr('data-to');
        $('#'+element.id).addClass('disabled');
    });
    $(n).removeClass('disabled');
    // Action trigger click for tag a with id in value n
    $(n).trigger('click');
    
  });
  $('.new_encuesta').on('click', function() {
    // console.log("click");
    const n = $(this).attr('data-to');
    document.getElementById("form_respuestas").reset();
    $(n).removeClass('disabled');
    $(n).trigger('click');
  });
});
  //guardamos la data
document.getElementById("guardar_respuesta").addEventListener("click",function(event){
 
  $ratios = document.querySelectorAll('.body_encuesta input[type=radio]:checked');
  $datosPreg = [];
  $datosOp = [];
  $ratios.forEach(element => {
    $respuesta = element.id.split('_');
    $pregunta = element.name.split('_');
    $datosOp.push($respuesta[1]);
    $datosPreg.push($pregunta[1]);
    
  });
  // console.log( $datosPreg);
  // console.log($datosOp);
  const postData = { 
    cliente_dni: document.getElementById("cliente_dni").value,
    cliente_nombres: document.getElementById("cliente_nombres").value,
    cliente_correo: document.getElementById("cliente_correo").value,
    dataPreguntas:$datosPreg,
    dataRespuestas:$datosOp
  };

  try {
     // console.log(postData);
      $.ajax({
          method: "POST",
          url: base_url+"asesor/registerRespuesta/"+id_enc,
          data: postData,
          dataType: "JSON"
      })
      .done(function(respuesta) {
          console.log(respuesta);
        

    

      })
      .fail(function(error) {
          // alert("Error en el ajax");
      })
      .always(function() {
      });
  }
  catch(err) {
      // alert("Error en el try");
  }
})

// $(document).ready(function () {

//   var navListItems = $('div.setup-panel div a'),
//           allWells = $('.setup-content'),
//           allNextBtn = $('.nextBtn');

//   allWells.hide();

//   navListItems.click(function (e) {
//       e.preventDefault();
//       var $target = $($(this).attr('href')),
//               $item = $(this);

//       if (!$item.hasClass('disabled')) {
//           navListItems.removeClass('btn-primary').addClass('back_btn_circle');
//           $item.addClass('btn-primary');
//           allWells.hide();
//           $target.show();
//           $target.find('input:eq(0)').focus();
//       }
//   });

//   allNextBtn.click(function(){
//       var curStep = $(this).closest(".setup-content"),
//           curStepBtn = curStep.attr("id"),
//           nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
//           curInputs = curStep.find("input[type='text'],input[type='url']"),
//           isValid = true;

//       $(".form-group").removeClass("has-error");
//       for(var i=0; i<curInputs.length; i++){
//           if (!curInputs[i].validity.valid){
//               isValid = false;
//               $(curInputs[i]).closest(".form-group").addClass("has-error");
//           }
//       }

//       if (isValid)
//           nextStepWizard.removeAttr('disabled').trigger('click');
//   });

//   $('div.setup-panel div a.btn-primary').trigger('click');
// });


//aqui mostrarmos la encuesta a realizar
function MostrarEncuesta(element) {
    event.preventDefault();
    $opcion = element.id.split('_');
    id_enc=$opcion[1];
    document.getElementById("img_encuesta").style.display="none";
    $('.cargando').html('<div class="d-flex align-items-center justify-content-center"><div class="spinner-border text-success m-1" role="status"></div><span class="">Cargando...</span> </div>');
    const postData = { 
    };
    try {
       // console.log(postData);
        $.ajax({
            method: "POST",
            url: base_url+"asesor/getEncuestas/"+$opcion[1],
            data: postData,
            dataType: "JSON"
        })
        .done(function(respuesta) {
            // console.log(respuesta);
            $('.cargando').html('');
            document.getElementById("basic-pills-wizard").style.display="block";
            var pregunta=document.getElementById("pregunta");
            pregunta.innerHTML='';
            respuesta[0].forEach(element => {
                pregunta.insertAdjacentHTML('beforeend','<div class="row card card-body">'+
                '<div class="col-lg-12">'+
                    '<div class="">'+
                        '<h5 class="font-size-14 mb-3">'+element.pos_preg+". "+element.desc_preg+'</h5>'+
                        '<div id="opcion_'+element.id_preg+'">'+
                        '</div>'+
                    '</div>'+
                    
                '</div>'+
            '</div>');
            });
            respuesta[0].forEach(element => {
                respuesta[1].forEach(opcion => {
                    if(element.id_preg==opcion.id_preg)
                    document.getElementById("opcion_"+element.id_preg).insertAdjacentHTML('beforeend', '<div class="custom-control custom-radio mb-1">'+
                                                                                                            '<input type="radio" id="radio_'+opcion.id_op+'" name="radio_'+element.id_preg+'" class="custom-control-input">'+
                                                                                                            '<label class="custom-control-label" for="radio_'+opcion.id_op+'">'+opcion.desc_op+'</label>'+
                                                                                                        '</div>');
                });
            });

          
          
          // document.getElementById("guardar_respuesta").addEventListener('click',()=>guardarRespuesta($ratios));
      

        })
        .fail(function(error) {
            // alert("Error en el ajax");
        })
        .always(function() {
        });
    }
    catch(err) {
        // alert("Error en el try");
    }

}

//aqui valido el form-wizar

window.addEventListener("load", () => {
   
    $bajar = document.querySelectorAll('.campania .bajar');
    $subir = document.querySelectorAll('.campania .subir');
    $encuesta = document.querySelectorAll('.campania .encuesta');
    // $datos = document.querySelectorAll('.pregunta .list-group-item .check_opcion');
      
    // $cancel = document.querySelectorAll('.pregunta .row .cancel');
    $bajar.forEach((btn,i) => {   
        btn.addEventListener('click',()=>MostrarCaja(btn));
    });
    $subir.forEach((btn,i) => {   
        btn.addEventListener('click',()=>OcultarCaja(btn));
    });
    $encuesta.forEach((btn,i) => {   
        btn.addEventListener('click',()=>MostrarEncuesta(btn));
    });
})

    