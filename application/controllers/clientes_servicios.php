<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Estudiantes extends CI_Controller{
    public  function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->load->view("Estudiantes");
    }

  public function estudianteCI($cedula){
     $this->load->model("estudiantes_model");
     $estudiante_CI = $this->estudiantes_model->estudiante_ci($cedula);
       if($estudiante_CI != 1){
          $estudiante = json_encode($estudiante_CI);
          echo $estudiante;
       }else{
          echo json_encode(array("respuesta" =>$estudiante_CI));
       }
  }

  public function listado_bancos(){
    $this->load->model("estudiantes_model");
    $listadoBco = $this->estudiantes_model->bancos();
     if($listadoBco != 1){
        $listado_bancos = json_encode($listadoBco);
        echo  $listado_bancos;
     }else{
        echo json_encode(array("data" =>$listadoBco));
     }
  }
  
  public function update(){
    $cedula = $this->input->post("cedula");    
    $apellidos = $this->input->post("apellidos");
    $nombres = $this->input->post("nombres");
    $telefono = $this->input->post("telefono");
    $direccion = $this->input->post("direccion");
    $correo = $this->input->post("email");
    if($cedula !=null && 
       $apellidos !=null && 
       $nombres !=null && 
       $telefono !=null && 
       $direccion !=null &&
       $correo !=null ){
          $this->form_validation->set_rules('cedula', 'cedula', 'trim|required|min_length[6]|xss_clean');
          $this->form_validation->set_message('required', 'Debe completar este campo');
          $this->form_validation->set_rules('apellidos','apellidos','trim|required|max_length[200]|xss_clean');
          $this->form_validation->set_message('required', 'Debe completar este campo');
          $this->form_validation->set_rules('nombres','nombres','trim|required|max_length[200]|xss_clean');
          $this->form_validation->set_message('required', 'Debe completar este campo');
          $this->form_validation->set_rules('telefono','telefono','trim|required|is_natural|max_length[11]|xss_clean');
          $this->form_validation->set_message('required', 'Debe completar este campo');
          $this->form_validation->set_rules('direccion','direccion','trim|required|max_length[300]|xss_clean');  
          $this->form_validation->set_message('required', 'Debe completar este campo');        
          $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[150]|xss_clean');
          $this->form_validation->set_message('required', 'Debe completar este campo');         
          if($this->form_validation->run() == false){             
             echo json_encode(array("respuesta" => "2"));
          }else{ 
            $this->load->model("estudiantes_model");          
            $insertarEstudiante = $this->estudiantes_model->guardarEstudiante($cedula,$apellidos,$nombres,$telefono,$direccion,$correo);

            echo json_encode(array('respuesta' =>$insertarEstudiante));
          }
      }
  }
  
  public function guardarStudent (){  

    $cedula = $this->input->post("cedula");    
    $apellidos = $this->input->post("apellidos");
    $nombres = $this->input->post("nombres");
    $telefono = $this->input->post("telefono");
    $direccion = $this->input->post("direccion");
    $correo = $this->input->post("email");
    /*$curso = substr($this->input->post("cursos"),0,1);
    $costo = $this->input->post("costo");
    $fecha = substr($this->input->post("fecha"),0,1);
    $disponibilidad = $this->input->post("disponible");
    $condicion_pago = $this->input->post("condicion_pago");
    $bancos = $this->input->post("bancos");
    $transaccion = $this->input->post("transaccion");
    $numero = $this->input->post("numero");
    $pago_monto = $this->input->post("monto");
    $fecha_pago = substr($this->input->post("fecha_pago"),0,10); 
    $fecha_factura = date("Y-m-d");   
    $id_cronograma = $fecha;  */  
    echo $fecha_factura;
    if($cedula !=null && 
       $apellidos !=null && 
       $nombres !=null && 
       $telefono !=null && 
       $direccion !=null &&
       $correo !=null && 
       /*$curso !=null && 
       $costo !=null &&
       $fecha !=null && 
       $disponibilidad !=null &&
       $condicion_pago !=null && 
       $bancos !=null && 
       $transaccion !=null && 
       $numero !=null &&
       $pago_monto !=null && 
       $fecha_pago !=null)*/{
          $this->form_validation->set_rules('cedula', 'cedula', 'trim|required|min_length[6]|xss_clean');
          $this->form_validation->set_message('required', 'Debe completar este campo');
          $this->form_validation->set_rules('apellidos','apellidos','trim|required|max_length[200]|xss_clean');
          $this->form_validation->set_message('required', 'Debe completar este campo');
          $this->form_validation->set_rules('nombres','nombres','trim|required|max_length[200]|xss_clean');
          $this->form_validation->set_message('required', 'Debe completar este campo');
          $this->form_validation->set_rules('telefono','telefono','trim|required|is_natural|max_length[11]|xss_clean');
          $this->form_validation->set_message('required', 'Debe completar este campo');
          $this->form_validation->set_rules('direccion','direccion','trim|required|max_length[300]|xss_clean');  
          $this->form_validation->set_message('required', 'Debe completar este campo');        
          $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[150]|xss_clean');
          $this->form_validation->set_message('required', 'Debe completar este campo');
          /*$this->form_validation->set_rules('cursos','cursos','trim|required|xss_clean');
          $this->form_validation->set_message('required', 'Debe completar este campo');
          $this->form_validation->set_rules('costo','costo','trim|required|decimal|xss_clean');
          $this->form_validation->set_message('required', 'Debe completar este campo');
          $this->form_validation->set_rules('fecha','fecha','trim|required|integer|max_length[3]|xss_clean');
          $this->form_validation->set_message('required', 'Debe completar este campo');
          $this->form_validation->set_rules('disponible','disponible','trim|required|integer|max_length[2]|xss_clean');
          $this->form_validation->set_message('required', 'Debe completar este campo');
          $this->form_validation->set_rules('condicion_pago','condicion_pago','trim|required|xss_clean');
          $this->form_validation->set_message('required', 'Debe completar este campo');
          $this->form_validation->set_rules('bancos','bancos','trim|required|integer|max_length[3]|xss_clean');
          $this->form_validation->set_message('required', 'Debe completar este campo');
          $this->form_validation->set_rules('transaccion','transaccion','trim|required|max_length[100]|xss_clean');
          $this->form_validation->set_message('required', 'Debe completar este campo');
          $this->form_validation->set_rules('numero','numero','trim|required|integer|max_length[30]|xss_clean');
          $this->form_validation->set_message('required', 'Debe completar este campo');
          $this->form_validation->set_rules('monto','monto','trim|required|xss_clean');
          $this->form_validation->set_message('required', 'Debe completar este campo');          
          $this->form_validation->set_rules('fecha_pago','fecha_pago','trim|required|xss_clean');
          $this->form_validation->set_message('required', 'Debe completar este campo');*/
          
         
          if($this->form_validation->run() == false){             
             echo json_encode(array("respuesta" => "Formulario_incompleto"));
          }else{            
            $this->load->model("estudiantes_model");            
            $insertarEstudiante = $this->estudiantes_model->guardarEstudiante($cedula,$apellidos,$nombres,$telefono,$direccion,$correo);        }   
     } else {
      echo json_encode(array("respuesta" => "incomplete_form"));
    }
  }
  
  



}
