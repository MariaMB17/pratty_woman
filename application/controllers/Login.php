<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Login extends CI_Controller{
    public  function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->load->view("Login");
    }

    //logueamos usuarios con codeigniter y angularjs
    public function loginUser(){
        if($this->input->post("email") && $this->input->post("password"))
        {
            $this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
            if($this->form_validation->run() == false){
                echo json_encode(array("respuesta" => "incomplete_form"));
            }else{
                $this->load->model("login_model");
                $email = $this->input->post("email");
                $password = $this->input->post("password");
                $loginUser = $this->login_model->loginUser($email,$password);
                $emailUser = $this->login_model->emailUser($email);
                $claveUser = $this->login_model->passwordUser($password);
                if($loginUser === true){
                    echo json_encode(array("respuesta" => "success"));
                }elseif($emailUser=== true && $claveUser === false){
                    echo json_encode(array("respuesta" => "clave_incorrecta"));

                }elseif($emailUser=== false && $claveUser === true){
                    echo json_encode(array("respuesta" => "correo_incorrecto"));
                }else{
                    echo json_encode(array("respuesta" => "failed"));
                }
            }
        }else{
            echo json_encode(array("respuesta" => "incomplete_form"));
        }
    
    }
    
      public function registrarUser(){
        if($this->input->post("email") && $this->input->post("password"))
        {
            $this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
            if($this->form_validation->run() == false){
                echo json_encode(array("respuesta" => "incomplete_form"));
            }else{
                $this->load->model("login_model");
                $email = $this->input->post("email");
                $password = $this->input->post("password");
                $loginUser = $this->login_model->registerUser($email,$password);
                if($loginUser === true){
                    echo json_encode(array("respuesta" => "success"));
                }else{
                    echo json_encode(array("respuesta" => "Exists"));
                }
            }
        }else{
            echo json_encode(array("respuesta" => "incomplete_form"));
        }
    }

    public function logoutUser(){
        $this->session->sess_destroy();
    }

    public function prueba(){
        echo "esssssssss";
    }

  
}