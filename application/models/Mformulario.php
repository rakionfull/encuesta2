	
<?php 
class Mformulario extends CI_MODEL
{
    function __construct()
    {
        parent::__construct();
    }
   //obtener las campanias registradas
    public function getFormularios($id_camp) {
        return $this->db->select("*") # También puedes poner * si quieres seleccionar todo
        ->from("formularios")
        ->where('id_camp',$id_camp)
        ->get()
        ->result();
        return $query->result();
    }
    
    
}