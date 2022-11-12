<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
		//aqui pueden lllamar a los helper o librerias que requieran para todo el controlador
        $this->load->library('session');
		$this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('mcampania');
        $this->load->model('mformulario');
    }
	

    public function listCampanias(){
        // if(  $this->session->userdata('USUARIO_logeado')){
        
           
           $this->layout->view('listCampanias');
        // }else{
        //     redirect('login');
        // }
    }
    public function manCampanias(){
        // if(  $this->session->userdata('USUARIO_logeado')){
            $idcall=1;
            $data['campanias'] = $this->mcampania->getCampanias($idcall);
           
           $this->layout->view('manCampanias',$data);
        // }else{
        //     redirect('login');
        // }
    }
    public function manEncuestas($id_camp){
        // if(  $this->session->userdata('USUARIO_logeado')){
           
            $data['campania'] = $this->mcampania->getCampania($id_camp);
            $data['encuestas'] = $this->mformulario->getEncuestas($id_camp);
           $this->layout->view('manEncuestas',$data);
        // }else{
        //     redirect('login');
        // }
    }
    public function manPreguntas($id_form){
        // if(  $this->session->userdata('USUARIO_logeado')){
           
            $data['encuesta'] = $this->mformulario->getEncuesta($id_form);
            // $data['preguntas'] = $this->mpregunta->getPreguntas($id_form);
           $this->layout->view('manPreguntas',$data);
        // }else{
        //     redirect('login');
        // }
    }


    public function validaCampania(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $idcall=1;
            $resultado=$this->mcampania->verificarCampania(trim($_POST["desc_camp"]),$idcall);
            echo json_encode($resultado);
        }
    }
    public function validaEncuesta(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $resultado=$this->mformulario->verificarEncuesta(trim($_POST["desc_enc"]),trim($_POST["id_camp"]));
            echo json_encode($resultado);
        }
    }
    // public function getCampanias(){
    //     //falta tener el idcall (servura oara identificar los clientes)
    //     $idcall=1;
    //     $data = $this->mcampania->getCampanias($idcall);

    //     echo json_encode($data);
    // }
    // public function registerCompania(){
    //     if($this->input->post()){
    //         $this->form_validation->set_rules(
    //             'desc_camp','desc_camp',
    //             'required|min_length[6]|is_unique[encuestas.campanias]',
    //             array(
    //                     'required'      => 'Debes Ingresar %s.',
    //                     'is_unique'     => 'Este %s ya esta registrado.'
    //             )
    //         );

    //         if ($this->form_validation->run() == FALSE)
    //         {
    //             $idcall=1;
    //             $data['campanias'] = $this->mcampania->getCampanias($idcall);
               
    //            $this->layout->view('manCampanias',$data);
    //         }
    //         else
    //         {

    //             $idcall=1;
    //             $fecha_creacion= date("Y-m-d H:i:s");     
    //             $datos = array(
    //                 'desc_camp'  => trim($this->input->post('desc_camp')),
    //                 'est_camp' => 1,
    //                 'idcall' => $idcall,
    //                 'id_user' => 1, //recordar cambiarlo
    //                 'fecha_reg'  => $fecha_creacion,
    //             );
    //             try
    //             {
    //                     $resultado=$this->mcampania->saveCampania($datos);
    //                     if($resultado){
    //                         $this->session->set_flashdata('error',' <div class="alert alert-success alert-dismissible fade show" role="alert">
    //                             Campaña Registrada
    //                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //                                     <span aria-hidden="true">&times;</span>
    //                                 </button>
    //                             </div>');
    //                             redirect('main/manCampanias');
    //                     }else{
    //                         $this->session->set_flashdata('error',' <div class="alert alert-danger alert-dismissible fade show" role="alert">
    //                         Error al Registrar
    //                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //                             <span aria-hidden="true">&times;</span>
    //                         </button>
    //                     </div>');
    //                     redirect('main/manCampanias');

    //                     }
    //             }
    //             catch(PDOException $ex)
    //             {
    //                 $this->db->trans_rollback();
    //             }   
    //         }
            
    //     }else{
    //         redirect('main/manCampanias');
    //     }
    // }
    //crud de campaña
    public function registerCompania(){
        if($_SERVER["REQUEST_METHOD"] == "POST")
		    {
                    $idcall=1;
					$fecha_creacion= date("Y-m-d H:i:s");     
					$datos = array(
						'desc_camp'  => trim($_POST["desc_camp"]),
                        'est_camp' => 1,
                        'idcall' => $idcall,
                        'id_user' => 1, //recordar cambiarlo
						'fecha_reg'  => $fecha_creacion,
					
					);
				
						$resultado=$this->mcampania->saveCampania($datos);
                        echo json_encode($resultado);

			}else{
				echo  json_encode(false);
			}
    }
    public function updateCampania($id){
        if($this->input->post()){
          
                $datos = array(
                    'desc_camp'  => trim($this->input->post('desc_camp_'.$id)),
                );
                try
                {
                        $resultado=$this->mcampania->updateCampania($id,$datos);
                        if($resultado){
                            $this->session->set_flashdata('error',' <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Campaña Modificado
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>');
                                redirect('main/manCampanias');
                        }else{
                            $this->session->set_flashdata('error',' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Error al Modificar
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>');
                        redirect('main/manCampanias');

                        }
                }
                catch(PDOException $ex)
                {
                    $this->db->trans_rollback();
                }   
                
        }else{
			redirect('main/manCampanias');
		}
					
				
						

			
    }
    public function deleteCampania($id){
    				
						$resultado=$this->mcampania->deleteCampania($id);
                        if($resultado){
                            $this->session->set_flashdata('error',' <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Campaña Eliminada
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>');
                                redirect('main/manCampanias');
                        }else{
                            $this->session->set_flashdata('error',' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Error al Modificar
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>');
                        redirect('main/manCampanias');

                        }
	
    }
    // crud de encuesta
    public function registerEncuesta(){
        if($_SERVER["REQUEST_METHOD"] == "POST")
		    {
                    $idcall=1;
					$fecha_creacion= date("Y-m-d H:i:s");     
					$datos = array(
						'desc_form'  => trim($_POST["desc_enc"]),
                        'est_form' => 1,
                        'email' => 0,
                        'id_camp' => trim($_POST["id_camp"]),
                        'id_user' => 1, //recordar cambiarlo
                        'fecha_exp'  => $fecha_creacion,
						'fecha_reg'  => $fecha_creacion,
					
					);
				
						$resultado=$this->mformulario->saveEncuesta($datos);
                        echo json_encode($resultado);

			}else{
				echo  json_encode(false);
			}
    }
    public function updateEncuesta($id_camp,$id_enc){
        if($this->input->post()){
          
                $datos = array(
                    'desc_form'  => trim($this->input->post('desc_enc_'.$id_enc)),
                );
                try
                {
                        $resultado=$this->mformulario->updateEncuesta($id_enc,$datos);
                        if($resultado){
                            $this->session->set_flashdata('error',' <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Encuesta Modificada
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>');
                                redirect('main/manEncuestas/'.$id_camp);
                        }else{
                            $this->session->set_flashdata('error',' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Error al Modificar
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>');
                        redirect('main/manEncuestas/'.$id_camp);

                        }
                }
                catch(PDOException $ex)
                {
                    $this->db->trans_rollback();
                }   
                
        }else{
			redirect('main/manEncuestas');
		}
					
				
						

			
    }
    public function deleteEncuesta($id_camp,$id_enc){
    				
						$resultado=$this->mformulario->deleteEncuesta($id_enc);
                        if($resultado){
                            $this->session->set_flashdata('error',' <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Encuesta Eliminada
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>');
                                redirect('main/manEncuestas/'.$id_camp);
                        }else{
                            $this->session->set_flashdata('error',' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Error al Modificar
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>');
                        redirect('main/manEncuestas/'.$id_camp);

                        }
	
    }
    

    
}
