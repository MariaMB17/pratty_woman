<?php
class Cronograma_Cursos_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    
    public function cronogramaCursos($curso_id){
       $this->db->select('DISTINCT(`fecha_inicio`),`id_cursos_servicios`');
       $this->db->from('cronograma_cursos');
       $this->db->where("fecha_inicio >= curdate()");
       $this->db->where("id_cursos_servicios",$curso_id);
       // $this->db->where("fecha_inicio >= curdate() and `hora_inicio` > curTime() and `status`=1 
       //                   and disponibilidad > 0 and id_cursos_servicios=$curso_id");
       $consulta = $this->db->get();
       $resultado = $consulta->result();
       $contador=count($resultado);
       if($contador > 0){
         return $resultado;
       }else{
         return 1;
       }
    }
    public function cronogramaHoras($curso_id,$fecha_inicio,$codigo_servicio){
      if($codigo_servicio==1){
        $this->db->select('cronograma_cursos.id as codigo,cronograma_cursos.id_bloque_horas,bloque_horas.hora_inicio,
                          cronograma_cursos.disponibilidad');
        $this->db->from('cronograma_cursos');
        $this->db->join('bloque_horas', 'cronograma_cursos.id_bloque_horas=bloque_horas.id_bloque');
        $this->db->where("cronograma_cursos.id_cursos_servicios",$curso_id);
        $this->db->where("cronograma_cursos.fecha_inicio",$fecha_inicio);
      }else{
        $this->db->select('cronograma_cursos.id as codigo,cronograma_cursos.id_bloque_horas,bloque_horas.hora_inicio,
                          cronograma_cursos.disponibilidad');
        $this->db->from('cronograma_cursos');
        $this->db->join('bloque_horas', 'cronograma_cursos.id_bloque_horas=bloque_horas.id_bloque');
        $this->db->where("cronograma_cursos.id_cursos_servicios",$curso_id);
      }       
       $consulta = $this->db->get();
       $resultado = $consulta->result();
       $contador=count($resultado);
       if($contador > 0){
         return $resultado;
       }else{
         return 1;
       }
    }

    public function ModificarDisponibilidad ($id_cronograma,$disponibilidad) {
      $data = array(
        "disponibilidad"=>$disponibilidad
        );
      $this->db->where('id',$id_cronograma)->update('cronograma_cursos', $data);
      $this->db->affected_rows(); // this should return 1 now

    }
    
}