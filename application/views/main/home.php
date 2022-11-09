        
        <!-- <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0"></h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Starter page</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div> -->
        <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body ">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <h4 class="card-title">Lista de Campañas</h4>
                                </div>
                                <div class="col-md-4 offset-md-4">
                                    <a href=""  data-toggle="modal" id="add_campania"   class="float-right btn btn-primary waves-effect waves-light"><i class=" fas fa-plus-circle align-middle ml-2"></i>  Agregar</a>
                        
                                </div>
                                <div class="col-md-12" style="margin-top:0.5rem" id="alert_campania">
                                    
                                </div>
                            </div>
                           
                        </div>
                        <div class="card-body">
                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal_campania">
                        Launch demo modal
                        </button> -->
                        <div class="table-responsive">
                            <table id="table_campanias" class="table table-centered datatable dt-responsive nowrap" data-page-length="5" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Id</th>
                                        <th>N°</th>
                                        <th>Nombre de Campaña</th>
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
        <!-- modal de registro de Campañas -->                                 
        <div class="modal fade" id="modal_campania" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="title-campania"></h5>
                          
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!--  -->
                    <div class="modal-body">
                      <form action="" id="form_campania" name="form_campania" novalidate>
                        <input type="hidden" id="mod_id_camp">
                        <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="desc_camp">Nombre de la Campaña (*)</label>
                                        <textarea type="text" name="desc_camp" id="desc_camp" class="form-control" required></textarea>
                                        <div class="invalid-feedback" id="error_desc_camp">
                                           
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="fecha_camp">Fecha de Registro</label>
                                        <input type="datetime" name="fecha_camp" id="fecha_camp" class="form-control" value="<?php echo(date('Y-m-d')) ?>" readonly>
                                    </div>
                                
                                </div>
                            </div>
                      </form>
                      
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Close</button>
                        <button type="" class="btn btn-primary waves-effect waves-light" id="Registrar_campania">Registrar</button>
                        <button type="" class="btn btn-primary waves-effect waves-light" id="Modificar_campania" >Guardar</button>
                    </div>
                  
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <script src="<?=base_url('public/assets/js/campania.js'); ?>"></script>
        


