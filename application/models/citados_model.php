<?php
class Citados_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }    
    
  
    
    public function guardarCitados($id_curso_servicio,$id_estudiante,$fecha_citado){
      $data = array(
            "id_cursos_servicios" => $id_curso_servicio,
            "id_estudiantes"=>$id_estudiante,
            "fecha_cita"=>$fecha_citado
      ); 
      $this->db->where('id_cursos_servicios',$id_curso_servicio);
      $this->db->where('id_estudiantes',$id_estudiante); 
      $this->db->where('fecha_cita',$fecha_citado); 
      $check_exists = $this->db->get("citados");   
      
      if($check_exists->num_rows() == 0){
            $this->db->insert("citados", $data);
            return 1;
        }else{
          return 0;
        }
          
    }

    
    
}