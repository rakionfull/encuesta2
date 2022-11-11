        
       
        <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body ">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <h4 class="card-title">Mis Formularios</h4>
                                </div>
                                <input type="hidden" name="id_camp" id="id_camp" value="<?=$id_camp ?>"> 
                                <div class="col-md-4 offset-md-4">
                                    <!-- <a href=""  data-toggle="modal"   class="float-right btn btn-primary waves-effect waves-light"><i class=" fas fa-plus-circle align-middle ml-2"></i>  Agregar</a>
                         -->
                                    <a href="<?=base_url('Main/createForm'); ?>" class="float-right btn btn-primary waves-effect waves-light"><i class=" fas fa-plus-circle align-middle ml-2"></i>  Agregar</a>
                                </div>
                                <div class="col-md-12" style="margin-top:0.5rem" id="alert_formulario">
                                    
                                </div>
                            </div>
                           
                        </div>
                        <div class="card-body">
                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal_campania">
                        Launch demo modal
                        </button> -->
                        <div class="table-responsive">
                            <table id="table_formularios" class="table table-centered datatable dt-responsive nowrap" data-page-length="5" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Id</th>
                                        <th>N°</th>
                                        <th>Titulo</th>
                                        <th>Estado</th>
                                        <th>Creado por:</th>
                                        <th>Fecha Registro</th>
                                        <th style="width: 120px;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                  
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
        </div>
        <script src="<?=base_url('public/assets/js/formularios.js'); ?>"></script>
   