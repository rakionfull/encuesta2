
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
    public function camposEncuesta($id_enc){
        $parte2 =  " ";
        $parte1="SELECT * FROM (SELECT DE.id_enc,DE.nom_encuestado,DE.email_encuestado,DE.dni_encuestado,DE.id_encuestador , ";
        //llamo a las preguntas
         $preguntas = $this->db->select("*") # También puedes poner * si quieres seleccionar todo
        ->from("preguntas")
        ->where('id_form',$id_enc)
        ->get()
        ->result();
        

            for ($i=0; $i < count($preguntas) ; $i++) { 
            
                                if($i == count($preguntas) - 1){
                                    $parte2= $parte2." MAX(CASE WHEN P.desc_preg = '".$preguntas[$i]->desc_preg."' THEN P.desc_preg END) as P".($i+1)." ,
                                     MAX(CASE WHEN P.desc_preg = '".$preguntas[$i]->desc_preg."' THEN O.desc_op END) as R".($i+1)." ";
                                }else{
                                    $parte2= $parte2." MAX(CASE WHEN P.desc_preg = '".$preguntas[$i]->desc_preg."' THEN P.desc_preg END) as P".($i+1)." ,
                                                MAX(CASE WHEN  P.desc_preg = '".$preguntas[$i]->desc_preg."' THEN O.desc_op END) as R".($i+1)." ,";
                                    
                                }


        }
        $parte3=" from detalle_encuesta as DE inner join respuestas as R on DE.id_enc=R.id_enc
            inner join preguntas P on P.id_preg=R.id_preg INNER JOIN opciones as O on O.id_op=R.id_op where DE.id_form='".$id_enc."'
              GROUP BY id_enc) AS sq ";
              
        $query = $this->db->query($parte1.$parte2.$parte3);
        $fields = $query->field_data();

        return $fields;
    }
    public function  reporteEncuesta($id_enc){
        $parte2 =  " ";
        $parte1="SELECT * FROM (SELECT DE.id_enc,DE.nom_encuestado,DE.email_encuestado,DE.dni_encuestado,DE.id_encuestador , ";
        //llamo a las preguntas
         $preguntas = $this->db->select("*") # También puedes poner * si quieres seleccionar todo
        ->from("preguntas")
        ->where('id_form',$id_enc)
        ->get()
        ->result();
    
     
            for ($i=0; $i < count($preguntas) ; $i++) { 
               
                                if($i == count($preguntas) - 1){
                                    $parte2= $parte2." MAX(CASE WHEN P.desc_preg = '".$preguntas[$i]->desc_preg."' THEN P.desc_preg END) as P".($i+1)." ,
                                     MAX(CASE WHEN P.desc_preg = '".$preguntas[$i]->desc_preg."' THEN O.desc_op END) as R".($i+1)." ";
                                }else{
                                    $parte2= $parte2." MAX(CASE WHEN P.desc_preg = '".$preguntas[$i]->desc_preg."' THEN P.desc_preg END) as P".($i+1)." ,
                                                MAX(CASE WHEN  P.desc_preg = '".$preguntas[$i]->desc_preg."' THEN O.desc_op END) as R".($i+1)." ,";
                                    
                                }
                      
             
            }


        $parte3=" from detalle_encuesta as DE inner join respuestas as R on DE.id_enc=R.id_enc
            inner join preguntas P on P.id_preg=R.id_preg INNER JOIN opciones as O on O.id_op=R.id_op where DE.id_form='".$id_enc."'
              GROUP BY id_enc) AS sq ";

        // return $parte1.$parte2.$parte3;
        $query = $this->db->query($parte1.$parte2.$parte3);
        return $query->result();




    }


}