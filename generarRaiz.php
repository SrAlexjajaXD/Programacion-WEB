<?php
$inicial=$_POST["valorI"];
$final=$_POST["valorF"];
$incr=$_POST["Incremento"];

//echo $inicial."<br>".$final."<br>".$incr;
for($i=$inicial;$i<=$final;$i+=$incr){
    $raiz=sqrt($i);
    echo "Raiz de ".$i." es: ".sprintf("%.5f",$raiz)."<br>";
}
?>