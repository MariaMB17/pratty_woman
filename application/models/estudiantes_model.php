<?php
class Estudiantes_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }    
    
    public function estudiante_ci($cedula){
       $this->db->select('*');
       $this->db->from('estudiantes');
       $this->db->where('cedula',$cedula);
       $estudiante=$this->db->get();
       $estudianteCI=$estudiante->result();
       $contador=count($estudianteCI);
          if($contador > 0){
            return $estudianteCI;
          }else{
            return 1;
          }
    }
    
    public function guardarEstudiante($cedula,$apellidos,$nombres,$telefono,$direccion,$correo){
      $data = array(
            "cedula" => $cedula,
            "apellidos"=>$apellidos,
            "nombres"=>$nombres,
            "telefono"=>$telefono,
            "direccion"=>$direccion,
            "correo"=>$correo
      );    
      $this->db->where("cedula",$cedula);
      $check_exists = $this->db->get("estudiantes");
      if($check_exists->num_rows() == 0){
        $this->db->insert("estudiantes", $data);
        return true;
      }else{
        $this->db->where("cedula = $cedula");
        $this->db->update("estudiantes", $data);
        return 1;
      }      
    }

    
    public function bancos(){
      $this->db->select('id_banco,descripcion');
      $this->db->from('bancos');
      $bancos = $this->db->get();
      $resultado = $bancos->result();
      $contador=count($resultado);
        if($contador > 0){
         return $resultado;
       }else{
         return 1;
       }
    } 
    
}