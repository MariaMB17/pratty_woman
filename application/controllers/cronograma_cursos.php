<?php


class Cronograma_Cursos extends CI_Controller{
    public  function __construct(){
        parent::__construct();
    }
    // public function index(){
    //     $this->load->view("estudiantes");
    // }


   public function cursos_cronograma($curso_id){
     $codigo_cursos=$curso_id;
     $this->load->model("cronograma_cursos_model");
     $cronograma = $this->cronograma_cursos_model->cronogramaCursos($codigo_cursos);
        if($cronograma != 1){
         $listado_cronograma = json_encode($cronograma);
         echo  $listado_cronograma;
      }else{
         $listado_cronograma = array("data" =>$cronograma);
         echo json_encode($listado_cronograma);
      }
     
    } 

    public function cursos_cronograma_horas($curso_id,$fecha,$codigo_servicio){
     $codigo_cursos=$curso_id;

     $this->load->model("cronograma_cursos_model");
     $cronograma_horas = $this->cronograma_cursos_model->cronogramaHoras($codigo_cursos,$fecha,$codigo_servicio);
        if($cronograma_horas != 1){
         $listado_cronograma_horas = json_encode($cronograma_horas);
         echo  $listado_cronograma_horas;
      }else{
         $listado_cronograma_horas = array("data" =>$cronograma_horas);
         echo json_encode($listado_cronograma_horas);
      }
     
    } 
}
