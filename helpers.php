<?php

function clean ($input){

$value=trim($input);

$value=htmlspecialchars($value);

$value=stripcslashes($value);

return $value;


}











?>