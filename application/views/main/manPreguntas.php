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
                                    <a href="" id="add_encuesta"   class="btn btn-sm btn-primary waves-effect waves-light">
                                    <i class=" fas fa-plus-circle align-middle ml-2 mr-2"></i>Nueva Pregunta</a>
                        
                    </div>
                    <div class="col-md-12" style="margin-top:0.5rem" id="alert_encuesta">
                                    
                    </div>
              
            </div>
        </div>
       
                    <div id="list_preguntas"> 
                       
                            <div class="card" id="preg_1">
                                            <ul class="list-group list-group-flush">
                                                <div class="row">
                                                    <div class="col-lg-12 d-flex justify-content-center">
                                                        <i class="mdi mdi-drag font-size-24" data-toggle="tooltip" data-placement="top" title="" data-original-title="Arrastrar"></i>
                                                    </div>
                                                
                                                </div>
                                                <li class="list-group-item">
                                                    <div class="card-body ">
                                                        <div class="row mb-3">
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <div class="user-box" id="">
                                                                        <input type="text"  name="" id="" required="" value="" placeholder="Título de la Pregunta">
                                                                    </div>
                                                                   
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    
                                                            <div id="preg_1_1">
                                                                <div class="d-flex flex-row">
                                                                    <div class="custom-control custom-radio mb-3 col-lg-10">
                                                                                <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                                                                
                                                                                <label class="custom-control-label col-lg-12" for="customRadio1">
                                                                                    <div class="user-box" id="">
                                                                                        <input type="text" class="" placeholder="Opcion 1">
                                                                                    </div>
                                                                                </label>
                                                                    </div>
                                                                   
                                                                            <!-- <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                                                                <div class="user-box" id="">
                                                                                    <input type="text" class="" placeholder="Opcion 1">
                                                                                </div>
                                                                            </div> -->
                                                                      
                                                                    
                                                                    <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                                                                        <a href="" class="text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Quitar"><i class="mdi mdi-playlist-remove font-size-20"></i></a>
                                                                        
                                                                    </div>
                                                                   
                                                                </div>
                                                                <div class="custom-control custom-checkbox mb-3">
                                                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                                    <label class="custom-control-label" for="customCheck1">Indique si esta respuesta va accionar un evento</label>
                                                                </div>
                                                                

                                                            </div>
                                                            <div class="">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group row">
                                                                        
                                                                        <label for="" class="col-sm-2 col-form-label">Enviar correo a : </label>
                                                                        <div class="col-sm-10">
                                                                            <select name="" id="" class="form-control">
                                                                                <option value="">valtex.com</option>
                                                                            </select>
                                                                        </div>
                                                                        
                                                                        
                                                                    </div>  
                                                                </div>
                                                        
                                                                

                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group  mb-1">
                                                                        
                                                                            <a href="" id="add_opcion"   class="btn btn-link waves-effect">
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
                                                                    <a href="" class="text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Eliminar"><i class="mdi mdi-trash-can font-size-18"></i> Eliminar</a>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <div class="custom-control custom-switch mb-1" dir="ltr">
                                                                        <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                                                                        <label class="custom-control-label" for="customSwitch1">Obligatorio</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </li>
                                            </ul>
                                
                                
                            </div>
                        
                    </div>
        
        <!-- <script src="<?=base_url('public/assets/js/createForm.js'); ?>"></script> -->