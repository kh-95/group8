<?php
$data =  file_get_contents('http://shopping.marwaradwan.org/api/Products/1/1/0/100/atoz');

$dataArray = json_decode($data,true);

echo "<pre>";

 foreach($dataArray['data'] as $k=>$v){

    $products_id= "products_id".':'.$v['products_id'];
    $products_name= "products_name".':'.$v['products_name'];
    $products_desc= "products_description".':'.$v['products_description'];
    $products_quantity= "products_quantity".':'.$v['products_quantity'];
    $products_model= "products_model".':'.$v['products_model'];
    $products_image= "products_image".':'.$v['products_image'];
    $products_date= "products_date_added".':'.$v['products_date_added'];
    $products_liked= "products_liked".':'.$v['products_liked'];

$file =fopen('shoppingdata.txt','a') ;
fwrite($file, "$products_id");
 fwrite($file, "$products_name");
fwrite($file, "$products_desc");
fwrite($file, "$products_quantity");
fwrite($file, "$products_model");
fwrite($file, "$products_image");
fwrite($file, "$products_date");
fwrite($file, "$products_liked\n");

fclose($file);




 }


?>