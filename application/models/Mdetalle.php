	
<?php 
class Mdetalle extends CI_MODEL
{
    function __construct()
    {
        parent::__construct();
    }
   
    //insertar el detalle de la encuesta
    public function saveDetalle_Encuesta($datos)
	{
		return $this->db->insert('detalle_encuesta', $datos);
	}
     //insertar las respuestas
     public function saveRespuestas($datos)
     {
         return $this->db->insert('respuestas', $datos);
     }
     public function verificarCliente($dni,$id_form){
        $this->db->where('dni_encuestado',$dni);
        $this->db->where('id_form',$id_form);
        $query=$this->db->get('detalle_encuesta');
        //devolvem,os el numero de files que conciden
        if($query->num_rows() == 0){
            return false;
        }else{
            return true;
        }
      
    }
    
    
}