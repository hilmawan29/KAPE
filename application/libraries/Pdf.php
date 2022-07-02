<?php
// include_once APPPATH . '/third_party/fpdf/fpdf.php';

class Pdf{
    function __construct() {
        include_once APPPATH . '/third_party/fpdf/fpdf.php';
    }

    function myCell($w,$h,$x,$t){
        $height = $h/3;
        $first = $height+2;
        $second = $height+$height+$height+3;
        $len = strlen($t);
        if($len>15){
            $txt = str_split($t,15);
            $this->setX($x);
            $this->Cell($w,$first,$txt[0],'','','');
            $this->setX($x);
            $this->Cell($w,$second,$txt[1],'','','');
            $this->setX($x);
            $this->Cell($w,$h,'','LTRB',0,'L',0);
        }else{
            $this->setX($x);
            $this->Cell($w,$h,$t,'LTRB',0,'L',0);
        }
    }
}
?>