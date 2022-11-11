var base_url=document.getElementById("base_url").value;
var alerta = document.getElementById("alert_campania");

//validacion del formulario campaña
function valida_campania(){
    //valido la descripcion
    if (document.form_campania.desc_camp.value.length==0){
        document.getElementById("error_desc_camp").style.display="block";
        document.getElementById("error_desc_camp").innerHTML ='Debe ingresar el nombre de la campaña';
           document.form_campania.desc_camp.focus();
           return 0;
    }
    return true;

}
//validacion existencial de la descripcion
async function validacionCampania(desc_camp){

    let result; /* Variable Resultado de Funcion */

    // Validar existe
        try {

            const postData = {           
                desc_camp : desc_camp
            };

            await $.ajax({
                method: "POST",
                url: base_url+"main/validaCampania",
                data: postData,
                dataType: "JSON"
            })
            .done(function(respuesta) {
                console.log(respuesta);
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

document.getElementById("add_campania").addEventListener("click",function(event){
    event.preventDefault();   
    document.getElementById("error_desc_camp").innerHTML='';                   
   document.getElementById("form_reg_campania").style.display = "block";

  

});
document.getElementById("cancel_campania").addEventListener("click",function(event){
    event.preventDefault();                      
   document.getElementById("form_reg_campania").style.display = "none";


});



//registramos la campaña
function editarCampania(element) {
    event.preventDefault();    
    //habiltiar el input respectivo para editar
    $valor=element.id.split("_");
    document.getElementById("desc_camp_"+$valor[2]).disabled=false;
    document.getElementById("ico_camp_"+$valor[2]).style.display="block";
    document.getElementById("ico_camp_"+$valor[2]).className = "col-lg-3 d-flex justify-content-center";
    document.getElementById("action_camp_"+$valor[2]).style.display="none";
    document.getElementById("texto_desc_camp_"+$valor[2]).style.display="none";
    document.getElementById("input_desc_camp_"+$valor[2]).style.display="block";

    
   
}
function cancelCampania(element) {
    event.preventDefault();     
    $valor=element.id.split("_");       
    document.getElementById("desc_camp_"+$valor[2]).disabled=true;
    document.getElementById("ico_camp_"+$valor[2]).className = "col-lg-3";
    document.getElementById("ico_camp_"+$valor[2]).style.display="none";
    
    document.getElementById("action_camp_"+$valor[2]).style.display="block";
    document.getElementById("texto_desc_camp_"+$valor[2]).style.display="block";
    document.getElementById("input_desc_camp_"+$valor[2]).style.display="none";
}
document.getElementById("registrar_campania").addEventListener("click", async function(event){
    event.preventDefault();
    
    $valida = valida_campania();
    if($valida){
        if (!(await validacionCampania(document.getElementById("desc_camp").value))){
            const postData = { 
                desc_camp:document.getElementById("desc_camp").value,
                id_user:1,
                est_camp:1,      
            };
            try {
                $.ajax({
                    method: "POST",
                    url: base_url+"main/registerCompania",
                    data: postData,
                    dataType: "JSON"
                })
                .done(function(respuesta) {
                    if (respuesta) 
                    {
                    
                        document.getElementById("form_campania").reset();
                        document.getElementById("error_desc_camp").innerHTML='';
                        document.getElementById("form_reg_campania").style.display = "none";
                       
                        alerta.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                            'Campaña Registrada'+
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                                '</button>'+
                        '</div>';
                        setTimeout(window.location.href = base_url+'main/manCampanias', 300);
                        
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
            document.getElementById("error_desc_camp").style.display="block";
            document.getElementById("error_desc_camp").innerHTML ='Campaña ya registrada';
            document.form_campania.desc_camp.focus();
        }
       
    }
   
});
window.addEventListener("load", () => {
    $datos = document.querySelectorAll('.datos .row .edit');
    $cancel = document.querySelectorAll('.datos .row .cancel');
    $datos.forEach((btn,i) => {
       
        btn.addEventListener('click',()=>editarCampania(btn));
    });
   
    $cancel.forEach((btn,i) => {
        
        btn.addEventListener('click',()=>cancelCampania(btn));
    });
})


