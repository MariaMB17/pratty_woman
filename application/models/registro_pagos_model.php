<?php
class Registro_Pagos_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }


    public function guadarRegistros_pagos($id_bancos,$n_referencia,$descripcion,$id_detalles,$pago_monto,$fecha_pago,$costo,$total){
    	$data=array(
    		"id_bancos"=>$id_bancos,
    		"n_referencia"=>$n_referencia,
    		"descripcion"=>$descripcion,
    		"id_cursos_detalles"=>$id_detalles,
    		"monto"=>$pago_monto,
    		"fecha"=>$fecha_pago        
    	);

       $this->db->select('sum(monto) as pago,id_registros_pagos, id_bancos, n_referencia, descripcion, id_cursos_detalles, monto, fecha');
       $this->db->from('registros_pagos');
       $this->db->where('id_cursos_detalles',$id_detalles);
       $consulta = $this->db->get();
       $resultado = $consulta->result();
        if($resultado[0]->pago != null){   
            if($resultado[0]->pago <=$total){
              $this->db->insert("registros_pagos", $data);
            }             
            return 1;               	    
        }else{
           $this->db->insert("registros_pagos", $data);
          return 2;
        }     
    }
    
    
      
}