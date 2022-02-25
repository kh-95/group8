<?php 

 # Logic 
 require '../helpers/dbConnection.php';
 require '../helpers/functions.php';

# GET RAW Data .... 
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

    $_SESSION['Message'] = $Message;

    header("Location: index.php");
    exit();
}else{

 $sql = "select * from users where id = $id";
 $op  = mysqli_query($con,$sql);
 $data = mysqli_fetch_assoc($op);

}




  # Select Roles ..... 
 $sql = "select * from roles order by id desc";
 $op  = mysqli_query($con,$sql);






  if($_SERVER['REQUEST_METHOD'] == "POST"){

    $name     = Clean($_POST['name']);
    $email    = Clean($_POST['email']);
    // $password = Clean($_POST['password']);
    $phone    = Clean($_POST['phone']);
    $role_id  = Clean($_POST['role_id']);


    
  


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



  if(validate($_FILES['image']['tmp_name'],1)){
  # Image File Data  .... 
  $file_tmp  =  $_FILES['image']['tmp_name'];
  $file_name =  $_FILES['image']['name'];  
  $file_size =  $_FILES['image']['size'];
  $file_type =  $_FILES['image']['type'];   

  $file_ex   = explode('.',$file_name);
  $updated_ex = strtolower(end($file_ex));

  # Image Validate ..... 
  if(!validate($updated_ex,8)){
      $errors['Image'] = "Invalid Extension";
  }

  }



    if(count($errors) > 0){
        $_SESSION['Message'] = $errors;
    }else{
         // if image true .... 
        if(validate($_FILES['image']['tmp_name'],1)){

           //   # Upload Image ..... 
        $finalName = rand().time().'.'.$updated_ex;

        $disPath = './uploads/'.$finalName;
 
      if(move_uploaded_file($file_tmp,$disPath)){
         // DB Code .... 
         $sql = "update users set name = '$name' , email = '$email' , role_id = $role_id , phone = '$phone' , image = '$finalName' where id = $id";
         $update_op  = mysqli_query($con,$sql);

         if($update_op){

            unlink('./uploads/'.$data['image']); 
             $message = ['Raw updated'];
         }else{
             $message = ['Error Try Again'];
         }
       } 



        }else{

            $sql = "update users set name = '$name' , email = '$email' , role_id = $role_id , phone = '$phone' where id = $id";
            $op  = mysqli_query($con,$sql);
            if($op){
                $message = ['Raw Updated'];
            }else{
                $message = ['Error Try Again'];
            }
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

           <li class="breadcrumb-item active">
                <?php
                $text = "Edit User";
               printMessage($text);
                ?>
            </li> 




            </ol>




            <div class="container">

                <form action="edit.php?id=<?php echo $data['id'];?>" method="post"  enctype="multipart/form-data">



                    <div class="form-group">
                        <label for="exampleInputName">Name</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $data['name'];?>" id="exampleInputName" aria-describedby=""
                            placeholder="Enter Name">
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail">Email address</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $data['email'];?>" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter email">
                    </div>

                    <!-- <div class="form-group">
                        <label for="exampleInputPassword">New Password</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1"
                            placeholder="Password">
                    </div> -->



                    <div class="form-group">
                        <label for="exampleInputPassword">Phone</label>
                        <input type="tel" class="form-control" name="phone"  value="<?php echo $data['phone'];?>" id="exampleInputPassword1"
                            placeholder="Phone">
                    </div>


                    <div class="form-group">
                        <label for="exampleInputPassword">Role</label>
                        <select class="form-control" name="role_id">

                            <?php 
                         while($role_data = mysqli_fetch_assoc($op)){
                    ?>
                            <option value="<?php echo $role_data['id'];?>"   <?php if($role_data['id'] == $data['role_id']){ echo 'selected';}?>  > <?php echo $role_data['title'];?></option>
                            <?php } ?>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="exampleInputName">Image</label> <br>
                        <input type="file" name="image">

                        <img src="./uploads/<?php echo $data['image']?>" width="50px"> 
                    </div>



                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>





        </div>
    </main>


    <?php 

 require '../layouts/footer.php';

?>