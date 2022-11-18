        
        <!-- <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Pagina de Inicio</h4>

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
                        <div class="card-body">
                           
                            <?php  if($this->session->userdata('idcall') == 2){?>
                                <p>BIENVENIDO A LA DASHBOARD ASESOR</p>
                                <p>Usuario:  <?php echo $this->session->userdata('usuario')  ?> de <?php echo $this->session->userdata('desc_cliente')  ?></p> 
                            <?php  } ?>
                            <?php  if($this->session->userdata('idcall') == 1){?>
                                <p>BIENVENIDO A LA DASHBOARD DEL ADMIN</p>
                                <p>Usuario:  <?php echo $this->session->userdata('usuario')  ?> de <?php echo $this->session->userdata('desc_cliente')  ?></p> 
                            <?php  } ?>
                            <?php  if($this->session->userdata('idcall') == 0){?>
                                <p>BIENVENIDO A LA DASHBOARD DEL SUPERADMIN</p>
                                <p>Usuario:  <?php echo $this->session->userdata('usuario')  ?></p> 
                            <?php  } ?>
                            <!-- segun la idcall de la sesion -->
                           
                        </div>
                    </div>
                </div>
        </div>
        


