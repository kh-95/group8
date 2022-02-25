<?php 
   
    require './helpers/dbConnection.php';
    require './helpers/functions.php';    

    if($_SERVER['REQUEST_METHOD'] == "POST"){
     
        $email    = Clean($_POST['email']);
        $password = Clean($_POST['password']);

  
  $errors = [];  
  # Email Validate 
   if(!validate($email,1)){
    $errors['Email'] = "Field Required";
   }elseif(!validate($email,2)){
    $errors['Email'] = "Invalid Email Format";
   }

  # Password Validate 
   if(!validate($password,1)){
    $errors['Password'] = "Field Required";
    }elseif(!validate($password,4)){
     $errors['Password'] = "Invalid Length , Length Must Be >= 6 ch";
   }

    if(count($errors) > 0){
        foreach($errors as $key => $error){
           echo '* '.$key.' : '.$error.'<br>';
        }
    }else{

       // code ..... 
       $password = md5($password);
       $sql = "select * from users where email = '$email' and password = '$password' ";
       $op = mysqli_query($con,$sql);

         if(mysqli_num_rows($op) == 1){
             // login code .... 
            
             $data = mysqli_fetch_assoc($op);
             $_SESSION['user'] = $data;

             header("Location: index.php");


         }else{
             echo 'Error In Your Data Try Again';
         }


    }



    }



?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Blog</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                    
                                    
                                    
                                    <form   action ="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4" id="inputEmailAddress" type="email"  name = "email" placeholder="Enter email address" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" id="inputPassword" type="password" name="password" placeholder="Enter password" />
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                                                    <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                                                </div>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <!-- <a class="small" href="password.html">Forgot Password?</a> -->
                                                <input type="submit" class="btn btn-primary" value="Login"> 
                                            </div>
                                        </form>



                                    </div>
                              
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
