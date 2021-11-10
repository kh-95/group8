<?php

// $email="khadeagasgmail.com";

// var_dump(filter_var($email,FILTER_VALIDATE_EMAIL));

// $url = "localhost/group8/session4.php";
    
//      var_dump(filter_var($url,FILTER_VALIDATE_URL));


//  $age = "khadija"; 
// if(is_int($age)){

//     echo "done";
// }else{

//     echo "isnt valid";
// }

//    $ip = "127.0.0.1";

//    var_dump(filter_var($ip,FILTER_VALIDATE_IP));



// $age = "tttt2___1_____0test";
//   echo filter_var($age,FILTER_SANITIZE_NUMBER_INT);

// $email= "test(.D)@yahoo.com";

//   echo $result=filter_var($email,FILTER_SANITIZE_EMAIL);



//    var_dump(filter_var($result,FILTER_VALIDATE_EMAIL));



// $email = "test(.D)@yahoo.com";

//        $result =  filter_var($email,FILTER_SANITIZE_EMAIL);

//    var_dump(filter_var($result,FILTER_VALIDATE_EMAIL));

//    //test.D@yahoo.com


    //   $url = "https://www.w3schoo��ls.co�m";

    //    $f_url =   filter_var($url,FILTER_SANITIZE_URL);
      
    //    var_dump(filter_var($f_url,FILTER_VALIDATE_URL));


//     $text = "<h1>test</h1>";

//    // &lt;  h1    &gt;    test     &lt;   /h1     &gt;
      
//    echo  htmlspecialchars($text);
    
    
//      echo   filter_var($text,FILTER_SANITIZE_STRING);



//    $txt = "test                    test   ";

//      echo strlen(trim($txt));

//     echo  stripcslashes("\m\\mmm");


// $test="<h1>test</h1>";

// echo htmlspecialchars($test).'<br>';
// var_dump(filter_var($test,FILTER_SANITIZE_STRING));


$txt="khadija                    khadija";

// echo strlen(trim($txt));

echo stripcslashes("khadija");



?>