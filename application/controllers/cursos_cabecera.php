<?php


class Cursos_Cabecera extends CI_Controller{
    public  function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->load->view("estudiantes");
    }

    private $lista = array(
    array('id' => 1, 'nombre' => 'Guitarra', 'descripcion' => 'Instrumento de cuerda.'),
    array('id' => 2, 'nombre' => 'Bajo', 'descripcion' => 'Instrumento de cuerda.'),
    array('id' => 3, 'nombre' => 'Batería', 'descripcion' => 'Instrumento de percusión.'),
   );


public function ver_lista(){
  $listado = json_encode($this->lista);
  echo $listado;
}
 
 public function buscarCabecera ($cedula,$fecha,$status){
    $this->load->model("cursos_cabecera_model");
    $buscarCurso_cabecera = $this->cursos_cabecera_model->buscarCursos_cabecera($cedula,$fecha,$status);
      if($buscarCurso_cabecera != 1){
          print_r($buscarCurso_cabecera);
    }else{
      echo $buscarCurso_cabecera;
    }
 }

 public function buscar_ci ($cedula) {
   $this->load->model("cursos_cabecera_model");
   $buscar_recibo_cedula = $this->cursos_cabecera_model->buscar_porCI ($cedula);
   if($buscar_recibo_cedula != 1){
      echo $buscar_recibo_cedula;
   }else{
     echo 0;
   }


 }

}
