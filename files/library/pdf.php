<?php
  /* -----------------------------
  PDF化
  ----------------------------- */
  $URL = 'http://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];

  $html = file_get_contents('http://www.teteru.net');
  $mpdf=new mPDF('ja', 'A4');
  $mpdf->WriteHTML($html);
  $mpdf->Output("hoge.pdf", 'F');
  //$mpdf->Output();
  exit; 
?>