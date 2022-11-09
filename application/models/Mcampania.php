	
<?php 
class Mcampania extends CI_MODEL
{
    function __construct()
    {
        parent::__construct();
    }
   //obtener las campanias registradas
    public function getCampanias() {
        return $this->db->select("*") # También puedes poner * si quieres seleccionar todo
        ->from("campanias")
        ->get()
        ->result();
        return $query->result();
    }
    //insertar la campania
    public function saveCampania($datos)
	{
		return $this->db->insert('campanias', $datos);
	}
    public function verificarCampania($desc_camp){
        $this->db->where('desc_camp',$desc_camp);

        $query=$this->db->get('campanias');
        //devolvem,os el numero de files que conciden
        if($query->num_rows() == 0){
            return false;
        }else{
            return true;
        }
      
    }
    public function updateCampania($id_camp, $datos)
	{
		return $this->db->where('id_camp', $id_camp)->update('campanias', $datos);
	}
    public function deleteCampania($id_camp)
	{
        return $this->db->where('id_camp', $id_camp)->delete('campanias');
	}
    
}