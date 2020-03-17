<?php
class Cursos_Detalles_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    
    public function buscarDetalles ($id_cursos_cabecera,$id_cursos_servicios) {
       $this->db->select('*');
       $this->db->from('cursos_detalles');
       $this->db->where('id_cursos_cabecera',$id_cursos_cabecera);
       $this->db->where('id_cursos_servicios',$id_cursos_servicios);
       $consulta = $this->db->get();
       $resultado = $consulta->result();
       $contador=count($resultado);
       if($contador > 0){
         return $resultado;
       }else{
         return 1;
       }

    }

    public function buscarDetalles_id ($id_detalles) {
       $this->db->select('*');
       $this->db->from('cursos_detalles');
       $this->db->where('id_detalles',$id_detalles);
       $this->db->where('status_pago','Abonar');
       $consulta = $this->db->get();
       $resultado = $consulta->result();
       $contador=count($resultado);
       if($contador > 0){
         return $resultado;
       }else{
         return 1;
       }

    }
    
     public function crearId (){
       $this->db->select('id_detalles, count(*) as numero');
       $this->db->from('cursos_detalles');
       $this->db->order_by('id_detalles','desc');
       $this->db->limit(1); 
       $consulta = $this->db->get();
       $resultado = $consulta->result();
       return $resultado;

    }

    public function guadarCursos_detalles($id_detalles,$id_cursos_cabecera,$id_cursos_servicios,$id_cronograma,$precio,$status_pago){
    	$data=array(
        "id_detalles"=>$id_detalles,
    		"id_cursos_cabecera"=>$id_cursos_cabecera,
    		"id_cursos_servicios"=>$id_cursos_servicios,
    		"id_cronograma"=>$id_cronograma,
    		"precio"=>$precio,
    		"status_pago"=>$status_pago         
    	);

    	  $this->db->where('id_cursos_cabecera',$id_cursos_cabecera);
        $this->db->where('id_cursos_servicios',$id_cursos_servicios);
    	  $check_exists = $this->db->get("cursos_detalles");
        if($check_exists->num_rows() == 0){
            $this->db->insert("cursos_detalles", $data);
            return true;
        }else{
          return false;
        }
    }
    
    public function modifcar_detalles($id_detalles,$id_cursos,$id_cursos_1,$id_cronograma,$costo_1,$condicion_pago,$valido){
      $data=array(
        "id_cursos_servicios"=>$id_cursos_1,
        "id_cronograma"=>$id_cronograma,
        "precio"=>$costo_1,
        "status_pago"=>$condicion_pago         
      );
      $data1=array(
        "id_cursos_servicios"=>$id_cursos,
        "status_pago"=>$condicion_pago         
      );
      if($valido == 1 ){
        $this->db->where('id_detalles',$id_detalles);
        $this->db->update("cursos_detalles", $data1);
      }else {
        $this->db->where('id_detalles',$id_detalles);
        $this->db->where('id_cursos_servicios',$id_cursos);
        $this->db->update("cursos_detalles", $data);

      }
    }
   
      
}