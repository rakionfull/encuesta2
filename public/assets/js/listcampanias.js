var base_url=document.getElementById("base_url").value;
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

function descargaReporte(element) {
    event.preventDefault();
    $opcion = element.id.split('_');
    
    const postData = { 

    };
    try {
        $.ajax({
            method: "POST",
            url: base_url+"main/reporteEncuesta/"+$opcion[1],
            data: postData,
            dataType: "JSON"
        })
        .done(function(respuesta) {
            console.log(respuesta);
            $url = base_url+'public/assets/reportes/'+respuesta;
            // console.log($url);
            // document.getElementById(element.id).target = "_blank"
            // $('#'+element.id).prop('href',$url);
            location.href=$url;
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
window.addEventListener("load", () => {
   
    $bajar = document.querySelectorAll('.campania .bajar');
    $subir = document.querySelectorAll('.campania .subir');
    $descarga = document.querySelectorAll('.campania .descarga');
    // $datos = document.querySelectorAll('.pregunta .list-group-item .check_opcion');
      
    // $cancel = document.querySelectorAll('.pregunta .row .cancel');
    $bajar.forEach((btn,i) => {   
        btn.addEventListener('click',()=>MostrarCaja(btn));
    });
    $subir.forEach((btn,i) => {   
        btn.addEventListener('click',()=>OcultarCaja(btn));
    });
    $descarga.forEach((btn,i) => {   
        btn.addEventListener('click',()=>descargaReporte(btn));
    });
    
    
})