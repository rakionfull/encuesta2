        <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body ">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <h4 class="card-title">Título :  <?php echo($encuesta[0]->desc_form) ?></h4>
                                </div>
                            </div>
                           
                        </div>
                        
                    </div>
                   
                    
                    
                </div>
        </div>
        <div class="row">
            <div class="col-12">
                
                    <div class="col-md-4 mb-3">
                                    <a href="" id="add_pregunta"   class="btn btn-sm btn-primary waves-effect waves-light">
                                    <i class=" fas fa-plus-circle align-middle ml-2 mr-2"></i>Nueva Pregunta</a>
                        
                    </div>
                    <div class="col-md-12" style="margin-top:0.5rem" id="alert_pregunta">
                                    
                    </div>
              
            </div>
        </div>
       
                    <div id="list_preguntas"> 
                        <!-- visualizar las preguntas registradas -->
                        <?php 
                            foreach ($preguntas as $pregunta => $value) { 
                                        
                        ?>
                                   
                                     <div class="card pregunta" id="pregunta_<?php echo($value->id_preg); ?>">
                                            <ul class="list-group list-group-flush">
                                              
                                                <li class="list-group-item">
                                                    <div class="card-body ">
                                                        <div class="row mb-3">
                                                            <div class="col-lg-11">
                                                                <div class="form-group">
                                                                    <div class="user-box" id="">
                                                                        <input type="text"  name="titulo_pregunta_<?php echo($value->id_preg); ?>" id="titulo_pregunta_<?php echo($value->id_preg); ?>" required="" value="<?php echo($value->desc_preg) ?>" placeholder="Título de la Pregunta" disabled>
                                                                    </div>
                                                                    <div class="invalid-feedback" id="error_desc_preg">
                                           
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1 bajar" id="con_bajar_<?php echo($value->id_preg); ?>">
                                                                <a href="" id="bajar_<?php echo($value->id_preg); ?>" title="Ver preguntas"><i class=" fas fa-angle-down font-size-20"></i></a>
                                                                
                                                            </div>
                                                            <div class="col-md-1 subir" id="con_subir_<?php echo($value->id_preg); ?>" style="display:none">
                                                                <a href="" id="subir_<?php echo($value->id_preg); ?>" title="Ocultar preguntas"><i class=" fas fa-angle-up font-size-20"></i></a>
                                                                
                                                            </div>  
                                                        </div>
                                                      
                                                        <div id="caja_<?php echo($value->id_preg); ?>" style="display:none">
                                                            <div id="list_opcion_<?php echo($value->id_preg); ?>">
                                                                <?php 
                                                                
                                                                        foreach ($opciones as $opcion => $valor){
                                                                        if($value->id_preg==$valor->id_preg){
                                                                            
                                                                ?>
                                                                <div id="preg_<?php echo($value->id_preg); ?>_<?php echo($valor->id_op); ?>" class="opcion_<?php echo($value->id_preg); ?>">
                                                                    <div class="d-flex flex-row">
                                                                        <div class="custom-control custom-radio mb-3 col-lg-10">
                                                                                    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                                                                
                                                                                    <label class="custom-control-label col-lg-12" for="customRadio1">
                                                                                        <div class="user-box" id="">
                                                                                        <input type="text" id="preg_opcion_<?php echo($valor->id_op); ?>" value="<?php echo($valor->desc_op); ?>" placeholder="Opcion" disabled>
                                                                                        </div>
                                                                                    </label>
                                                                        </div>
                                                                        <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                                                                            <a href="" class="text-danger remove" id="remove_opcion_preg_<?php echo($value->id_preg); ?>_<?php echo($valor->id_op); ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Quitar"><i class="mdi mdi-playlist-remove font-size-20"></i></a>
                                                                            
                                                                        </div>
                                                            
                                                                    </div>
                                                                        <div class="custom-control custom-checkbox mb-3">
                                                                        <?php 
                                                                            if($valor->evento==0){
                                                                        ?>
                                                                            <input type="checkbox" class="custom-control-input check_opcion" id="check_preg_<?php echo($value->id_preg); ?>_<?php echo($valor->id_op); ?>">
                                                                            <label class="custom-control-label" for="check_preg_<?php echo($value->id_preg); ?>_<?php echo($valor->id_op); ?>">Indique si esta respuesta va accionar un evento</label>
                                                                        <?php       
                                                                            }else{?>
                                                                            <input type="checkbox" class="custom-control-input check_opcion" id="check_preg_<?php echo($value->id_preg); ?>_<?php echo($valor->id_op); ?>" checked>
                                                                            <label class="custom-control-label" for="check_preg_<?php echo($value->id_preg); ?>_<?php echo($valor->id_op); ?>">Indique si esta respuesta va accionar un evento</label>
                                                                                <div class="" id="extra_preg_<?php echo($value->id_preg); ?>_<?php echo($valor->id_op); ?>">
                                                                                                        <div class="col-lg-12">
                                                                                                            <div class="form-group row">
                                                                                                                
                                                                                                                <label for="" class="col-sm-2 col-form-label">Enviar correo a : </label>
                                                                                                                <div class="col-sm-10">
                                                                                                                    <select id="select_preg_<?php echo($value->id_preg); ?>_<?php echo($valor->id_op); ?>" class="form-control">
                                                                                                                
                                                                                                                        <option value="0">Seleccione</option>
                                                                                                                        <option value="1">valtex.com</option>
                                                                                                                
                                                                                                                    
                                                                                                                    
                                                                                                                    
                                                                                                                    </select>
                                                                                                                </div>    
                                                                                                            </div> 
                                                                                </div>
                                                                                                
                                                                                                        

                                                                        </div>
                                                                        <?php       
                                                                            }?>
                                                                        
                                                                        </div>
                                                                    
                                                                </div>
                                                                <?php       
                                                                }} ?>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group  mb-1">
                                                                        
                                                                            <a href="" id="add_opcion_<?php echo($value->id_preg); ?>"   class="btn btn-link waves-effect ">
                                                                            <i class=" fas fa-plus-circle align-middle mr-2"></i>Añadir Opción</a>
                                                                            
                                                                        
                                                                    </div>  
                                                                </div>
                                                        
                                                            </div>
                                                        </div>

                                                           
                                                        
                                                            
                                                        
                                                    
                                                    
                                                
                                                    </div>
                                                </li>
                                                
                                                <li class="list-group-item">
                                                        <div class="row d-flex justify-content-end" >
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <a href="" class="text-success" id="update_pregunta_<?php echo($value->id_preg); ?>" data-toggle="tooltip" data-placement="top" title=""><i class="mdi mdi-content-save font-size-18"></i> Guardar</a>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <a href="" class="text-danger" id="delete_pregunta_<?php echo($value->id_preg); ?>" data-toggle="tooltip" data-placement="top" title="" ><i class="mdi mdi-trash-can font-size-18"></i> Eliminar</a>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <div class="custom-control custom-switch mb-1" dir="ltr">
                                                                    <?php 
                                                                        if($value->obligatorio_preg==0){
                                                                    ?>
                                                                        <input type="checkbox" class="custom-control-input" id="obligatorio_pregunta">
                                                                        <label class="custom-control-label" for="obligatorio_pregunta_<?php echo($value->id_preg); ?>">Obligatorio</label>
                                                                     <?php 
                                                                        }else{?>
                                                                            <input type="checkbox" class="custom-control-input" id="obligatorio_pregunta" checked>
                                                                            <label class="custom-control-label" for="obligatorio_pregunta_<?php echo($value->id_preg); ?>">Obligatorio</label>
                                                                        
                                                                        <?php } ?>
                                                                      
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </li>
                                            </ul>
                                  

                        
                                    </div>
                        <?php       
                            } ?>
                    </div>
                    <!-- formulario de registro de pregunta -->
                            <div class="card pregunta" id="pregunta" style="display:none">
                                    <form action="" id="form_pregunta" name="form_pregunta">
                                            <ul class="list-group list-group-flush">
                                               
                                                <li class="list-group-item">
                                                    <div class="card-body ">
                                                        <div class="row mb-3">
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <div class="user-box" id="">
                                                                        <input type="text"  name="titulo_pregunta" id="titulo_pregunta" required="" value="" placeholder="Título de la Pregunta">
                                                                    </div>
                                                                    <div class="invalid-feedback" id="error_desc_preg">
                                           
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        <div id="list_opcion">
                                                           
                                                        </div>
                                                          

                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group  mb-1">
                                                                        
                                                                            <a href="" id="add_opcion"   class="btn btn-link waves-effect ">
                                                                            <i class=" fas fa-plus-circle align-middle mr-2"></i>Añadir Opción</a>
                                                                            
                                                                        
                                                                    </div>  
                                                                </div>
                                                        
                                                                

                                                            </div>
                                                        
                                                            
                                                        
                                                    
                                                    
                                                
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                        <div class="row d-flex justify-content-end" >
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <a href="" class="text-success" id="registrar_pregunta" data-toggle="tooltip" data-placement="top" title=""><i class="mdi mdi-content-save font-size-18"></i> Registrar</a>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <a href="" class="text-danger" id="delete_pregunta" data-toggle="tooltip" data-placement="top" title="" ><i class="mdi mdi-trash-can font-size-18"></i> Eliminar</a>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <div class="custom-control custom-switch mb-1" dir="ltr">
                                                                        <input type="checkbox" class="custom-control-input" id="obligatorio_pregunta" checked>
                                                                        <label class="custom-control-label" for="obligatorio_pregunta">Obligatorio</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </li>
                                            </ul>
                                    </form>
                                          
                                
                                
                            </div>
        <input type="hidden" name="" id="id_enc" value="<?php echo($encuesta[0]->id_form) ?>">
        <script src="<?=base_url('public/assets/js/preguntas.js'); ?>"></script>