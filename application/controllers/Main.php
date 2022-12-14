<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// use src\PhpSpreadsheet\Writer\Xlsx;
// // // // use PhpOffice\PhpSpreadsheet\IOFactory;
// use src\PhpSpreadsheet\Spreadsheet;
// require 'public/assets/libs/PhpSpreadsheet/src/PhpSpreadsheet/Spreadsheet.php';
// require 'public/assets/libs/PhpSpreadsheet/src/PhpSpreadsheet/Writer/Xlsx.php';

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
        $this->load->model('mpregunta');
        $this->load->model('mdetalle');
        $this->load->library('excel');
    }
	

    public function listCampanias(){
        if(  $this->session->userdata('USUARIO_logeado')){
        
            $id_cliente=$this->session->userdata('id_cliente');
            $data['campanias'] = $this->mcampania->getCampanias($id_cliente);
            $data['encuestas'] = $this->mformulario->allEncuestas($id_cliente);
           $this->layout->view('listCampanias',$data);
        }else{
            redirect('Auth/login');
        }
    }
    public function manCampanias(){
        if( $this->session->userdata('USUARIO_logeado')){
            $id_cliente=$this->session->userdata('id_cliente');
            $data['campanias'] = $this->mcampania->getCampanias($id_cliente);
           
           $this->layout->view('manCampanias',$data);
        }else{
            redirect('Auth/login');
        }
    }
    public function manEncuestas($id_camp){
        if(  $this->session->userdata('USUARIO_logeado')){
            $data['campania'] = $this->mcampania->getCampania($id_camp);
            $data['encuestas'] = $this->mformulario->getEncuestas($id_camp);
           $this->layout->view('manEncuestas',$data);
        }else{
           redirect('Auth/login');
        }
    }
    public function manPreguntas($id_form){
        if(  $this->session->userdata('USUARIO_logeado')){
           
            $data['encuesta'] = $this->mformulario->getEncuesta($id_form);
            $data['preguntas'] = $this->mpregunta->getPreguntas($id_form);
            $data['opciones'] = $this->mpregunta->getOpciones($id_form);
           $this->layout->view('manPreguntas',$data);
        }else{
            redirect('Auth/login');
        }
    }


    public function validaCampania(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $id_cliente=$this->session->userdata('id_cliente');
            $resultado=$this->mcampania->verificarCampania(trim($_POST["desc_camp"]),$id_cliente);
            echo json_encode($resultado);
        }
    }
    public function validaEncuesta(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $resultado=$this->mformulario->verificarEncuesta(trim($_POST["desc_enc"]),trim($_POST["id_camp"]));
            echo json_encode($resultado);
        }
    }
    public function validaPregunta(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $resultado=$this->mpregunta->verificarPreguntas(trim($_POST["titulo_pregunta"]),trim($_POST["id_enc"]));
            echo json_encode($resultado);
        }
    }
  
    //crud de campa??a
    public function registerCompania(){
        if($_SERVER["REQUEST_METHOD"] == "POST")
		    {
                    $id_cliente=$this->session->userdata('id_cliente');
					$fecha_creacion= date("Y-m-d H:i:s");     
					$datos = array(
						'desc_camp'  => trim($_POST["desc_camp"]),
                        'est_camp' => 1,
                        'id_cliente' => $id_cliente,
                        'id_user' => $this->session->userdata('id_user'), //recordar cambiarlo
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
                                Campa??a Modificado
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
                                Campa??a Eliminada
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
                    $id_cliente=1;
					$fecha_creacion= date("Y-m-d H:i:s");     
					$datos = array(
						'desc_form'  => trim($_POST["desc_enc"]),
                        'est_form' => 1,
                        'id_camp' => trim($_POST["id_camp"]),
                        'id_user' => $this->session->userdata('id_user'), //recordar cambiarlo
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
    //crud de preguntas y opciones
    public function registerPregunta(){
        if($_SERVER["REQUEST_METHOD"] == "POST")
		    {
                // var_dump($_POST["opciones"]);  
                // echo  json_encode($_POST["opciones"]);  
                    $id_cliente=1;
					$fecha_creacion= date("Y-m-d H:i:s");
                    //traigo la posicion que le tocara
                   $result= $this->mpregunta->posPregunta(trim($_POST["id_enc"]));
                   $posicion=1;
                   if($result){
                    $posicion = $result[0]->posicion + 1;
                   }

					$datos = array(
						'desc_preg'  => trim($_POST["titulo_pregunta"]),
                        'obligatorio_preg' => trim($_POST["obligatorio"]),
                        'visible_preg' => 1,
                        'pos_preg'=> $posicion,
                        'id_form ' => trim($_POST["id_enc"]),
						'fecha_reg'  => $fecha_creacion,
					
					);
				
                    $this->db->trans_begin();
                    $this->mpregunta->savePreguntas($datos);
                    $id_pregunta = $this->db->insert_id();
                    if($_POST["opciones"] != 0){
                         for ($i=0; $i < count($_POST["opciones"]); $i++) { 
                            $data = array(
                                'desc_op'  =>$_POST["opciones"][$i],
                                'id_preg'  => $id_pregunta,
                                'evento'  =>$_POST["eventos"][$i],
                            );
                            $this->mpregunta->setOpcion($data);
                       
                         }
                      
                    }
                    // echo json_encode(($_POST["opciones"][0]));
                    $this->db->trans_commit();
                    // echo json_encode($_POST["opciones"]);
                    // if($id_pregunta){
                    //     echo json_encode($id_pregunta);
                    // }
                    echo  json_encode(true);

			}else{
				echo  json_encode(false);
			}
    }
    public function reporteEncuesta($id_enc){
        
        
        $data   =   $this->mdetalle->camposEncuesta($id_enc);
        $columns = [];
        for ($i = 0; $i < count($data); $i++) {
            $columns[] = $data[$i]->name;
        }
        $datos = $this->mdetalle->reporteEncuesta($id_enc);
        $objPHPExcel = new PHPExcel();
        //agregar propiedades
        $objPHPExcel->getProperties()
        ->setCreator("Valtx")
        ->setLastModifiedBy("Valtx")
        ->setTitle("Reporte")
        ->setSubject("Reporte")
        ->setDescription("Reporte generado por Valtx")
        ->setKeywords("reporte excel en php")
        ->setCategory("reporte");

        //pesta??as activas
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->setTitle('Reporte');

        //celdas

      // Agregar en celda A1 valor string
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'PHPExcel');
            
        // Agregar en celda A2 valor numerico
        //$objPHPExcel->getActiveSheet()->setCellValue('A2', '1');
        $columnArray  = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
        $rowCount = 1;
        $columnlenght = 0;
        foreach ($data as $val) {
            // set column header values
            $objPHPExcel->getActiveSheet()->SetCellValue($columnArray[$columnlenght++] . $rowCount, $val->name);
        }
        // make the column headers bold
        $objPHPExcel->getActiveSheet()->getStyle($columnArray[0]."1:".$columnArray[$columnlenght]."1")->getFont()->setBold(true);
        
        $rowCount++;
        // Iterate through each result from the SQL query in turn
        // We fetch each database result row into $row in turn
        
       foreach ($datos as $key => $value) {
            for ($i = 0; $i < $columnlenght; $i++) {
                $columna = $columns[$i];
                $objPHPExcel->getActiveSheet()->SetCellValue($columnArray[$i] . $rowCount, $value->$columna);
            }
            $rowCount++;
       }
          
        


        // // Agregar en celda A3 valor boleano
        // $objPHPExcel->getActiveSheet()->setCellValue('A3', TRUE);
            
        // // Agregar a Celda A4 una formula
        // $objPHPExcel->getActiveSheet()->setCellValue('A4', '=CONCATENATE(A1, " ", A2)');
        //descargar archivo
        // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        // header('Content-Disposition: attachment;filename="reporte.xlsx"');
        // header('Cache-Control: max-age=0');
        
        // $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        // print_r($objWriter);
        // file_put_contents('depuracion.txt', ob_get_contents());
        // ob_end_clean();
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
       
        // $objWriter->save('c://exportacion');
        $fecha_creacion= date("Y-m-d");     
        # Le pasamos la ruta de guardado
        $ruta='reporte-'.$id_enc.'-'.$fecha_creacion.'.xlsx';
        $objWriter->save('./public/assets/reportes/'.$ruta);


        // $documento = new Spreadsheet();
        // $documento
        //     ->getProperties()
        //     ->setCreator("Valtx")
        //     ->setLastModifiedBy('Valtx')
        //     ->setTitle('Archivo exportado desde MySQL')
        //     ->setDescription('Un archivo de Excel exportado desde MySQL por Valtx');
        
        // # Como ya hay una hoja por defecto, la obtenemos, no la creamos
        // $hojaDeReporte = $documento->getActiveSheet();
        // $hojaDeReporte->setTitle("Reporte");
        
        // # Escribir encabezado
        // $encabezado = $columns;
        // # El ??ltimo argumento es por defecto A1 pero lo pongo para que se explique mejor
        // $hojaDeReporte->fromArray($encabezado, null, 'A1');
        
        // $consulta = $datos;
       
        // # Comenzamos en la 2 porque la 1 es del encabezado
        // $numeroDeFila = 2;
        //      foreach ($datos as $result) {
        //          # Obtener los datos de la base de datos
        //          for ($i=0; $i < count($columns) ; $i++) { 
        //             $columna = $columns[$i];
        //             $hojaDeReporte->setCellValueByColumnAndRow($i+1, $numeroDeFila, $result->$columna);
                   
        //          }
              
        //         $numeroDeFila++;
            
        //     }
     
        // #
        // # Crear un "escritor"
      
        // $writer = new Xlsx($documento);
        // $fecha_creacion= date("Y-m-d");     
        // # Le pasamos la ruta de guardado
        // $ruta='reporte-'.$id_enc.'-'.$fecha_creacion.'.xlsx';
        // $writer->save('./public/assets/reportes/'.$ruta);




        echo json_encode($ruta);
       
    }
    
}
