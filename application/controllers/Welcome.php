<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public $days = [
		'domingo',
		'lunes',
		'martes',
		'miercoles',
		'jueves',
		'viernes',
		'sábado'
	];
    public function __construct()
    {
        parent::__construct();
		//aqui pueden lllamar a los helper o librerias que requieran para todo el controlador
		
    }
	
	public function home(){
		$companies_array = array();
		$query = $this->db->query('SELECT count(*) as cantidad FROM campanias');
		foreach ($query->result() as $row) {
			array_push($companies_array,$row->cantidad);
		}	

		$detalle_encuesta_array = array();
		$query = $this->db->query('SELECT count(*) as cantidad FROM detalle_encuesta');
		foreach ($query->result() as $row) {
			array_push($detalle_encuesta_array,$row->cantidad);
		}	
		$data = [
			'companies_array' => $companies_array[0],
			'detalle_encuesta_array' => $detalle_encuesta_array[0],
			'days' => $this->days
		];	
		$this->layout->view('home',$data);
		
	}
    

    
}
