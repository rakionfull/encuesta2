var base_url=document.getElementById("base_url").value;
var alerta = document.getElementById("alert_encuesta");

//validacion del formulario encaña
function valida_encuesta(){
    //valido la descripcion
    if (document.form_encuesta.desc_enc.value.length==0){
        document.getElementById("error_desc_enc").style.display="block";
        document.getElementById("error_desc_enc").innerHTML ='Debe ingresar el nombre de la Encuesta';
           document.form_encuesta.desc_enc.focus();
           return 0;
    }
    return true;

}
//validacion existencial de la descripcion
async function validacionEncuesta(desc_enc,id_camp){

    let result; /* Variable Resultado de Funcion */

    // Validar existe
        try {

            const postData = {           
                desc_enc : desc_enc,
                id_camp : id_camp
            };

            await $.ajax({
                method: "POST",
                url: base_url+"main/validaEncuesta",
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

document.getElementById("add_encuesta").addEventListener("click",function(event){
    event.preventDefault();   
    document.getElementById("error_desc_enc").innerHTML='';                   
   document.getElementById("form_reg_encuesta").style.display = "block";
   document.form_encuesta.desc_enc.focus();
  

});
document.getElementById("cancel_encuesta").addEventListener("click",function(event){
    event.preventDefault();                      
   document.getElementById("form_reg_encuesta").style.display = "none";


});



//registramos la encaña
function editarEncuesta(element) {
    event.preventDefault();    
    //habiltiar el input respectivo para editar
    $valor=element.id.split("_");
    document.getElementById("desc_enc_"+$valor[2]).disabled=false;
    document.getElementById("ico_enc_"+$valor[2]).style.display="block";
    document.getElementById("ico_enc_"+$valor[2]).className = "col-lg-3 d-flex justify-content-center";
    document.getElementById("action_enc_"+$valor[2]).style.display="none";
    document.getElementById("texto_enc_form_"+$valor[2]).style.display="none";
    document.getElementById("input_desc_enc_"+$valor[2]).style.display="block";

    
   
}
function cancelEncuesta(element) {
    event.preventDefault();     
    $valor=element.id.split("_");       
    document.getElementById("desc_enc_"+$valor[2]).disabled=true;
    document.getElementById("ico_enc_"+$valor[2]).className = "col-lg-3";
    document.getElementById("ico_enc_"+$valor[2]).style.display="none";
    
    document.getElementById("action_enc_"+$valor[2]).style.display="block";
    document.getElementById("texto_desc_enc_"+$valor[2]).style.display="block";
    document.getElementById("texto_enc_form_"+$valor[2]).style.display="none";
}
document.getElementById("registrar_encuesta").addEventListener("click", async function(event){
    event.preventDefault();
    $valida = valida_encuesta();
    if($valida){
        if (!(await validacionEncuesta(document.getElementById("desc_enc").value,document.getElementById("id_camp").value))){
            
            const postData = { 
                desc_enc:document.getElementById("desc_enc").value,
                id_user:1,
                id_camp:document.getElementById("id_camp").value,
                est_enc:1,      
            };
            try {
                $.ajax({
                    method: "POST",
                    url: base_url+"main/registerEncuesta",
                    data: postData,
                    dataType: "JSON"
                })
                .done(function(respuesta) {
                    if (respuesta) 
                    {
                    
                        document.getElementById("form_encuesta").reset();
                        document.getElementById("error_desc_enc").innerHTML='';
                        document.getElementById("form_reg_encuesta").style.display = "none";
                       
                        alerta.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                            'Encuesta Registrada'+
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                                '</button>'+
                        '</div>';
                        setTimeout(window.location.href = base_url+'main/manEncuestas/'+document.getElementById("id_camp").value, 1000);
                        
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
                .fail(function(error) {
                    // alert("Error en el ajax");
                })
                .always(function() {
                });
            }
            catch(err) {
                // alert("Error en el try");
            }
        }else{
            document.getElementById("error_desc_enc").style.display="block";
            document.getElementById("error_desc_enc").innerHTML ='Encuesta ya registrada';
            document.form_encuesta.desc_enc.focus();
        }
       
    }
   
});
window.addEventListener("load", () => {
    $datos = document.querySelectorAll('.datos .row .edit');
    $cancel = document.querySelectorAll('.datos .row .cancel');
    $datos.forEach((btn,i) => {
       
        btn.addEventListener('click',()=>editarEncuesta(btn));
    });
   
    $cancel.forEach((btn,i) => {
        
        btn.addEventListener('click',()=>cancelEncuesta(btn));
    });
})


