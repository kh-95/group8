<?php


$unit=470;
$bill;

if($unit  <= 50){
  echo  $bill= $unit *3.50;
     
}elseif(($unit >=100) &&($unit < 150)) {

    echo $bill=$unit *4 ;

}elseif($unit >= 150){

    echo $bill=$unit *6.50;
}




?>

