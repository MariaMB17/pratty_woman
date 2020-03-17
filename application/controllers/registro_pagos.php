<?php


class Registro_Pagos extends CI_Controller{
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
 

}
