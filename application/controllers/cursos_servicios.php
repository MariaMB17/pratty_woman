<?php


class Cursos_Servicios extends CI_Controller{
    public  function __construct(){
        parent::__construct();
    }
    // public function index(){
    //     $this->load->view("estudiantes");
    // }

   
    public function services_cursos(){
         $this->load->model("cursos_servicios_model");
         $listadoCS = $this->cursos_servicios_model->listado_Cursos_servicios();
         if($listadoCS != 1){
            $listado_services = json_encode($listadoCS);
            echo  $listado_services;
         }else{
            echo json_encode(array("data" =>$listadoCS));
         }     
    } 

    public function listado_estudiantes ($cedula){
        $this->load->model("cursos_servicios_model");
        $listado = $this->cursos_servicios_model->listado_cursos($cedula);
            if($listado != 1){
                $listado_estudiante_c = json_encode($listado);
                echo  $listado_estudiante_c;
            }else{
                echo json_encode(array("respuesta" =>$listado));
            }
    }
}
