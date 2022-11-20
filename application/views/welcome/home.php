        
        <!-- <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
					<h4 class="title-dashboard">Sistema de encuestas Valtx</h4>
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
		<div class="row">
			<div class="col-md-6 col-12">
				<p class="text-wrong">Total de personas encuestadas hasta la fecha</p>
				<div class="card card_total_encuesta card-encuestados">
					<div class="card-body">
						<div class="row justify-content-end">
								<p>
									<?php
										echo $days[date("N")];
										echo " ";
										echo date("d")."/".date("m")."/".date("Y")
									?>
								</p>
							</div>
							<div class="row justify-content-between">
								<p>Cantidad de personas encuestadas:</p>
								<p><?php echo $detalle_encuesta_array?> personas</p>
							</div>
							<div class="row align-items-center div_view_campaña">
								<a href="#" class="view_per_campaña">Ver por campaña <i class="fa-solid fa-arrow-right ml-1"></i></a>
								
							</div>
						</div>
					</div>	
			</div>
			<div class="col-md-6 col-12">
				<p class="text-wrong">Total de campañas registradas hasta la fecha</p>
				<div class="card card_total_encuesta card-campaña">
					<div class="card-body">
						<div class="row justify-content-end">
							<p>
								<?php
									echo $days[date("N")];
									echo " ";
									echo date("d")."/".date("m")."/".date("Y")
								?>
							</p>
						</div>
						<div class="row justify-content-between">
							<p>Cantidad de campañas registradas: </p>
							<p><?php echo $companies_array?> campañas</p>
						</div>
					</div>
				</div>
			</div>
		</div>
        
		<div class="row">
			<section class="col-lg-6 col-md-6 connectedSortable">
        		<!-- Custom tabs (Charts with tabs)-->
        		<div class="card">
        			<div class="card-header">
        				<h3 class="card-title">
        					<i class="fas fa-chart-bar mr-1"></i>
        					Balance de personas encuestadas
        				</h3>
        			</div><!-- /.card-header -->
        			<div class="card-body">
        				<div class="tab-content mb-3">
        					<div class="d-flex">
        						<div class="col-md-6">
        							<label for="">Año</label>
        							<select name="filter_campanias_anio" id="filter_campanias_anio" class="form-control">
        								<option value="">Todos</option>
        								<option value="2021">2021</option>
        								<option value="2022">2022</option>
        								<option value="2023">2023</option>
        								<option value="2024">2024</option>
        								<option value="2025">2025</option>
        								<option value="2026">2026</option>
        								<option value="2027">2027</option>
        								<option value="2028">2028</option>
        								<option value="2029">2029</option>
        								<option value="2030">2030</option>
        							</select>
        						</div>
        						<div class="col-md-6">
        							<label for="">Mes</label>
        							<select name="filter_campanias_anio" id="filter_campanias_anio" class="form-control">
        								<option value="">Todos</option>
        								<option value="1">Enero</option>
        								<option value="2">Febrero</option>
        								<option value="3">Marzo</option>
        								<option value="4">Abril</option>
        								<option value="5">Mayo</option>
        								<option value="6">Junio</option>
        								<option value="7">Julio</option>
        								<option value="8">Agosto</option>
        								<option value="9">Setiembre</option>
        								<option value="10">Octubre</option>
        								<option value="11">Noviembre</option>
        								<option value="12">Diciembre</option>
        							</select>
        						</div>
        					</div>
        				</div>
        				<div class="tab-content p-0">
        					<!-- Morris chart - Sales -->
        					<canvas id="myBarCampanias" width="400" height="400"></canvas>
        				</div>
        			</div><!-- /.card-body -->
        		</div>
        		<!-- /.card -->
        	</section>
		</div>
        


