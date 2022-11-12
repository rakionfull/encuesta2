	
<?php 
class Mformulario extends CI_MODEL
{
    function __construct()
    {
        parent::__construct();
    }
   //obtener las campanias registradas
    public function getEncuestas($id_camp) {
        return $this->db->select("*") # También puedes poner * si quieres seleccionar todo
        ->from("formularios")
        ->where('id_camp',$id_camp)
        ->get()
        ->result();
        return $query->result();
    }
    public function getEncuesta($id_form) {
        return $this->db->select("*") # También puedes poner * si quieres seleccionar todo
        ->from("formularios")
        ->where('id_form',$id_form)
        ->get()
        ->result();
        return $query->result();
    }
    //insertar la campania
    public function saveEncuesta($datos)
	{
		return $this->db->insert('formularios', $datos);
	}
    public function verificarEncuesta($desc_enc,$id_camp){
        $this->db->where('desc_form',$desc_enc);
        $this->db->where('id_camp',$id_camp);
        $query=$this->db->get('formularios');
        //devolvem,os el numero de files que conciden
        if($query->num_rows() == 0){
            return false;
        }else{
            return true;
        }
      
    }
    public function updateEncuesta($id_enc, $datos)
	{
		return $this->db->where('id_form', $id_enc)->update('formularios', $datos);
	}
    public function deleteEncuesta($id_enc)
	{
        return $this->db->where('id_form', $id_enc)->delete('formularios');
	}
    
}