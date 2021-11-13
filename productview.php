<?php


  $file = fopen('shoppingdata.txt','r');

  
  
     while (!feof($file)){

        echo "<pre>";
echo fgets($file).'<br>';

    }
  

  fclose($file);

   











?>