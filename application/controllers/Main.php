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
    }
	
	public function home(){
            // if(  $this->session->userdata('USUARIO_logeado')){
			
               
               $this->layout->view('home');
            // }else{
            //     redirect('login');
            // }
	}
    public function validaCampania(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $resultado=$this->mcampania->verificarCampania(trim($_POST["desc_camp"]));
            echo json_encode($resultado);
        }
    }
    public function getCampanias(){
        $data = $this->mcampania->getCampanias();
        $resultados = array();
        $count=1;
        foreach ($data as $resultado) {
          $NuevaData=[
            "numero"=> $count,
            'desc_camp'  => $resultado -> desc_camp,
            'est_camp'  => $resultado -> est_camp,
            'fecha_reg'  => $resultado -> fecha_reg,
            'id_camp'  => $resultado -> id_camp,
            'id_user'  => $resultado -> id_user,
          ];
          $resultados[] = $NuevaData;
          $count = $count + 1;
        }
        
        $datos = [
          "sEcho" => 1,
          "iTotalRecords" => count($resultados),
          "iTotalDisplayRecords" => count($resultados),
          "aaData" => $resultados 
        ];
        
        echo json_encode($datos);
    }
    public function registerCompania(){
        if($_SERVER["REQUEST_METHOD"] == "POST")
		    {

					$fecha_creacion= date("Y-m-d H:i:s");     
					$datos = array(
						'desc_camp'  => trim($_POST["desc_camp"]),
                        'est_camp' => 1,
                        'id_user' => 1, //recordar cambiarlo
						'fecha_reg'  => $fecha_creacion,
					
					);
				
						$resultado=$this->mcampania->saveCampania($datos);
                        echo json_encode($resultado);

			}else{
				echo  json_encode(false);
			}
    }
    public function updateCompania(){
        if($_SERVER["REQUEST_METHOD"] == "POST")
		    {    
					$datos = array(
						'desc_camp'  => trim($_POST["desc_camp"]),
					
					);
				
						$resultado=$this->mcampania->updateCampania(trim($_POST["id_camp"]),$datos);
                        echo json_encode($resultado);

			}else{
				echo  json_encode(false);
			}
    }
    public function deleteCompania(){
        if($_SERVER["REQUEST_METHOD"] == "POST")
		    {    				
						$resultado=$this->mcampania->deleteCampania(trim($_POST["id_camp"]));
                        echo json_encode($resultado);

			}else{
				echo  json_encode(false);
			}
    }
    
    

    
}
