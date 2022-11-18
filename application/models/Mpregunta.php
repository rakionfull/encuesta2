	
<?php 
class Mpregunta extends CI_MODEL
{
    function __construct()
    {
        parent::__construct();
    }
   //obtener las preguntas sin opciones
    public function getPreguntas($id_form) {
        return $this->db->select("*") # También puedes poner * si quieres seleccionar todo
        ->from("preguntas")
        ->where('id_form',$id_form)
        ->order_by("pos_preg", "asc")
        ->get()
        ->result();
        // return $query->result();
    }
     //obtener las opciones de todas las preguntas
     public function getOpciones($id_form) {
        return $this->db->select("*") # También puedes poner * si quieres seleccionar todo
        ->from("preguntas")
        ->join("opciones", "opciones.id_preg = preguntas.id_preg")
        ->where('preguntas.id_form',$id_form)
        ->get()
        ->result();
    }
    // public function getEncuesta($id_form) {
    //     return $this->db->select("*") # También puedes poner * si quieres seleccionar todo
    //     ->from("formularios")
    //     ->where('id_form',$id_form)
    //     ->get()
    //     ->result();
    //     return $query->result();
    // }
    //insertar la campania
    public function savePreguntas($datos)
	{
		return $this->db->insert('preguntas', $datos);
	}
    public function verificarPreguntas($desc_preg,$id_form){
        $this->db->where('desc_preg',$desc_preg);
        $this->db->where('id_form',$id_form);
        $query=$this->db->get('preguntas');
        //devolvem,os el numero de files que conciden
        if($query->num_rows() == 0){
            return false;
        }else{
            return true;
        }
      
    }
    //saco la posicion de la pregunta
    public function posPregunta($id_form){
        return $this->db->select("MAX(pos_preg) as posicion") # También puedes poner * si quieres seleccionar todo
        ->from("preguntas")
        ->where('id_form',$id_form)
        ->get()
        ->result();
    }
    public function setOpcion($datos)
	{
		return $this->db->insert('opciones', $datos);
	}
    // public function updateEncuesta($id_enc, $datos)
	// {
	// 	return $this->db->where('id_form', $id_enc)->update('formularios', $datos);
	// }
    // public function deleteEncuesta($id_enc)
	// {
    //     return $this->db->where('id_form', $id_enc)->delete('formularios');
	// }
    
}