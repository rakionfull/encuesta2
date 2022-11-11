
$('#list_preguntas').sortable({
    group: 'list',
    animation: 200,
    ghostClass: 'ghost',
    // onSort: reportActivity,
});
var list_preguntas = document.getElementById("list_preguntas");
window.addEventListener("load", () => {
    list_preguntas.innerHTML += '<div class="card pregunta" id="preg_1">'+
    '<ul class="list-group list-group-flush">'+
        '<div class="row">'+
            '<div class="col-lg-12 d-flex justify-content-center">'+
                '<i class="mdi mdi-drag font-size-24" data-toggle="tooltip" data-placement="top" title="" data-original-title="Arrastrar"></i>'+
            '</div>'+
        '</div>'+
        '<li class="list-group-item">'+
            '<div class="card-body ">'+
                '<div class="row mb-3">'+
                    '<div class="col-lg-8">'+
                        '<div class="form-group">'+
                            '<textarea placeholder="Pregunta sin título" name="titulo_enc" id="titulo_enc" class="form-control form-control"></textarea>'+
                        '</div>'+
                    '</div>'+
                    '<div class="col-lg-4">'+
                        '<select name="opcional" id="preg_1_opcion" class="form-control">'+
                            '<option value="0">Varias Opciones</option>'+
                        '</select>'+
                    '</div>'+
                '</div>'+
                    '<div id="preg_1_1">'+
                        '<div class="d-flex flex-row">'+
                            '<div class="col-lg-10 col-md-10 col-sm-10 col-10">'+
                                '<div class="form-group">'+
                                    '<div class="form-check">'+
                                        '<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">'+
                                        '<input type="text" class="form-control form-control-sm" >'+
                                    '</div>'+
                                '</div>  '+
                            '</div>'+
                            '<div class="col-lg-2 col-md-2 col-sm-2 col-2">'+
                                '<a href="" class="text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Quitar"><i class="mdi mdi-playlist-remove font-size-24"></i></a>'+
                                
                            '</div>'+
                        '</div>'+
                    '</div>'+
                    '<div class="d-flex flex-row">'+
                        '<div class="col-lg-10">'+
                            '<div class="form-group">'+
                                '<div class="form-check">'+
                                    '<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">'+
                                    '<a href="" id="add_pregunta">Añadir Opcion</a>'+
                                '</div>'+
                            '</div>  '+
                        '</div>'+
                    '</div>'+
            '</div>'+
        '</li>'+
        '<li class="list-group-item">'+
                '<div class="row d-flex justify-content-end" >'+
                    '<div class="col-md-2">'+
                        '<div class="form-group">'+
                            '<a href="" class="text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Eliminar"><i class="mdi mdi-trash-can font-size-18"></i> Eliminar</a>'+
                        '</div>'+
                    '</div>'+
                    '<div class="col-md-2">'+
                        '<div class="form-group">'+
                            '<div class="custom-control custom-switch mb-1" dir="ltr">'+
                                '<input type="checkbox" class="custom-control-input" id="customSwitch1" checked>'+
                                '<label class="custom-control-label" for="customSwitch1">Obligatorio</label>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
        '</li>'+
    '</ul>'+
'</div>';



})

document.getElementById("add_pregunta").addEventListener("click",function(event){
    event.preventDefault();
    var pregunta = document.querySelector('.pregunta').id;
    console.log(pregunta);                    
   
  

});