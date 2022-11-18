	
<?php 
class Mlogin extends CI_MODEL
{
    function __construct()
    {
        parent::__construct();
    }
   
    public function obtenerUsuario($user,$clave) {
        return $this->db->select("*") # También puedes poner * si quieres seleccionar todo
        ->from("usuarios")
        ->where('usuario',$user)
        ->where('clave',$clave)
        ->get()
        ->result();
        // $this->db->where('usuario',$user);
        // $this->db->where('clave',$clave);
    
        // $query=$this->db->get('usuarios');
      
    }
    public function obtenerUsuarioCliente($idusuario) {
        return $this->db->select("*") # También puedes poner * si quieres seleccionar todo
        ->from("usuarios")
        ->join("detalle_cliente", "detalle_cliente.id_usuario = usuarios.idusuario")
        ->join("clientes", "clientes.id_cliente = detalle_cliente.id_cliente")
        ->where('usuarios.idusuario',$idusuario)
        ->get()
        ->result();
        // $this->db->where('usuario',$user);
        // $this->db->where('clave',$clave);
    
        // $query=$this->db->get('usuarios');
      
    }
    
}