<?php 

require '../helpers/dbConnection.php';
require '../helpers/functions.php';


$id = $_GET['id'];
$errors = [];
# Start Validation .... 

if(!validate($id,1)){
    $errors['id'] = "Field Required";
}elseif(!validate($id,5)){

    $errors['id'] = "Invalid id";
}


if(count($errors) > 0){

    $Message = $errors;
}else{
  
# Fetch Image .....     
$sql = 'select image from users where id ='.$id;
$op = mysqli_query($con,$sql);
$data = mysqli_fetch_assoc($op);


  # Delete Logic ..... 
  $sql = "delete from users where id = $id";
  $op  = mysqli_query($con,$sql);
   
  if($op){
      unlink('./uploads/'.$data['image']);
     
      $message = ['Raw Removed'];
  }else{
      $message = ["Error In Process try again"];
  }

   
   $_SESSION['Message'] = $message;

   header("Location: index.php");

}







?>