<?php


// setcookie('name','ROOT USER',time()-86400,'/');

// unset($_COOKIE['name']);
// if(isset($_COOKIE['name'])){

// echo "khadija sabry";
// }else{

// echo "mohamed mustafa";

// }

// $file =fopen('students.txt','a') or die ("unable to open file");

// fwrite($file, "khadija وطن يعالج غربتي,\n");

// // echo fread($file,filesize('students.txt'));
// fclose($file);

// $myfile = fopen("data .txt", "r") ;

// echo fgets($myfile);
// fclose($myfile);
// $myfile = fopen("khadija.txt", "r") or die("Unable to open file!");
// echo fgets($myfile);

//     $file =fopen('data.txt', 'r') or die ("file is not found");

//     while (!feof($file)){

// echo fgets($file).'<br>';

//     }

// fclose($file);

//  echo date('D-M-Y',time('h:i:s',));
//  echo date('F/D/Y h:i:s a',time()+86400).'<br>';
// echo date('F/D/Y h:i:s a ',time()+86400).'<br>';
// echo time();

// echo strtotime('11/12/2021').'<br>';

// echo date('D/M-Y',1636671600);

// date_default_timezone_set('africa/cairo');

// echo date_default_timezone_get();

// echo date('d/m/y h:i:s p', 1639327806).'<br>';

// echo strtotime("+1 month",time());



// $object= '{
 
//     "name" :"khadija" ,
//     "age" :26,
//     "phone"  :"010xxx"
//  }';

//  $array_data=json_decode($object,true);

//  foreach($array_data as $val) {
     
//      echo $val .'<br>';
//  }

// $object_data=json_decode($object);

// // var_dump($array);

// echo $object_data->name . '<br>'. $object_data->phone ;

// foreach($object_data as  $value) {
//     # code...
//     echo $value .'<br>';
// }

// $student=["name"=>"khadija sabry","age"=>26];

// var_dump(json_encode($student));

// $data =  file_get_contents('http://shopping.marwaradwan.org/api/Products/1/1/0/100/atoz');

//       $dataArray = json_decode($data,true);

//      var_dump($dataArray);


    //  echo $dataArray->products_id;
//   foreach($dataArray['Pets']  as $key => $val){

//         echo $val.'<br>';
//     }




// if($_SERVER['REQUEST_METHOD'] == "POST"){

//     $title     = $_POST['title'];
//     $content    = $_POST['content'];
//     $date= $_POST['date'];
    
//         if(empty($title)){

//             echo "title is required".'<br>';
//         }if(empty($content)){

//             echo "content is required";
//         }


//       $file= fopen ('data .txt','a');
//       fwrite($file, "$title");
//      fwrite($file, "$content");
//       fwrite($file, "$date\n");

//       fclose($file);
      

//     }


// echo date_default_timezone_set('africa /cairo');

// echo date_default_timezone_get();


?>

        <!-- <!DOCTYPE html>
        <html lang="en">
        <head>
          
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
            <label for="exampleInputPassword">Title</label>
            <input type="name"   class="form-control" name="title" id="exampleInputPassword1" placeholder="title">
          </div>
        
          <div class="form-group">
            <label for="exampleInputPassword">Content</label>
            <input type="text"   class="form-control" name="content" id="exampleInputAddress" placeholder="Enter Content">
          </div>
         
          <div class="form-group">
            <label for="exampleInputPassword">Date</label>
            <input type="date"   class="form-control" name="date" id="exampleInputLinkedin" placeholder="Enter Date">
          </div>
        
          
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
        
        </body>
        </html>
 -->
