        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Lista de Campañas</h4>

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
                    <div class="col-md-4 mb-5">
                                    <a href="" id="add_campania"   class="btn btn-primary btn-sm waves-effect waves-light">
                                    <i class=" fas fa-plus-circle align-middle ml-2 mr-2"></i>Crear Campaña</a>
                        
                    </div>
                    <div class="col-md-12" style="margin-top:0.5rem" id="alert_campania">
                                    
                    </div>
            </div>
        </div>
        <?php 
            if($this->session->flashdata('error')!= '')
            {
                echo $this->session->flashdata('error');
            }
        ?>
        <!-- listado de campañas registradas -->
        <div class="datos">
            <?php 
            foreach ($campanias as $key => $value) { ?>
           
                    <div class="row" id="" style="">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="<?php echo base_url();?>main/updateCampania/<?php echo($value->id_camp); ?>" method="post" >
                                            <div class="input-group-append">
                                                
                                                    <div class="col-lg-9">
                                                        
                                                            <div class="user-box" id="input_desc_camp_<?php echo($value->id_camp); ?>" style="display:none">
                                                                <input type="text"  name="desc_camp_<?php echo($value->id_camp); ?>" id="desc_camp_<?php echo($value->id_camp); ?>" required="" value="<?php echo($value->desc_camp); ?>" placeholder="Nombre de la Campaña" disabled>
                                                            </div>
                                                            <span id="texto_desc_camp_<?php echo($value->id_camp); ?>"><?php echo($value->desc_camp); ?></span>
                                                            
                                                        
                                                    </div>
                                                    <div class="col-lg-3" style="display:none" id="ico_camp_<?php echo($value->id_camp); ?>">
                                            
                                                        <button id="guardar_campania_<?php echo($value->id_camp); ?>" class="btn text-primary"  data-toggle="tooltip" data-placement="top" title="Guardar"> 
                                                        <span class=" fas fa-save icon font-size-20"></span> </button>
                                                        <a href="" id="cancel_campania_<?php echo($value->id_camp); ?>" class="btn text-danger cancel"  data-toggle="tooltip" data-placement="top" title="Cancelar"> 
                                                        <span class="fas fa-window-close icon font-size-20"></span> </a>
                                                    </div>
                                               
                                                    <div class="col-lg-3 d-flex justify-content-center" id="action_camp_<?php echo($value->id_camp); ?>">
                                                     
                                                        <a href="" id="editar_campania_<?php echo($value->id_camp); ?>" class="btn text-primary edit"  data-toggle="tooltip" data-placement="top" title="Editar"> 
                                                        <span class=" fas fa-pencil-alt icon font-size-20"></span> </a>
                                                        <a href="<?php echo base_url();?>main/deleteCampania/<?php echo($value->id_camp); ?>" class="btn text-danger"  data-toggle="tooltip" data-placement="top" title="Eliminar"> 
                                                        <span class="fas fa-trash-alt icon font-size-20"></span> </a>
                                                        <a href="" class="btn text-info"  data-toggle="tooltip" data-placement="top" title="Formularios"> 
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
        <!-- formulario de registro de campaña -->
        <div class="row" id="form_reg_campania" style="display:none">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                           
                                <div class="input-group-append">
                                
                                        <div class="col-lg-10">
                                           <form action="" id="form_campania" name="form_campania">
                                                <div class="user-box">
                                                    <input type="text" name="desc_camp" id="desc_camp" placeholder="Nombre de la Campaña">
                                                </div>
                                                <div class="invalid-feedback" id="error_desc_camp">
                                           
                                                </div>
                                           </form>
                                                
                                                
                                            
                                        </div>
                                        
                                        <div class="col-lg-2">
                                        <button  type="submit" id="registrar_campania" class="btn text-success"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Registrar"> 
                                        <span class="fas fa-save icon font-size-24"></span> </button>
                                        <button  id="cancel_campania" class="btn text-danger"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Cancelar"> 
                                        <span class="fas fa-window-close icon font-size-24"></span> </button>
                                        </div>
                                
                                
                                </div>
                       
                        </div>
                    </div>
                </div>
        </div>

        <script src="<?=base_url('public/assets/js/campania.js'); ?>"></script>