<?php

session_start();


echo  $_SESSION['name'].'<br>'.$_SESSION['age'].'<br>'.$_SESSION['GPA'];




if($_SERVER['REQUEST_METHOD']=="POST"){

if(!empty($_FILES['image']['name'])){

$file_tmp=$_FILES['image']['tmp_name'];
$file_name= $_FILES['image']['name']; //name.png
$file_size=$_FILES['image']['size'];
$file_type=$_FILES['image']['type']; //image/png

$file_x= explode('.',$file_name);

$allowed_x=['png','jpg'];

$updated_x=strtolower(end($file_x));
// echo $updated_x;

if(in_array($updated_x,$allowed_x)){

  $finalname=rand().time().'.'.$updated_x;

  $dis_path='./uploads/'.$finalname;

if(move_uploaded_file($file_tmp,$dis_path)){

  echo "image uploaded";
}else{

  echo "please try again";
}
}else{


  echo "invalid extention ";
}

}else{

  echo "image field required";
}





}









?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Upload Image</h2>
  
  
  <form   action="<?php echo $_SERVER['PHP_SELF'];?>"  method="post"  enctype="multipart/form-data">



  <div class="form-group">
    <label for="exampleInputPassword">Image</label>
    <input type="file"  name="image">
  </div>
 
  
  <button type="submit" class="btn btn-primary">Upload</button>
</form>
</div>

</body>
</html>