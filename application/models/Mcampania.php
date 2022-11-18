	
<?php 
class Mcampania extends CI_MODEL
{
    function __construct()
    {
        parent::__construct();
    }
   //obtener las campanias registradas
    public function getCampanias($id_cliente) {
        return $this->db->select("*") # También puedes poner * si quieres seleccionar todo
        ->from("campanias")
        ->where('id_cliente',$id_cliente)
        ->get()
        ->result();
        return $query->result();
    }
     //obtener las campania
     public function getCampania($id_camp) {
        return $this->db->select("*") # También puedes poner * si quieres seleccionar todo
        ->from("campanias")
        ->where('id_camp',$id_camp)
        ->get()
        ->result();
        return $query->result();
    }
    //insertar la campania
    public function saveCampania($datos)
	{
		return $this->db->insert('campanias', $datos);
	}
    public function verificarCampania($desc_camp,$id_cliente){
        $this->db->where('desc_camp',$desc_camp);
        $this->db->where('id_cliente',$id_cliente);
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