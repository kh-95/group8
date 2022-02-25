<?php 

 # Logic 
 require '../helpers/dbConnection.php';
 require '../helpers/functions.php';

  # Select Roles ..... 
 $sql = "select * from roles order by id desc";
 $op  = mysqli_query($con,$sql);






  if($_SERVER['REQUEST_METHOD'] == "POST"){

    $name     = Clean($_POST['name']);
    $email    = Clean($_POST['email']);
    $password = Clean($_POST['password']);
    $phone    = Clean($_POST['phone']);
    $role_id  = Clean($_POST['role_id']);


    # Image File Data  .... 
    $file_tmp  =  $_FILES['image']['tmp_name'];
    $file_name =  $_FILES['image']['name'];  
    $file_size =  $_FILES['image']['size'];
    $file_type =  $_FILES['image']['type'];   

    $file_ex   = explode('.',$file_name);
    $updated_ex = strtolower(end($file_ex));
  


    $errors = [];

  # Name Validation ... 
    if(!validate($name,1)){
        $errors['Name'] = "Field Required";
    }elseif(!validate($name,6)){
        $errors['Name'] = "Invalid String";
    }

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


   # Phone Validation 
   if(!validate($phone,1)){
    $errors['phone'] = "Field Required";
   }elseif(!validate($phone,7)){
     $errors['phone'] = "Invalid Phone Number";
  }


  # Role Validation .... 
  if(!validate($role_id,1)){
    $errors['Role'] = "Field Required";
   }elseif(!validate($role_id,5)){
     $errors['Role'] = "Invalid Role";
  }


  # Image Validate ..... 
  if(!validate($file_name,1)){
      $errors['Image'] = "Field Required";
  }elseif(!validate($updated_ex,8)){
      $errors['Image'] = "Invalid Extension";
  }



    if(count($errors) > 0){
        $_SESSION['Message'] = $errors;
    }else{

      # Upload Image ..... 
        $finalName = rand().time().'.'.$updated_ex;

        $disPath = './uploads/'.$finalName;
 
      if(move_uploaded_file($file_tmp,$disPath)){
         // DB Code .... 
         $password = md5($password);
         $sql = "insert into users (name,email,password,image,phone,role_id) values ('$name','$email','$password','$finalName','$phone',$role_id)";
         $insert_op  = mysqli_query($con,$sql);

         if($insert_op){
             $message = ['Raw Inserted'];
         }else{
             $message = ['Error Try Again'];
         }


      }else{

         $message = ["Error In Upload Image Try Again"];
      }

      $_SESSION['Message'] = $message;
      header("Location: index.php");
      exit();
   

    }


  }  // end form Logic ..... 

 require '../layouts/header.php';
 require '../layouts/nav.php';
 require '../layouts/sidNav.php'; 

?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">

                <?php 
               
               if(isset($_SESSION['Message'])){
                   foreach($_SESSION['Message'] as $key => $val){
                      
                    echo '* '.$key.' : '.$val.'<br>';

                   }
                   unset($_SESSION['Message']);
               }else{  ?>

                <li class="breadcrumb-item active">ADD NEW User</li>

                <?php   }   ?>




            </ol>




            <div class="container">

                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post"  enctype="multipart/form-data">



                    <div class="form-group">
                        <label for="exampleInputName">Name</label>
                        <input type="text" class="form-control" name="name" id="exampleInputName" aria-describedby=""
                            placeholder="Enter Name">
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail">Email address</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter email">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword">New Password</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1"
                            placeholder="Password">
                    </div>



                    <div class="form-group">
                        <label for="exampleInputPassword">Phone</label>
                        <input type="tel" class="form-control" name="phone" id="exampleInputPassword1"
                            placeholder="Phone">
                    </div>


                    <div class="form-group">
                        <label for="exampleInputPassword">Role</label>
                        <select class="form-control" name="role_id">

                            <?php 
                         while($data = mysqli_fetch_assoc($op)){
                    ?>
                            <option value="<?php echo $data['id'];?>"> <?php echo $data['title'];?></option>
                            <?php } ?>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="exampleInputName">Image</label> <br>
                        <input type="file" name="image">
                    </div>



                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>





        </div>
    </main>


    <?php 

 require '../layouts/footer.php';

?>