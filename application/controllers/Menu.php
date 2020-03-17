<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: Israel
 * Date: 3/07/13
 * Time: 15:15
 * To change this template use File | Settings | File Templates.
 */
class Menu extends CI_Controller{
    public  function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->load->view("Menu");
    }

    public function menuUser($email){
        $this->load->model('menu_model');
        $informe = $this->menu_model->menuUser($email);
          if($informe != 1){
            $menuUsuario=json_encode($informe);  
            echo $menuUsuario;
           }else{
             echo json_encode(array("data" => "success"));
          }
        
        
    }

    public function prueba(){
      echo "dfdfas";
    }
  
}