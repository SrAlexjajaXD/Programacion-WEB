<?php
require('fpdf/fpdf.php');
 
class PDF extends FPDF
{

    function cR($c){
      return (ord($c[0])-55)*16+ord($c[1])-55;
    }

    function cV($c){
      return (ord($c[2])-55)*16+ord($c[3])-55;
    }

    function cA($c){
      return (ord($c[4])-55)*16+ord($c[5])-55;
    }


    function cabeceraHorizontal($cabecera,$px,$py,$anchoC,$altoC,$cF,$cT)
    {
        $this->SetXY($px, $py);
        $this->SetFont('Arial','B',10);
        $this->SetFillColor($this->cR($cF),$this->cV($cF),$this->cA($cF));//Fondo azul de celda
        $this->SetTextColor($this->cR($cT),$this->cV($cT),$this->cA($cT)); //Letra color blanco
        foreach($cabecera as $fila)
        {
 
            $this->CellFitSpace($anchoC,$altoC, utf8_decode($fila),1, 0 , 'L', true);
 
        }
    }
 
    function datosHorizontal($datos,$px,$py,$anchoC,$altoC,$cFd)
    {
        $this->SetXY($px,$py);
        $this->SetFont('Arial','',10);
        $this->SetFillColor($this->cR($cFd),$this->cV($cFd),$this->cA($cFd));
        $this->SetTextColor(3, 3, 3); //Color del texto: Negro
        $bandera = false; //Para alternar el relleno
        foreach($datos as $fila)
        {
            //Usaremos CellFitSpace en lugar de Cell
            $this->SetXY($px,$py);
            foreach($fila as $valor)
              $this->CellFitSpace($anchoC,$altoC, utf8_decode($valor),1, 0 , 'L', $bandera );
            $py+=$altoC;
            $bandera = !$bandera;//Alterna el valor de la bandera
        }
    }
 
    function tablaHorizontal($cabeceraHorizontal, $datosHorizontal, $px, $py, $anchoC, $altoC, $cF, $cT, $cFd)
    {
        $this->cabeceraHorizontal($cabeceraHorizontal,$px,$py, $anchoC, $altoC,$cF,$cT);
        $this->datosHorizontal($datosHorizontal,$px,$py+$altoC,$anchoC, $altoC,$cFd);
    }
 
    //***** Aquí comienza código para ajustar texto *************
    //***********************************************************
    function CellFit($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='', $scale=false, $force=true)
    {
        //Get string width
        $str_width=$this->GetStringWidth($txt);
 
        //Calculate ratio to fit cell
        if($w==0)
            $w = $this->w-$this->rMargin-$this->x;
        $ratio = ($w-$this->cMargin*2)/$str_width;
 
        $fit = ($ratio < 1 || ($ratio > 1 && $force));
        if ($fit)
        {
            if ($scale)
            {
                //Calculate horizontal scaling
                $horiz_scale=$ratio*100.0;
                //Set horizontal scaling
                $this->_out(sprintf('BT %.2F Tz ET',$horiz_scale));
            }
            else
            {
                //Calculate character spacing in points
                $char_space=($w-$this->cMargin*2-$str_width)/max($this->MBGetStringLength($txt)-1,1)*$this->k;
                //Set character spacing
                $this->_out(sprintf('BT %.2F Tc ET',$char_space));
            }
            //Override user alignment (since text will fill up cell)
            $align='';
        }
 
        //Pass on to Cell method
        $this->Cell($w,$h,$txt,$border,$ln,$align,$fill,$link);
 
        //Reset character spacing/horizontal scaling
        if ($fit)
            $this->_out('BT '.($scale ? '100 Tz' : '0 Tc').' ET');
    }
 
    function CellFitSpace($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
    {
        $this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,false,false);
    }
 
    //Patch to also work with CJK double-byte text
    function MBGetStringLength($s)
    {
        if($this->CurrentFont['type']=='Type0')
        {
            $len = 0;
            $nbbytes = strlen($s);
            for ($i = 0; $i < $nbbytes; $i++)
            {
                if (ord($s[$i])<128)
                    $len++;
                else
                {
                    $len++;
                    $i++;
                }
            }
            return $len;
        }
        else
            return strlen($s);
    }
//************** Fin del código para ajustar texto *****************
//******************************************************************
} // FIN Class PDF
?>
