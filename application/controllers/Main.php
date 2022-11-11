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
    public function validaCampania(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $idcall=1;
            $resultado=$this->mcampania->verificarCampania(trim($_POST["desc_camp"]),$idcall);
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
    // public function formularios($id_camp){
    //     $data['id_camp'] = $id_camp;
    //     $this->layout->view('formularios',$data);
    // }
    
    // public function getFormularios($id_camp){
    //     // $idcall=1;
    //     $data = $this->mformulario->getFormularios($id_camp);
    //     $resultados = array();
    //     $count=1;
    //     foreach ($data as $resultado) {
    //       $NuevaData=[
    //         "numero"=> $count,
    //         'desc_camp'  => $resultado -> desc_camp,
    //         'est_camp'  => $resultado -> est_camp,
    //         'fecha_reg'  => $resultado -> fecha_reg,
    //         'id_camp'  => $resultado -> id_camp,
    //         'id_user'  => $resultado -> id_user,
    //       ];
    //       $resultados[] = $NuevaData;
    //       $count = $count + 1;
    //     }
        
    //     $datos = [
    //       "sEcho" => 1,
    //       "iTotalRecords" => count($resultados),
    //       "iTotalDisplayRecords" => count($resultados),
    //       "aaData" => $resultados 
    //     ];
        
    //     echo json_encode($datos);
    // }
    // public function createForm(){
    //     $this->layout->view('createForm');
    // }
    

    
}
