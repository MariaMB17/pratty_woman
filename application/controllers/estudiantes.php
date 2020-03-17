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
    /* cursos ==1  y  servicios==2*/

    $cedula = $this->input->post("cedula"); 
    $apellidos = $this->input->post("apellidos");
    $nombres = $this->input->post("nombres");
    $telefono = $this->input->post("telefono");
    $direccion = $this->input->post("direccion");
    $correo = $this->input->post("email");  
    $curso_servicio = substr($this->input->post("cursos"),0,5);
    $costo = $this->input->post("costo");
    $disponibilidad = $this->input->post("disponible");
    $condicion_pago = $this->input->post("condicion_pago");
    $bancos = $this->input->post("bancos");
    $transaccion = $this->input->post("transaccion");
    $numero = $this->input->post("numero");
    $pago_monto = $this->input->post("monto");
    $fecha_pago = substr($this->input->post("fecha_pago"),0,10); 
    $fecha_curso = $this->input->post("fecha");  
    $codigo_servicio = $this->input->post("servicios");
    $fecha_servicio = $this->input->post("fecha_servicio");
    $id_cronograma = $this->input->post("id_cronograma");
    $fecha_factura = date("Y-m-d");

    if($codigo_servicio==1){
     $fecha_citado=$fecha_curso;
    }else{
      $fecha_citado=$fecha_servicio;
    }
    
    if($cedula !=null && 
       $apellidos !=null && 
       $nombres !=null && 
       $telefono !=null && 
       $direccion !=null &&
       $correo !=null && 
       $curso_servicio !=null && 
       $costo !=null &&
       $fecha_citado !=null && 
       $disponibilidad !=null &&
       $condicion_pago !=null && 
       $bancos !=null && 
       $transaccion !=null && 
       $numero !=null &&
       $pago_monto !=null && 
       $fecha_pago !=null){
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
          $this->form_validation->set_rules('cursos','cursos','trim|required|xss_clean');
          $this->form_validation->set_message('required', 'Debe completar este campo');
          $this->form_validation->set_rules('costo','costo','trim|required|decimal|xss_clean');
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
          $this->form_validation->set_message('required', 'Debe completar este campo');
          
           if($this->form_validation->run() == false){ 
              echo json_encode(array("respuesta" => "Formulario_incompleto"));
           }else{

            $this->load->model("estudiantes_model");
            $this->load->model("cursos_cabecera_model");
            $this->load->model("cursos_detalles_model");
            $this->load->model("cronograma_cursos_model");
            $this->load->model("registro_pagos_model");  
            $this->load->model("citados_model");        
            
            $insertarEstudiante = $this->estudiantes_model->guardarEstudiante($cedula,$apellidos,$nombres,$telefono,$direccion,$correo);
            
            $buscarCurso_cabecera = $this->cursos_cabecera_model->buscarCursos_cabecera($cedula,$fecha_factura);
            $status = $condicion_pago;
            $total=0;
             if ($buscarCurso_cabecera != 1) {
                $id = $buscarCurso_cabecera[0]->id;
                $cedula = $buscarCurso_cabecera[0]->cedula;
                $fecha = $buscarCurso_cabecera[0]->fecha;
                if($buscarCurso_cabecera[0]->status == "Abonar" && $status == "Abonar"){
                    $estado = "Abonar";
                  }elseif($buscarCurso_cabecera[0]->status == "Abonar" && $status == "Pago Total"){
                    $estado = "Abonar";
                  }elseif($buscarCurso_cabecera[0]->status == "Pago Total" && $status == "Abonar"){
                    $estado = "Abonar";
                  }else{
                    $estado=$status;
                  }
                  $buscar_detalle = $this->cursos_detalles_model->buscarDetalles ($id,$curso_servicio);
                    if($buscar_detalle != 1){
                       $total = $buscarCurso_cabecera[0]->total;
                       $guardarDetalle = 1;
                    }else{
                       $total = $buscarCurso_cabecera[0]->total + $costo; 
                       $guardarDetalle = 2;
                    }
             }else{
              $total = $costo;
              $estado=$status;
              $idCabecera_c = $this->cursos_cabecera_model->crearId();
              $id = $idCabecera_c[0]->numero + 1; 
              $guardarDetalle = 3; 
             }

             $id_cabecera = $id; 

            $guardarCabecera = $this->cursos_cabecera_model->guadarCursos_cabecera($id,$cedula,$fecha_factura,$total,$estado);

            if($guardarDetalle > 1){
              $idDetalles = $this->cursos_detalles_model->crearId();
              $id_detalles = $idDetalles[0]->numero+1;
              $guardarCursos_Detalles = $this->cursos_detalles_model->guadarCursos_detalles($id_detalles,$id_cabecera,$curso_servicio,$id_cronograma,$costo,$status);
              $disponibilidad = $disponibilidad - 1;
              $modificarDisponibilidad_cursos = $this->cronograma_cursos_model->ModificarDisponibilidad($id_cronograma,$disponibilidad);
              $guardarPagos = $this->registro_pagos_model->guadarRegistros_pagos($bancos,$numero,$transaccion,
                                                                               $id_detalles,$pago_monto,$fecha_pago,$costo,$total);
             $estudiante_CI = $this->estudiantes_model->estudiante_ci($cedula);
             $id_estudiante = $estudiante_CI[0]->id;    
             $insertar_citados = $this->citados_model->guardarCitados($curso_servicio,$id_estudiante,$fecha_citado);


            echo json_encode(array("respuesta" => "success"));
            }else{
            echo json_encode(array("respuesta" => "existe"));
            }               
          } /*FIN DE FORM_VALIDATION*/
      
    }else {
       echo json_encode(array("respuesta" => "incomplete_form"));
    }
  }
  
  public function modificar_cursos_estudiante () {


    $cedula = $this->input->post("cedula");
    $id_cabecera = $this->input->post("numero_curso"); 
    $curso = $this->input->post("curso");
    $costo = $this->input->post("costo");  
    $curso_cambiar = $this->input->post("cambiar_curso");  
    $servicio_cambiar = $this->input->post("cambiar_servicio");
    $curso_1 =0;
    $fecha = date("Y-m-d");
    $costo_1 =0;
    if($curso_cambiar!=null){
      $curso_1 = substr($curso_cambiar,0,5);
      $fecha = $this->input->post("fecha_curso");
      $costo_1 = $this->input->post("costo_1"); 
    }else if($servicio_cambiar!=null){
      $curso_1=substr($servicio_cambiar,0,5);
      $fecha= $this->input->post("fecha_servicio");
      $costo_1 = $this->input->post("costo_1"); 
    }

      
    $disponibilidad = $this->input->post("disponible");
    $condicion_pago = $this->input->post("condicion_pago");
    $bancos = $this->input->post("bancos");
    $transaccion = $this->input->post("transaccion");
    $numero = $this->input->post("numero_transaccion");
    $pago_monto = $this->input->post("monto");
    $fecha_pago = substr($this->input->post("fecha_pago"),0,10);
    $id_curso = $this->input->post("id_curso");
    $abono = $this->input->post("abono");
    $id_detalles = $this->input->post("id_detalles");
    $id_cronograma = $this->input->post("id_cronograma");
    



     echo $servicio_cambiar.'----'.$curso_cambiar.'--'.$cedula.'---'.$id_cabecera.'--'.$curso.'--'. $costo.'--'. $curso_1.'--';
     echo $costo_1.'--'. $fecha.'--'. $disponibilidad.'--'. $condicion_pago.'--'.$bancos.'--'.$transaccion.'--';      
     echo $numero.'--'. $pago_monto.'--'. $fecha_pago.'--'.$id_curso.'--'. $abono .'--'. $id_detalles.'--'.$id_cronograma;  

 
         
     if($cedula != null && $id_cabecera !=null &&
       $curso != null && $costo !=null && $curso_1 ==0 &&
       $costo_1 ==0 && $fecha !=null && $disponibilidad ==!null &&
       $condicion_pago != null && $bancos != null &&  $transaccion !=null &&
       $numero !=null && $pago_monto !=null && $fecha_pago !=null && 
       $id_curso !=null && $abono != null && $id_detalles != null){

       $this->form_validation->set_rules('cedula', 'cedula', 'trim|required|min_length[6]|xss_clean');
       $this->form_validation->set_message('required', 'Debe completar este campo');
       $this->form_validation->set_rules('curso','cursos','trim|required|xss_clean');
       $this->form_validation->set_message('required', 'Debe completar este campo');
       $this->form_validation->set_rules('costo','costo','trim|required|decimal|xss_clean');
       $this->form_validation->set_message('required', 'Debe completar este campo');      
       $this->form_validation->set_rules('condicion_pago','condicion_pago','trim|required|xss_clean');
       $this->form_validation->set_message('required', 'Debe completar este campo');
       $this->form_validation->set_rules('bancos','bancos','trim|required|integer|max_length[3]|xss_clean');
       $this->form_validation->set_message('required', 'Debe completar este campo');
       $this->form_validation->set_rules('transaccion','transaccion','trim|required|max_length[100]|xss_clean');
       $this->form_validation->set_message('required', 'Debe completar este campo');
       $this->form_validation->set_rules('numero_transaccion','numero','trim|required|integer|max_length[30]|xss_clean');
       $this->form_validation->set_message('required', 'Debe completar este campo');
       $this->form_validation->set_rules('monto','monto','trim|required|xss_clean');
       $this->form_validation->set_message('required', 'Debe completar este campo');          
       $this->form_validation->set_rules('fecha_pago','fecha_pago','trim|required|xss_clean');
       $this->form_validation->set_message('required', 'Debe completar este campo');

        if($this->form_validation->run() == false){             
          echo json_encode(array("respuesta" => "Formulario_incompleto"));
        }else{
          $valido = 1;
        }
    }else {
       $this->form_validation->set_rules('cedula', 'cedula', 'trim|required|min_length[6]|xss_clean');
       $this->form_validation->set_message('required', 'Debe completar este campo');
       $this->form_validation->set_rules('curso','cursos','trim|required|xss_clean');
       $this->form_validation->set_message('required', 'Debe completar este campo');
       $this->form_validation->set_rules('costo','costo','trim|required|decimal|xss_clean');
       $this->form_validation->set_message('required', 'Debe completar este campo');
       $this->form_validation->set_rules('disponible','disponible','trim|required|integer|max_length[2]|xss_clean');
       $this->form_validation->set_message('required', 'Debe completar este campo');                     
       $this->form_validation->set_rules('condicion_pago','condicion_pago','trim|required|xss_clean');
       $this->form_validation->set_message('required', 'Debe completar este campo');
       $this->form_validation->set_rules('bancos','bancos','trim|required|integer|max_length[3]|xss_clean');
       $this->form_validation->set_message('required', 'Debe completar este campo');
       $this->form_validation->set_rules('transaccion','transaccion','trim|required|max_length[100]|xss_clean');
       $this->form_validation->set_message('required', 'Debe completar este campo');
       $this->form_validation->set_rules('numero_transaccion','numero','trim|required|integer|max_length[30]|xss_clean');
       $this->form_validation->set_message('required', 'Debe completar este campo');
       $this->form_validation->set_rules('monto','monto','trim|required|xss_clean');
       $this->form_validation->set_message('required', 'Debe completar este campo');          
       $this->form_validation->set_rules('fecha_pago','fecha_pago','trim|required|xss_clean');
       $this->form_validation->set_message('required', 'Debe completar este campo');
       if($this->form_validation->run() == false){             
          echo json_encode(array("respuesta" => "Formulario_incompleto"));
        }else{
          $valido=2;
        }
    }
    if($valido >= 1){      
      echo $valido;
      $this->load->model("cursos_cabecera_model");
      $this->load->model("cursos_detalles_model");
      $this->load->model("cronograma_cursos_model");
      $this->load->model("registro_pagos_model"); 
      $total =0;      
      $id_bancos = $bancos;
      $n_referencia = $numero;
      $descripcion = $transaccion;
      $buscar_curso_id = $this->cursos_cabecera_model->buscarCursos_cabecera_id($id_cabecera,$cedula);
      if($costo_1 !="undefined"){       
        $total = ($buscar_curso_id[0]->total - $costo) + $costo_1;
        $costo = 0;
      }else{
        $total = $buscar_curso_id[0]->total;
        $costo = 0;
      }
      
     $modificar_detalles = $this->cursos_detalles_model->modifcar_detalles($id_detalles,$id_curso,$curso_1,
                                                                            $id_cronograma,$costo_1,$condicion_pago,$valido);
      $buscar_curso_detalles = $this->cursos_detalles_model->buscarDetalles_id ($id_detalles);
      if($buscar_curso_detalles != 1){
        $estado = $buscar_curso_detalles[0]->status_pago;
      }else {
        $estado = "Pago Total";
      }     
      $modificar_cabecera = $this->cursos_cabecera_model->modificarCursos_cabecera($id_cabecera,$total,$estado,$valido);
      
      $modificar_registros_pagos = $this->registro_pagos_model->guadarRegistros_pagos($id_bancos,$n_referencia,$descripcion,
                                                                                      $id_detalles,$pago_monto,$fecha_pago,$costo,$total);

      echo json_encode(array("respuesta" => "Exito"));
     // $this->imprimir($cedula,$id_cabecera);
    }
  }

  public function imprimir($cedula,$id_cabecera){

      $this->load->model("estudiantes_model");
      $this->load->model("cursos_servicios_model");
      $this->load->library('fpdf');
      $numero = $id_cabecera;
      $this->pdf = new Pdf();
      $this->pdf->AddPage();
      $this->pdf->AliasNbPages();
    
      /* Se define el titulo, márgenes izquierdo, derecho y
       * el color de relleno predeterminado*/
      $this->pdf->SetFont('Arial','B',9);
      $this->pdf->Cell(30);
      $this->pdf->Ln(-4);  
      $this->pdf->Cell(0,15,utf8_decode('Nro.').$numero,0,1,'R');
      $this->pdf->SetTitle("Recibo");      
      $this->pdf->SetFillColor(200,200,200);
      $this->pdf->Ln(10);
      $this->pdf->SetFont('Arial','B',12);
      $this->pdf->Cell(30);
      $this->pdf->Cell(90,10,'Recibo de Pago',0,0,'C');
      $this->pdf->Ln(15);

      $datos_estudiantes = $this->estudiantes_model->estudiante_ci($cedula);
      $email = $datos_estudiantes[0]->correo;

      $this->pdf->SetTextColor(0,0,0);                    
      $this->pdf->SetFont('Arial','B',9);           
      $this->pdf->Cell(80,10,utf8_decode('Nombres:  '.$datos_estudiantes[0]->nombres),0,0);
      $this->pdf->Cell(80,10,utf8_decode('Apellidos:  '.$datos_estudiantes[0]->apellidos),0,1);
      $this->pdf->Ln(-3);
      $this->pdf->cell(0,10,utf8_decode('Dirección:  '.$datos_estudiantes[0]->direccion),0,1);
      $this->pdf->Ln(-3);
      $this->pdf->cell(100,10,utf8_decode('Email:  '.$datos_estudiantes[0]->correo),0,0);
      $this->pdf->Cell(30,10,utf8_decode('Teléfono:  '.$datos_estudiantes[0]->telefono),0,1);
      $this->pdf->Ln(15);

      $this->pdf->SetFont('Arial','B',9);          
      $this->pdf->SetFillColor(200,220,255);
      $this->pdf->SetMargins(10,0,30);
      $this->pdf->Cell(10,5,utf8_decode('N'),'BRTL',0,'C'.true);
      $this->pdf->SetMargins(10,0,30);
      $this->pdf->Cell(140,5,utf8_decode('Descripción'),'BRTL',0,'C'.true);
      $this->pdf->SetMargins(10,0,30);
      $this->pdf->Cell(20,5,'Costo','BRTL',1,'C'.true);

      $detalles = $this->cursos_servicios_model->listado_cursos_id ($cedula,$id_cabecera);
    

      $relleno=false;
      $this->pdf->SetFillColor(200,200,200);
      $this->pdf->SetFont('Arial','',10);     
      $totalExist=0;
      $subtotal = 0;
      $faltante = 0;
      $faltante_pago = 0;

      for($y=0;$y<count($detalles);$y++){
        $this->pdf->SetMargins(10,0,30);
        $this->pdf->Cell(10,15,utf8_decode($detalles[$y]->id_c),'RL',0,'C',$relleno);
        $this->pdf->SetMargins(10,0,30);
        $this->pdf->Cell(140,15,utf8_decode($detalles[$y]->descripcion),'RL',0,'C',$relleno);
        $this->pdf->SetMargins(10,0,30);
        $this->pdf->Cell(20,15,utf8_decode($detalles[$y]->costo),'RL',1,'C',$relleno);
        $this->pdf->SetMargins(10,0,30);
        $subtotal =$subtotal + $detalles[$y]->costo;
        $faltante =$faltante + $detalles[$y]->Faltante;
        $relleno=!$relleno;           
      }
      $faltante_pago = $faltante;
      $this->pdf->Cell(150,15,utf8_decode('Faltante'),'T',0,'R');
      $this->pdf->Cell(20,15,utf8_decode($faltante_pago),'T',0,'C');
      srand (time());
      $this->pdf->ln(6);
      $this->pdf->Cell(150,15,utf8_decode('TOTAL A PAGAR'),'',0,'R');
      $this->pdf->Cell(20,15,utf8_decode($subtotal),'',0,'C');
      $nombrePDF = "Recibo de Pago N-".$id_cabecera.".pdf";
      $url="reportes/".$nombrePDF;      
      $this->pdf->Output($url,'F');
      $archivo = $url;

      /*echo json_encode(array("respuesta" =>"Exito"));*/

     
  }

  public function correos($email,$archivo){

   $url =base_url().'reportes/'.$archivo;
      $correo = "mmab1705@hotmail.com"; 
        $this->email->from('centroesteticaprettywoman@gmail.com', 'centroesteticaprettywoman C.A');
          $this->email->to($correo);
          $this->email->subject('Gracias por preferirnos...');
          $this->email->message('<h2>Para descargar su Recibi de pago entre al siguiente link: </h2><a>'.$url.'</a>');
    if($this->email->send()){
      echo json_encode(array("respuesta" =>"Exito"));
    }else{
      echo json_encode(array("respuesta" =>"fallo"));
    }
  }

}
