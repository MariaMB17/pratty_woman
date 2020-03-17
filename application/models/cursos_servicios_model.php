<?php
class Cursos_Servicios_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    
    public function listado_Cursos_servicios(){
      $this->db->select('cursos_servicios.id as id,cursos_servicios.descripcion as descripcion, 
                         cursos_servicios.codigo,cursos_servicios.precio as precio, 
                         cursos_servicios.status');
      $this->db->from('cursos_servicios');
      $this->db->join('cronograma_cursos', 'cursos_servicios.id=cronograma_cursos.id_cursos_servicios');
      $this->db->where('cronograma_cursos.disponibilidad > 0');
      $this->db->where('cronograma_cursos.fecha_inicio >= curdate()');
      $this->db->group_by('cursos_servicios.id'); 
      $cursos_servicios = $this->db->get();
      $resultado = $cursos_servicios->result();
      $contador=count($resultado);
       if($contador > 0){
         return $resultado;
       }else{
         return 1;
       }
    }
    
    public function listado_servicios(){
      
    }
    public function listado_cursos ($cedula) {
      $this->db->select('cursos_cabecera.cedula as cedula,cursos_detalles.id_detalles as id_detalles,cursos_Cabecera.id as numero,cursos_servicios.id as id_c,
                         cursos_servicios.descripcion as descripcion,cronograma_cursos.id as id_cr,cronograma_cursos.fecha_inicio as fecha_del_curso,
                         bloque_horas.hora_inicio as hora_inicio,cursos_detalles.precio as costo,sum(registros_pagos.monto) as Abono,
                         (cursos_detalles.precio - sum(registros_pagos.monto)) as Faltante,cursos_servicios.codigo as codigo_curso_servicio,
                         cursos_detalles.id_cronograma as id_cronograma');
      $this->db->from('registros_pagos');
      $this->db->join('cursos_detalles', 'registros_pagos.id_cursos_detalles=cursos_detalles.id_detalles');
      $this->db->join('cursos_cabecera', 'cursos_detalles.id_cursos_cabecera=cursos_cabecera.id');
      $this->db->join('cursos_servicios', 'cursos_detalles.id_cursos_servicios = cursos_servicios.id');
      $this->db->join('cronograma_cursos', 'cursos_detalles.id_cronograma=cronograma_cursos.id');
      $this->db->join('bloque_horas','cronograma_cursos.id_bloque_horas=bloque_horas.id_bloque');
      $this->db->where('cursos_cabecera.cedula',$cedula);
      $this->db->group_by('cursos_detalles.id_detalles');
      $cursos_servicios = $this->db->get();
      $resultado = $cursos_servicios->result();
      $contador = count($resultado);
      if($contador > 0){
        return $resultado;

      }else{
        return 1;
      }

    }

    public function listado_cursos_id ($cedula,$id_cabecera) {
    $this->db->select('cursos_cabecera.cedula as cedula,cursos_detalles.id_detalles as id_detalles,cursos_cabecera.id as numero,cursos_servicios.id as id_c,
                        cursos_servicios.descripcion as descripcion,cronograma_cursos.id as id_cr,cronograma_cursos.fecha_inicio as fecha_del_curso,
                        bloque_horas.hora_inicio as hora_inicio,cursos_detalles.precio as costo,sum(registros_pagos.monto) as Abono,
                        (cursos_detalles.precio - sum(registros_pagos.monto)) as Faltante,cursos_servicios.codigo as codigo_curso_servicio');
    $this->db->from('registros_pagos');
    $this->db->join('cursos_detalles', 'registros_pagos.id_cursos_detalles=cursos_detalles.id_detalles');
    $this->db->join('cursos_cabecera', 'cursos_detalles.id_cursos_cabecera=cursos_cabecera.id');
    $this->db->join('cursos_servicios', 'cursos_detalles.id_cursos_servicios = cursos_servicios.id');
    $this->db->join('cronograma_cursos', 'cursos_detalles.id_cronograma=cronograma_cursos.id');
    $this->db->join('bloque_horas','cronograma_cursos.id_bloque_horas=bloque_horas.id_bloque');
    $this->db->where('cursos_cabecera.cedula',$cedula);
    $this->db->where('cursos_cabecera.id',$id_cabecera);
    $this->db->group_by('cursos_detalles.id_detalles');
    $cursos_servicios = $this->db->get();
    $resultado = $cursos_servicios->result();
    $contador = count($resultado);
    if($contador > 0){
      return $resultado;

    }else{
      return 1;
    }

  }
      
}