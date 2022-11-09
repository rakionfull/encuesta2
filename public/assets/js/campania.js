var base_url=document.getElementById("base_url").value;
var alerta = document.getElementById("alert_campania");

//validacion del formulario campaña
function valida_campania(){
    //valido la descripcion
    if (document.form_campania.desc_camp.value.length==0){
        document.getElementById("error_desc_camp").style.display="block";
        document.getElementById("error_desc_camp").innerHTML ='Debe ingresar una descripcion';
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
var table = $('#table_campanias').DataTable({
    language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    },
    // scrollY: "200px",
    // fixedColumns:   {
    //     heightMatch: 'none'
    // },
    responsive: true,
    autoWidth: false,
    // processing: true,
    lengthMenu:[5,10,25,50],
    pageLength:5,
    clickToSelect:false,
    ajax: base_url+"/main/getCampanias",
    aoColumns: [
        { "data": "id_camp" },
        { "data": "numero"},
        { "data": "desc_camp" },

        {  "data": "est_camp",
                    "bSortable": false,
                    "mRender": function(data, type, value) {
                        if (data == '1') {
                            return  '<input  type="checkbox" id="camp_'+value["id_camp"]+'" onclick="changeCampania(this, event)" switch="none" checked/><label for="camp_'+value["id_camp"]+'" data-on-label="On"data-off-label="Off"></label>'
                          
                        }else{
                            return  '<input type="checkbox" id="camp_'+value["id_camp"]+'" onclick="changeCampania(this, event)" switch="none" /><label for="camp_'+value["id_camp"]+'" data-on-label="On"data-off-label="Off"></label>'
                          
                        }
                    }
                },
        { "data": "id_user" },
        { "data": "fecha_reg" },
        { "defaultContent": "<editCamp class='mr-3 text-primary btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='' data-original-title='Editar'><i class='mdi mdi-pencil font-size-18'></i></editCamp>"+
                            "<deleteCamp class='text-danger btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='' data-original-title='Eliminar'><i class='mdi mdi-trash-can font-size-18'></i></deleteCamp>" 
        },
    ],
    columnDefs: [
        {
            "targets": [ 0 ],
            "visible": false,
            "searchable": false
        },
        
    ],
    'drawCallback': function () {
        $( 'table_campanias tbody tr td' ).css( 'padding', '1px 1px 1px 1px' );
    }
    
});
//creamos el evento de agregar compaña

document.getElementById("add_campania").addEventListener("click",function(){
                                
    $("#modal_campania").modal("show");
    document.getElementById("title-campania").innerHTML = "Agregar Campania";
    document.getElementById("form_campania").reset();
    
    document.getElementById("Registrar_campania").style.display = "block";
    document.getElementById("Modificar_campania").style.display = "none";

});
//registramos la campaña

document.getElementById("Registrar_campania").addEventListener("click", async function(){
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
                        $("#table_campanias").DataTable().ajax.reload(null, false); 
                        $('#modal_campania').modal('hide');
                        alerta.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                            'Campaña Registrada'+
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                                '</button>'+
                        '</div>';
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

//editamos la campaña
$('#table_campanias tbody').on( 'click', 'editCamp', function(){
    $("#modal_campania").modal("show");
    document.getElementById("title-campania").innerHTML = "Modificar Campaña";
    document.getElementById("form_campania").reset();
   
    document.getElementById("Registrar_campania").style.display = "none";
    document.getElementById("Modificar_campania").style.display = "block";

    //recuperando los datos
    var table = $('#table_campanias').DataTable();
    $info = table.row($(this).closest('tr')).data();
    document.getElementById("mod_id_camp").value=$info["id_camp"];
    document.getElementById("desc_camp").value=$info["desc_camp"];
   
});
//editamos la compaña
document.getElementById("Modificar_campania").addEventListener("click", async function(){
    $valida = valida_campania();
    if($valida){
            const postData = { 
                desc_camp:document.getElementById("desc_camp").value,
                id_camp:document.getElementById("mod_id_camp").value,
                // id_user:1,
                // est_camp:1,      
            };
            try {
                $.ajax({
                    method: "POST",
                    url: base_url+"main/updateCompania",
                    data: postData,
                    dataType: "JSON"
                })
                .done(function(respuesta) {
                    if (respuesta) 
                    {
                    
                        document.getElementById("form_campania").reset();
                        $("#table_campanias").DataTable().ajax.reload(null, false); 
                        $('#modal_campania').modal('hide');
                        alerta.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                            'Campaña Modificada'+
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                                '</button>'+
                        '</div>';
                    } 
                    else
                    {
                        alerta.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                        'Error al Modificar'+
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
        
       
    }
   
});
//eliminamos la campaña
$('#table_campanias tbody').on( 'click', 'deleteCamp', function(){
//recuperando los datos
    var table = $('#table_campanias').DataTable();
    $info = table.row($(this).closest('tr')).data();
    Swal.fire({
        title: 'Eliminar',
        text: "¿Está seguro de eliminar esta campaña?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: "#5664d2",
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar!'
      }).then((result) => {
        if (result.isConfirmed) {
            const postData = { 
                id_camp:$info["id_camp"],   
            };
            try {
                $.ajax({
                    method: "POST",
                    url: base_url+"main/deleteCompania",
                    data: postData,
                    dataType: "JSON"
                })
                .done(function(respuesta) {
                    if (respuesta) 
                    {
                    
                
                        $("#table_campanias").DataTable().ajax.reload(null, false); 
                
                        alerta.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                            'Campaña Eliminada'+
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                                '</button>'+
                        '</div>';
                    } 
                    else
                    {
                        alerta.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                        'Error al Eliminar'+
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
        //   Swal.fire(
        //     'Eliminado!',
        //     'Tu .',
        //     'success'
        //   )
        }
        })
    
   
});
