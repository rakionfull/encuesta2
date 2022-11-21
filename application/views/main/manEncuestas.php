        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Lista de Encuestas</h4>

                    <!-- <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Lista de Campañas</li>
                        </ol>
                    </div> -->
                   
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="mb-0">Nombre de la Campaña :  <?php echo($campania[0]->desc_camp) ?></h4>                   
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                    <div class="col-md-4 mb-5">
                                    <a href="" id="add_encuesta"   class="btn btn-primary btn-sm waves-effect waves-light">
                                    <i class=" fas fa-plus-circle align-middle ml-2 mr-2"></i>Crear Encuesta</a>
                        
                    </div>
                    <div class="col-md-12" style="margin-top:0.5rem" id="alert_encuesta">
                                    
                    </div>
            </div>
        </div>
        
        <?php 
            if($this->session->flashdata('error')!= '')
            {
                echo $this->session->flashdata('error');
            }
        ?>
        <!-- listado de Encuestas registradas -->
        <div class="datos">
            <?php 
            foreach ($encuestas as $key => $value) { ?>
           
                    <div class="row" id="" style="">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="<?php echo base_url();?>main/updateEncuesta/<?php echo($value->id_camp); ?>/<?php echo($value->id_form); ?>" method="post" >
                                            <div class="input-group-append">
                                                
                                                    <div class="col-lg-9">
                                                        
                                                            <div class="user-box" id="input_desc_enc_<?php echo($value->id_form); ?>" style="display:none">
                                                                <input type="text"  name="desc_enc_<?php echo($value->id_form); ?>" id="desc_enc_<?php echo($value->id_form); ?>" required="" value="<?php echo($value->desc_form); ?>" placeholder="Nombre de la Campaña" disabled>
                                                            </div>
                                                            <span id="texto_enc_form_<?php echo($value->id_form); ?>"><?php echo($value->desc_form); ?></span>
                                                            
                                                        
                                                    </div>
                                                    <div class="col-lg-3" style="display:none" id="ico_enc_<?php echo($value->id_form); ?>">
                                            
                                                        <button id="guardar_encuesta_<?php echo($value->id_form); ?>" class="btn text-primary"  data-toggle="tooltip" data-placement="top" title="Guardar"> 
                                                        <span class=" fas fa-save icon font-size-20"></span> </button>
                                                        <a href="" id="cancel_encuesta_<?php echo($value->id_form); ?>" class="btn text-danger cancel"  data-toggle="tooltip" data-placement="top" title="Cancelar"> 
                                                        <span class="fas fa-window-close icon font-size-20"></span> </a>
                                                    </div>
                                               
                                                    <div class="col-lg-3 d-flex justify-content-center" id="action_enc_<?php echo($value->id_form); ?>">
                                                     
                                                        <a href="" id="editar_encuesta_<?php echo($value->id_form); ?>" class="btn text-primary edit"  data-toggle="tooltip" data-placement="top" title="Editar"> 
                                                        <span class=" fas fa-pencil-alt icon font-size-20"></span> </a>
                                                        <a href="<?php echo base_url();?>main/deleteEncuesta/<?php echo($value->id_camp); ?>/<?php echo($value->id_form); ?>" class="btn text-danger"  data-toggle="tooltip" data-placement="top" title="Eliminar"> 
                                                        <span class="fas fa-trash-alt icon font-size-20"></span> </a>
                                                        <a href="<?php echo base_url();?>preguntas/<?php echo($value->id_form); ?>" class="btn text-info"  data-toggle="tooltip" data-placement="top" title="Preguntas"> 
                                                        <span class=" fas fa-arrow-right icon font-size-20"></span> </a>
                                                    </div>
                                                    
                                            
                                            
                                            </div>
                                        </form>  
                                    </div>
                                </div>
                            </div>
                    </div>
            
                    
            <?php  } ?>
        </div>
        <!-- formulario de registro de Encuesta -->
        <div class="row" id="form_reg_encuesta" style="display:none">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                           
                                <div class="input-group-append">
                                
                                        <div class="col-lg-10">
                                           <form action="" id="form_encuesta" name="form_encuesta">
                                                <div class="user-box">
                                                    <input type="text" name="desc_enc" id="desc_enc" placeholder="Nombre de la Encuesta">
                                                </div>
                                                <div class="invalid-feedback" id="error_desc_enc">
                                           
                                                </div>
                                           </form>
                                                
                                                
                                            
                                        </div>
                                        
                                        <div class="col-lg-2">
                                        <button  type="submit" id="registrar_encuesta" class="btn text-success"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Registrar"> 
                                        <span class="fas fa-save icon font-size-24"></span> </button>
                                        <button  id="cancel_encuesta" class="btn text-danger"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Cancelar"> 
                                        <span class="fas fa-window-close icon font-size-24"></span> </button>
                                        </div>
                                
                                
                                </div>
                       
                        </div>
                    </div>
                </div>
        </div>
        <input type="hidden" name="id_camp" id="id_camp" value="<?php echo($campania[0]->id_camp) ?>">
        <script src="<?=base_url('public/assets/js/encuesta.js'); ?>"></script>