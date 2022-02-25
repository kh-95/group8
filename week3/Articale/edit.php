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

 $sql = "select * from blogs where id = $id";
 $op  = mysqli_query($con,$sql);
 $data = mysqli_fetch_assoc($op);

}




  # Select categories ..... 
 $sql = "select * from categories order by id desc";
 $op  = mysqli_query($con,$sql);






  if($_SERVER['REQUEST_METHOD'] == "POST"){

    $title     = Clean($_POST['title']);
    $content   = Clean($_POST['content']);
    $cat_id    = Clean($_POST['cat_id']);
    $date      = Clean($_POST['date']);


    $errors = [];
 # Title Validation ... 
 if(!validate($title,1)){
    $errors['Title'] = "Field Required";
}elseif(!validate($title,6)){
    $errors['Title'] = "Invalid String";
}

# Content Validate 
if(!validate($content,1)){
$errors['Content'] = "Field Required";
}elseif(!validate($content,4,100)){
$errors['Content'] = "Length Must >= 100 CH";
}




# date Validation 
if(!validate($date,1)){
$errors['date'] = "Field Required";
}elseif(!validate($date,9)){
 $errors['date'] = "Invalid Date Format";
}


# Category Validation .... 
if(!validate($cat_id,1)){
$errors['Category'] = "Field Required";
}elseif(!validate($cat_id,5)){
 $errors['Category'] = "Invalid Category";
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


       $date = strtotime($date);
       $content = str_replace("'","''",$content);
       $user_id = $_SESSION['user']['id'];



         // if image true .... 
        if(validate($_FILES['image']['tmp_name'],1)){

           //   # Upload Image ..... 
        $finalName = rand().time().'.'.$updated_ex;

        $disPath = './uploads/'.$finalName;
 
      if(move_uploaded_file($file_tmp,$disPath)){
         // DB Code .... 
         $sql = "update blogs set title = '$title' , content = '$content' , cat_id = $cat_id , addedBy = $user_id , date = $date , image = '$finalName' where id = $id";
         $update_op  = mysqli_query($con,$sql);

         if($update_op){

            unlink('./uploads/'.$data['image']); 
             $message = ['Raw updated'];
         }else{
             $message = ['Error Try Again'];
         }
       } 



        }else{

            $sql = "update blogs set title = '$title' , content = '$content' , cat_id = $cat_id , addedBy = $user_id , date = $date where id = $id";
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
                $text = "Edit Articale";
               printMessage($text);
                ?>
            </li> 




            </ol>




            <div class="container">

                <form action="edit.php?id=<?php echo $data['id'];?>" method="post"  enctype="multipart/form-data">



                    
                <div class="form-group">
                        <label for="exampleInputName">Title</label>
                        <input type="text" class="form-control" name="title" value="<?php echo $data['title'];?>" id="exampleInputName" aria-describedby=""
                            placeholder="Enter Name">
                    </div>



                    <div class="form-group">
                        <label for="exampleInputPassword">Content</label>
                        <textarea  class="form-control" name="content"  >  <?php echo $data['content'];?>    </textarea>
                    </div>


                    <div class="form-group">
                        <label for="exampleInputName">date</label>
                        <input type="date" class="form-control" name="date"   value = "<?php echo date('Y-m-d',$data['date']);?>"  id="exampleInputName" >
                    </div>


                    <div class="form-group">
                        <label for="exampleInputPassword">Category</label>
                        <select class="form-control" name="cat_id">

                            <?php 
                         while($cat_data = mysqli_fetch_assoc($op)){
                    ?>
                            <option value="<?php echo $cat_data['id'];?>"   <?php if($cat_data['id'] == $data['cat_id']){ echo "selected";}?>  > <?php echo $cat_data['title'];?></option>
                            <?php } ?>
                        </select>
                    </div>




                    <div class="form-group">
                        <label for="exampleInputName">Image</label> <br>
                        <input type="file" name="image">

                        <img src="./uploads/<?php echo $data['image']?>" width="50px"> 
                    </div>



                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>





        </div>
    </main>


    <?php 

 require '../layouts/footer.php';

?>