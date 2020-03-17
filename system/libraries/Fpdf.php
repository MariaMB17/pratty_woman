<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Incluimos el archivo fpdf
    require_once "fpdf17/fpdf.php";
 
    //Extendemos la clase Pdf de la clase fpdf para que herede todas sus variables y funciones
    class Pdf extends FPDF {
        public function __construct() {
            parent::__construct();
        }
        // El encabezado del PDF
        public function Header(){
          $Fecha =date("Y-m-d");
          $this->Image('css/images/woman.jpg',20,15,-210);  
          $this->SetFont('Arial','B',9);
          $this->Cell(30);
          $this->Ln(5);  
          $this->Cell(0,15,utf8_decode('Fecha de emisión: ').$Fecha,0,1,'R');
          $this->SetFont('Arial','B',9);
          $this->Cell(30);
          $this->Cell(0,1,utf8_decode('RIF: J - 88888888888 '),0,1,'R');
          
       }
       // El pie del pdf
       function Footer(){
          $this->SetY(-15); // para dejar un margen para colocar el pie de pagina
          $this->SetFont('Arial','I',8);
          $this->Cell(0,10,'Carrera 23 entre calles 48 y 49 (Ubicado dentro de las instalaciones del Restaurant Grandes Ligas)'.$this->PageNo().'/{nb}',0,0,'C');           
           
      }
      
    }

?>;