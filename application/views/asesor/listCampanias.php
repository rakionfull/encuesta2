<div class="row">
    <div class="col-md-5">
        <div class="card card-body">
            <div class="card-title mt-0">
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Cliente:</label>
                    <div class="col-sm-9">
                        <select name="select_cliente" id="select_cliente" class="form-control" disabled>
                                <option value="1">Telefonica</option>

                        </select>
                    </div>
                </div>
                               
            </div>
            <div class="card-title mt-1">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Lista de Campañas :</h4>

                   
                </div>
            </div>
            <?php foreach ($campanias as $key => $value) { ?>
                <div class="campania" id="campania_<?php echo($value->id_camp) ?>">
              
                    <div class="row card_campania" id="camp_<?php echo($value->id_camp) ?>">
                   
                        <div class="col-md-11">
                            <span><?php echo($value->desc_camp) ?></span>
                        
                        </div>
                        <div class="col-md-1 bajar" id="con_bajar_<?php echo($value->id_camp) ?>">
                            <a href="" id="bajar_<?php echo($value->id_camp) ?>"><i class=" fas fa-angle-down font-size-20"></i></a>
                            
                        </div>
                        <div class="col-md-1 subir" id="con_subir_<?php echo($value->id_camp) ?>" style="display:none">
                            <a href="" id="subir_<?php echo($value->id_camp) ?>" ><i class=" fas fa-angle-up font-size-20"></i></a>
                            
                        </div>
                    </div>
                    <div id="caja_<?php echo($value->id_camp) ?>" style="display:none">
                        <div class="card">
                            <div class="card-header">
                            <?php foreach ($encuestas as $encuesta => $valor) {
                                    if($value->id_camp == $valor->id_camp){
                                ?>
                                <a href="" id="encuesta_<?php echo($valor->id_form) ?>" class="encuesta">
                                    <div class="row card_encuesta">
                                        <div class="col-md-11">
                                            <span><?php echo($valor->desc_form) ?></span>
                                        </div>
                                        <div class="col-md-1">
                                            <i class=" fas fa-arrow-right font-size-15"></i>
                                        </div>
                                    </div>
                                </a>
                                
                            <?php }} ?>
                                
                               
                            </div>  
                        </div>
                    
                    </div>
                </div>
            <?php } ?>
           
           
           
        </div>
    </div>
    <div class="col-md-7">
        <div class="card card-body body_encuesta" id="body_encuesta">
                <img src="<?=base_url('public/images/encuesta.png') ?>" alt="" style="witdh:100%" id="img_encuesta">
                <div class="cargando"></div>
                    <!-- <div id="wizzar" class="twitter-bs-wizard card-header" style="display:none">
                    
                        <div class="stepwizard" >
                            <div class="stepwizard-row setup-panel">
                                <div class="stepwizard-step">
                                    <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                                    <p>Step 1</p>
                                </div>
                                <div class="stepwizard-step">
                                    <a href="#step-2" type="button" class="btn  btn-circle back_btn_circle" disabled="disabled">2</a>
                                    <p>Step 2</p>
                                </div>
                                <div class="stepwizard-step">
                                    <a href="#step-3" type="button" class="btn  btn-circle back_btn_circle" disabled="disabled">3</a>
                                    <p>Step 3</p>
                                </div>
                            </div>
                        </div>
                        <form role="form">
                            <div class="row setup-content" id="step-1">
                                <div class="col-xs-12">
                                    <div class="col-md-12">
                                        <h3> Step 1</h3>
                                        <div class="form-group">
                                            <label class="control-label">First Name</label>
                                            <input  maxlength="100" type="text" required="required" class="form-control" placeholder="Enter First Name"  />
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Last Name</label>
                                            <input maxlength="100" type="text" required="required" class="form-control" placeholder="Enter Last Name" />
                                        </div>
                                        <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row setup-content" id="step-2">
                                <div class="col-xs-12">
                                    <div class="col-md-12">
                                        <h3> Step 2</h3>
                                        <div class="form-group">
                                            <label class="control-label">Company Name</label>
                                            <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name" />
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Company Address</label>
                                            <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address"  />
                                        </div>
                                        <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row setup-content" id="step-3">
                                <div class="col-xs-12">
                                    <div class="col-md-12">
                                        <h3> Step 3</h3>
                                        <button class="btn btn-success btn-lg pull-right" type="submit">Finish!</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div> -->
                    <form action="" name="form_respuestas" id="form_respuestas">
                        <div class="card-header" id="basic-pills-wizard" style="display:none">
                            <ul class="nav nav-pills justify-content-center mb-3 text-center custom" id="pills-tab" role="tablist">
                                <div class="step-line"></div>
                                <li class="nav-item">
                                    <a class="nav-link active custom disabled" id="pills-1-tab" data-toggle="pill" href="#pills-1" role="tab"
                                    aria-controls="pills-1" aria-selected="true" >
                                    <span class="icon"><i class="ri-user-3-line"></i></span>
                                    <span class="text">Paso 1</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link custom disabled" id="pills-2-tab" data-toggle="pill" href="#pills-2" role="tab"
                                    aria-controls="pills-2" aria-selected="false" >
                                    <span class="icon"><i class="ri-file-edit-line"></i></span>
                                    <span class="text">Paso 2</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link custom disabled" id="pills-3-tab" data-toggle="pill" href="#pills-3" role="tab"
                                    aria-controls="pills-3" aria-selected="false" >
                                    <span class="icon"><i class="ri-folder-2-line"></i></span>
                                    <span class="text">Paso 3</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="col-md-12" style="margin-top:0.5rem" id="alert_respuesta">
                                    
                            </div>
                            <div class="tab-content custom pt-4" id="pills-tabContent">
                                
                                <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-home-tab">
                                                            <div class="row mt-4">
                                                                    <div class="col-lg-12">
                                                                        <div class="form-group">
                                                                    
                                                                            <input type="text" class="form-control" id="cliente_dni" name="cliente_dni" placeholder="DNI">
                                                                            <div class="invalid-feedback" id="error_desc_dni">
                                            
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="form-group">
                                                                        
                                                                            <input type="text" class="form-control" id="cliente_nombres" name="cliente_nombres" placeholder="Nombres y Apellidos">
                                                                            <div class="invalid-feedback" id="error_desc_nombres">
                                            
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="form-group">
                                                                            <input type="email" class="form-control" id="cliente_correo" name="cliente_correo" placeholder="Correo Electrónico">
                                                                            <div class="invalid-feedback" id="error_desc_correo">
                                            
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                    <div class="form-group mb-0 d-flex justify-content-end">
                                        <button type="button" class="btn btn-primary btn-next" data-to="#pills-2-tab">Siguiente</button>
                                    </div>
                                
                                </div>
                                <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    
                                                <div id="pregunta">

                                                </div>
                                
                                    <div class="form-group mb-0 d-flex justify-content-between">
                                    <button type="button" class="btn btn-primary btn-prev" data-to="#pills-1-tab">Anterior</button>
                                        <button type="button" class="btn btn-primary btn-finish" id="guardar_respuesta" data-to="#pills-3-tab">Finalizar</button>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-3" role="tabpanel" aria-labelledby="pills-contact-tab">
                                                            <div class="row justify-content-center">
                                                                <div class="col-lg-6">
                                                                    <div class="text-center">
                                                                        <div class="mb-4">
                                                                            <i class="mdi mdi-check-circle-outline text-success display-4"></i>
                                                                        </div>
                                                                        <div>
                                                                            <h5>Encuesta Terminada</h5>
                                                                            <p class="text-muted">Aqui puede ir algun texto</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                
                                    <div class="form-group mb-0 d-flex justify-content-center">
                                        <!-- <button type="button" class="btn btn-primary btn-prev" data-to="#pills-2-tab">Anterior</button> -->
                                        <button type="button" class="btn btn-success new_encuesta" data-to="#pills-1-tab">Nueva Encuesta</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                   
                    

                                        
                </div>
    </div>
</div>
<script src="<?=base_url('public/assets/js/asesor_campania.js'); ?>"></script>