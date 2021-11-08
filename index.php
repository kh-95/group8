<?php


$unit=170;
$bill=0;

if($unit  <= 50){
    $bill= $unit *3.50;
     
}elseif(($unit >50) &&($unit < 150)) {

     $bill=$unit *4 ;

}elseif($unit >= 150){

    echo $bill=$unit *6.50;
}




?>

