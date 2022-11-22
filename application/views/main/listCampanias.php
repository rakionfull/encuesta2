<div class="row col-md-12 d-flex align-items-center">
    <div class="col-md-6" >
            <div class="card-title mt-1">
                <div class="page-title-box ">
                    <h4 class="mb-0">Campañas registradas </h4>

                   
                </div>
            </div>
    </div>
    <div class="col-md-6">
            <div class="card-title mt-0">
                <div class="mb-3 row" >
                    <label for="select_cliente" class="col-sm-5 col-form-label">Seleccione un cliente:</label>
                    <div class="col-sm-6">
                        <select name="select_cliente" id="select_cliente" class="form-control" disabled>
                                <option value="1">Telefonica</option>

                        </select>
                    </div>
                </div>
                               
            </div>
    </div>      
          
            
</div>
<div class="row">
    <?php foreach ($campanias as $key => $value) { ?>
        <div class="card col-md-12 campania" id="campania_<?php echo($value->id_camp) ?>">
            <div class="card-body">
                <div class="row">
                            <div class="col-md-11">
                                <div class="card-title">
                                    <div class="page-title-box ">
                                     <h6><?php echo($value->desc_camp) ?></h6>
                                    </div>
                                </div>
                               
                            </div>
                            <div class="col-md-1 bajar" id="con_bajar_<?php echo($value->id_camp) ?>">
                                <a href="" id="bajar_<?php echo($value->id_camp) ?>"><i class=" fas fa-angle-down font-size-20"></i></a>
                                
                            </div>
                            <div class="col-md-1 subir" id="con_subir_<?php echo($value->id_camp) ?>" style="display:none">
                                <a href="" id="subir_<?php echo($value->id_camp) ?>" ><i class=" fas fa-angle-up font-size-20"></i></a>
                                
                            </div>  
                </div>
                <div id="caja_<?php echo($value->id_camp) ?>" style="display:none">
                    <?php foreach ($encuestas as $encuesta => $valor) {
                                    if($value->id_camp == $valor->id_camp){
                        ?>
                        <div class="row">
                            <div class="col-md-9">
                                <span><?php echo($valor->desc_form) ?></span>
                            </div>
                            <div class="col-md-3">
                                <span>Exportar en </span>
                                <a href="" id="descarga_<?php echo($valor->id_form) ?>" class="descarga" download>
                                    <img src="<?=base_url('public/images/excel.png') ?>" alt="" height='30' witdh='30'>
                                </a>
                               
                            </div>
                        </div>
                    <?php }} ?>
                </div>
              
                      
                                         
            </div>
        </div>
    <?php } ?>
</div>
<script src="<?=base_url('public/assets/js/listcampanias.js'); ?>"></script>