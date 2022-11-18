<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
		//aqui pueden lllamar a los helper o librerias que requieran para todo el controlador
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('mlogin');
    }
	

    public function login(){
       
           $this->load->view('login/login');
        
    }
    public function ingresar(){
        $usuario = $this->input->post('usuario');
        $password = $this->input->post('passw');
        $datosUsuario = $this->mlogin->obtenerUsuario($usuario,$password);
        if($datosUsuario[0]->idcall == 0){
            //es superadministrador
            $data = [
                'USUARIO_logeado' => true,   
                "id_user" => $datosUsuario[0]->idusuario,
                "usuario" => $datosUsuario[0]->usuario,
                "idcall" => $datosUsuario[0]->idcall,
            ];
        }else{
            //es asesor o admin normal
            $datosNormales = $this->mlogin->obtenerUsuarioCliente($datosUsuario[0]->idusuario);
          
            $data = [
                'USUARIO_logeado' => true,   
                "id_user" => $datosNormales[0]->idusuario,
                "usuario" => $datosNormales[0]->usuario,
                "idcall" => $datosNormales[0]->idcall,
                "id_cliente" => $datosNormales[0]->id_cliente,
                "desc_cliente" => $datosNormales[0]->desc_cliente,
            ];
        }
      
        $this->session->set_userdata($data);
        redirect('home');
    }
    public function logout(){
        session_destroy();
		redirect('Auth/login');
    }

}