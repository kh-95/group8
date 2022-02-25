<?php

class Database{

  var  $server ="localhost";

var    $dbName="blog";
 var   $dbUser="root";
 var   $dbPassword="";
 var $con= null;



function __construct(){

$this->con=mysqli_connect($this->server,$this->dbUser,$this->dbPassword,$this->dbName);

if(!($this->con)){

    echo "Error !! try again";
}

}




function query($sql){

    $result=mysqli_query($this->con,$sql);

    return $result;

}


function __destruct()
{
    mysqli_close($this->con);
}

}

$db = new Database();

$result =$db->query("select * from users");


while($data=mysqli_fetch_assoc($result)){

echo $data['name'] .'<br>';

}













?>