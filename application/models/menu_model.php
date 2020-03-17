<?php
class Menu_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    
    public function menuUser($email){
       $this->db->select('email,descripcion,vinculo,nivel');
       $this->db->from('menu_usuarios');
       $this->db->where('email', $email);
       $consulta = $this->db->get();
       $resultado = $consulta->result();
       $contador=count($resultado);
       if($contador > 0){
         return $resultado;
       }else{
         return 1;
       }
    }
    
}