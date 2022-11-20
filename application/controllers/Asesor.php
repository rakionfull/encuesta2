<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Asesor extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
		//aqui pueden lllamar a los helper o librerias que requieran para todo el controlador
        $this->load->library('session');
		$this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('mcampania');
        $this->load->model('mformulario');
        $this->load->model('mpregunta');
        $this->load->model('mdetalle');
    }

    public function listCampanias(){
        // if(  $this->session->userdata('USUARIO_logeado')){
            $id_cliente=$this->session->userdata('id_cliente');
            $data['campanias'] = $this->mcampania->getCampanias($id_cliente);
            $data['encuestas'] = $this->mformulario->allEncuestas($id_cliente);
           $this->layout->view('listCampanias',$data);
        // }else{
        //     redirect('login');
        // }
    }
    public function validaCliente(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $resultado=$this->mdetalle->verificarCliente(trim($_POST["dni"]),trim($_POST["id_enc"]));
            echo json_encode($resultado);
        }
    }
    public function getEncuestas($id_enc){
        // if(  $this->session->userdata('USUARIO_logeado')){
        if($_SERVER["REQUEST_METHOD"] == "POST"){ 
            $data0= $this->mformulario->getEncuesta($id_enc);
            $data1= $this->mpregunta->getPreguntas($id_enc);
            $data2= $this->mpregunta->getOpciones($id_enc);
            $datos = [
                "0"=>$data1,
                "1"=>$data2,
                "2"=>$data0
            ];
            echo json_encode($datos);
            // }else{
            //     redirect('login');
        }
    }
    public function registerRespuesta($id_form){
        $fecha_creacion= date("Y-m-d H:i:s");
        $datos = array(
            'id_encuestador '  => $this->session->userdata('id_user'),
            'dni_encuestado' => trim($_POST["cliente_dni"]),
            'nom_encuestado' => trim($_POST["cliente_nombres"]),
            'email_encuestado' => trim($_POST["cliente_correo"]),
            'fecha_enc'  => $fecha_creacion,
            'est_enc'  => 1,
            'id_form ' => $id_form,
        );
    
        $this->db->trans_begin();
        $this->mdetalle->saveDetalle_Encuesta($datos);
        $id_detalle = $this->db->insert_id();
        if($_POST["dataPreguntas"] != 0){
             for ($i=0; $i < count($_POST["dataPreguntas"]); $i++) { 
                $data = array(
                    'id_preg'  =>$_POST["dataPreguntas"][$i],
                    'id_enc'  => $id_detalle,
                    'id_op'  =>$_POST["dataRespuestas"][$i],
                );
                $this->mdetalle->saveRespuestas($data);
           
             }
          
        }
        // echo json_encode(($_POST["opciones"][0]));
        $this->db->trans_commit();
        // echo json_encode($_POST["opciones"]);
        // if($id_pregunta){
        //     echo json_encode($id_pregunta);
        // }
        echo  json_encode(true);
    }

}