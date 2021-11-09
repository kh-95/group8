
<?php 

if($_SERVER['REQUEST_METHOD'] == "POST"){

 $name     = $_POST['name'];
 $email    = $_POST['email'];
 $password = $_POST['password'];
 $address    = $_POST['address'];
 $linkedin   = $_POST['linkedin'];

$errors =[];
  if(empty($name)){

    $errors['name']= "name is required";
  }
  if(empty($email)){

    $errors['email']= "email is required";
  }if(empty($password)){

    $errors['password']= "password is required";
  }if(strlen($password) !=6){

    $errors['password']="password lenght must be 6 ";

  }if(empty($address)){

    $errors['address']= "address is required";
  }if(str_word_count($address) < 10){

    $errors['address']= "address  must be 10 characters ";

  }if(empty($linkedin)){

    $errors['linkedin']= "linkedin  is required";
  }

if(count($errors) > 0){

    foreach($errors as $key => $val){
        echo $val.'<br>';
    }
   }else{

       echo $name;
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
    <input type="text" class="form-control" name="name" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
  </div>


  <div class="form-group">
    <label for="exampleInputEmail">Email address</label>
    <input type="email"   class="form-control"  name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword">New Password</label>
    <input type="password"   class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword">Address</label>
    <input type="text"   class="form-control" name="address" id="exampleInputAddress" placeholder="Enter Address">
  </div>
 
  <div class="form-group">
    <label for="exampleInputPassword">Linked_in</label>
    <input type="url"   class="form-control" name="linkedin" id="exampleInputLinkedin" placeholder="Enter Linkedin ">
  </div>

  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</body>
</html>