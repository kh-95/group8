<?php
 if($_SERVER['REQUEST_METHOD']=='POST'){

      $name=$_POST['name'];
      $password=$_POST['password'];
      $email=$_POST['email'];


if(empty($name) ||empty($password) ||empty($password) ){

      echo "data required";
}else{

      echo "data valid";
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
  <h2>Register</h2>
  
  
  <form   action="<?php echo $_SERVER['PHP_SELF'];?>"  method="post">


  <div class="form-group">
    <label for="exampleInputName">Name</label>
    <input type="text" class="form-control" name="name" id="exampleInputName" aria-describedby="" >
</div>


<div class="form-group">
    <label for="exampleInputName">Email</label>
    <input type="text" class="form-control" name="email" id="exampleInputName" aria-describedby="" >
</div>

  <div class="form-group">
    <label for="exampleInputPassword">New Password</label>
    <input type="password"   class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
  </div>
 
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</body>
</html>






