<?php
class Cursos_Cabecera_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }


    public function guadarCursos_cabecera($id,$cedula,$fecha_factura,$total,$estado){
      
    	$data=array(
    		"id"=>$id,
    		"cedula"=>$cedula,
    		"fecha"=>$fecha_factura,
    		"total"=>$total,
    		"status"=>$estado         
    	);
    	$this->db->where('cedula',$cedula);
      $this->db->where('fecha',$fecha_factura);  
    	$check_exists = $this->db->get("cursos_cabecera");
        if($check_exists->num_rows() == 0){
            $this->db->insert("cursos_cabecera", $data);
            return 1;
        }else if($check_exists->num_rows() > 0){
        	$this->db->where('cedula',$cedula);
          $this->db->where('fecha',$fecha_factura);
          $this->db->update("cursos_cabecera", $data);
          return 2;
        }else{
          return 3;
        }
        
    }

    public function modificarCursos_cabecera($id,$total,$estado){
      
      $data=array(
        "total"=>$total,
        "status"=>$estado         
      );      
      $this->db->where('id',$id);
      $this->db->update("cursos_cabecera", $data);
      return 2;
    }

    public function crearId (){
       $this->db->select('id, count(*) as numero');
       $this->db->from('cursos_cabecera');
       $this->db->order_by('id','desc');
       $this->db->limit(1); 
       $consulta = $this->db->get();
       $resultado = $consulta->result();
       return $resultado;
    }

    public function buscarCursos_cabecera($cedula,$fecha){ 
       $this->db->select('*');
       $this->db->from('cursos_cabecera');
       $this->db->where('cedula',$cedula);
       $this->db->where('fecha',$fecha);
       $consulta = $this->db->get();
       $resultado = $consulta->result();
       $contador=count($resultado);
       if($contador > 0){                 
         return $resultado;
       }else{
         return 1;
       }
    }

    public function buscarCursos_cabecera_id($id_cabecera,$cedula){ 
       $this->db->select('*');
       $this->db->from('cursos_cabecera');
       $this->db->where('cedula',$cedula);
       $this->db->where('id',$id_cabecera);
       $consulta = $this->db->get();
       $resultado = $consulta->result();
       $contador=count($resultado);
       if($contador > 0){                 
         return $resultado;
       }else{
         return 1;
       }
    }

    public function buscar_porCI ($cedula) {
      $this->db->select('*');
      $this->db->from('cursos_cabecera');
      $this->db->join('estudiantes', 'cursos_cabecera.cedula=estudiantes.cedula');
      $this->db->where('cursos_cabecera.cedula',$cedula);
      $recibos = $this->db->get();
      $resultado = $recibos->result();
      $contador = count($resultado);
       if($contador > 0){
        return json_encode($resultado);

      }else{
        return 1;
      }

    }
    

      
}