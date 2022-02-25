<?php 

 # Logic 
 require '../helpers/dbConnection.php';
 require '../helpers/functions.php';

  # Select Roles ..... 
 $sql = "select * from categories order by id desc";
 $op  = mysqli_query($con,$sql);






  if($_SERVER['REQUEST_METHOD'] == "POST"){

    $title     = Clean($_POST['title']);
    $content   = Clean($_POST['content']);
    $cat_id    = Clean($_POST['cat_id']);
    $date      = Clean($_POST['date']);


    # Image File Data  .... 
    $file_tmp  =  $_FILES['image']['tmp_name'];
    $file_name =  $_FILES['image']['name'];  
    $file_size =  $_FILES['image']['size'];
    $file_type =  $_FILES['image']['type'];   

    $file_ex   = explode('.',$file_name);
    $updated_ex = strtolower(end($file_ex));
  


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
         $content = str_replace("'","''",$content);
         $date  = strtotime($date);
         $user_id = $_SESSION['user']['id'];

         $sql = "insert into blogs (title,content,image,date,cat_id,addedBy) values ('$title','$content','$finalName',$date,$cat_id,$user_id)";
        
         $insert_op  = mysqli_query($con,$sql);
          echo mysqli_error($con);
    

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

               
            <li class="breadcrumb-item active">
                    <?php
                $text = "ADD NEW Blog";
               printMessage($text);
                ?>
                </li>

            </ol>




            <div class="container">

                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post"  enctype="multipart/form-data">



                    <div class="form-group">
                        <label for="exampleInputName">Title</label>
                        <input type="text" class="form-control" name="title" id="exampleInputName" aria-describedby=""
                            placeholder="Enter Name">
                    </div>



                    <div class="form-group">
                        <label for="exampleInputPassword">Content</label>
                        <textarea  class="form-control" name="content" ></textarea>
                    </div>


                    <div class="form-group">
                        <label for="exampleInputName">date</label>
                        <input type="date" class="form-control" name="date" id="exampleInputName" >
                    </div>


                    <div class="form-group">
                        <label for="exampleInputPassword">Category</label>
                        <select class="form-control" name="cat_id">

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



