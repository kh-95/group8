<?php 

 # Logic 
 require '../helpers/dbConnection.php';
 require '../helpers/functions.php';



 $sql_cat= "select * from categories";

$op_cat =mysqli_query($con,$sql_cat);


$sql_user= "select * from users";

$op_user =mysqli_query($con,$sql_user);



  
  if($_SERVER['REQUEST_METHOD'] == "POST"){

    $title    = Clean($_POST['title']); 
    $content    = Clean($_POST['content']);
   $date=Clean($_POST['date']);
    $dep_id   = Clean($_POST['cat_id']);

    $user_id =Clean($_POST['user_id']);

    # Image File Data  .... 
    $file_tmp  =  $_FILES['image']['tmp_name'];
    $file_name =  $_FILES['image']['name'];  
    $file_size =  $_FILES['image']['size'];
    $file_type =  $_FILES['image']['type'];   
 
    $file_ex   = explode('.',$file_name);
    $updated_ex = strtolower(end($file_ex));
 
 

    $errors = [];

    if(!validate($title,1)){
        $errors['Title'] = "Field Required";
    }


    if(!validate($content,1)){
        $errors['Title'] = "Field Required";
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



      $sql = "insert into blogs (title,content,image,date,cat_id,addedBy) values ('$title','$content','$finalName','$date',$cat_id,$user_id)";
       $op  = mysqli_query($con,$sql);

       if($op){
           $message = ['Data Inserted'];
       }else{
           $message = ['Error Try Again'];
       }
       $_SESSION['Message'] = $message;
       
       header("Location: index.php");
       exit();

    } 
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
                $text = "ADD NEW Blog";
               printMessage($text);
                ?>
                </li>

            </ol>




            <div class="container">

                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post"  enctype="file/multipart">


                    <div class="form-group">
                        <label for="exampleInputName">Title</label>
                        <input type="text" class="form-control" name="title" id="exampleInputName" aria-describedby=""
                            placeholder="Enter Role Title">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName">Content</label>
                        <input type="text" class="form-control" name="content" id="exampleInputName" aria-describedby=""
                            placeholder="Enter Role Title">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName">Image</label>
                        <input type="file" class="form-control" name="image" id="exampleInputName" aria-describedby=""
                            placeholder="Enter Role Title">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Date</label>
                        <input type="date" class="form-control" name="date" id="exampleInputName" aria-describedby=""
                            placeholder="Enter Role Title">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName">Category</label>
                        <select class="form-control" name="cat_id">

<?php
while($data=mysqli_fetch_assoc($op_cat)){
?>

<option  value="<?php echo $data['id'];?> "><?php echo $data['title'];     ?></option>

<?php } ?>
</select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName">UserName</label>
                    
                        <select class="form-control" name="user_id">

<?php
while($data=mysqli_fetch_assoc($op_user)){
?>

<option  value="<?php echo $data['id'];?> "><?php echo $data['name'];     ?></option>

<?php } ?>
</select>
                    </div>



                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>





        </div>
    </main>


    <?php 

 require '../layouts/footer.php';

?>