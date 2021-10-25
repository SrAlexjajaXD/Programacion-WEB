<?php
function sumar($a,$b){
    $s=$a+$b;
    return $s;
}
function sumar2($a,$b){
    echo "<h1>".($a+$b)."</h1>"; 
}

function ver($algo){
    echo "<h1>$algo</h1>";
}
//$resultado=sumar(4,15);
//echo "<h1>$resultado</h1>";

sumar2(4,12);
ver(sumar(2,4));

$suma1=sumar(2,1);
ver($suma1);
?>
