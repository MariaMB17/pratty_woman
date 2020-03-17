<?php
class Login_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function loginUser($email,$password){
        $this->db->where("email", $email);
        $this->db->where("password", $password);
        $query = $this->db->get("users");
        if($query->num_rows() == 1){
            return true;
        }else{
            return false;
        }
    }

    public function emailUser($email){
        $this->db->where("email", $email);
        $query = $this->db->get("users");
        if($query->num_rows() == 1){
            return true;
        }else{
            return false;
        }
    }

    public function passwordUser($password){
        $this->db->where("password", $password);
        $query = $this->db->get("users");
        if($query->num_rows() == 1){
            return true;
        }else{
            return false;
        }
    }
    
    public function registerUser($email,$password){
        $data = array(
            "email" => $email,
            "password"=>$password
        );
        $this->db->where("email",$email);
        $check_exists = $this->db->get("users");
        if($check_exists->num_rows() == 0){
            $this->db->insert("users", $data);
            return true;
        }else{
            return false;
        }
    }

    public function menuUser($email){
       $this->db->select('email,descripcion,vinculo,nivel');
       $this->db->from('menu_users');
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