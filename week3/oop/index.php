<?php 



//user name , email ,password [login(),register(),addArticale()]



 class users{

   var  $name;
   var  $email ;
   var  $password;




     function __construct($name_val,$email_val,$password_val){
        
          $this->name     = $name_val;
          $this->password = $password_val;
          $this->email    = $email_val;


     }
      

  function setName($val){

    $this->name=$val;
  }



     function getName(){

        return  [ $this->name , $this->password];
     }



      function login($message){
         echo 'Login Function'.$message;
     }

     function Register(){
         echo 'Register Function';
     }




   function __destruct(){
      echo "end of class";
   }

 }


 $obj = new users("Ali","ali@yahoo.com","123Tech");
 $obj->getName();


 $obj->login("Obj1");
   $obj->setName("Root");
   $obj->getName();
   
 echo '<br>';

 $obj2 = new users("khadija","khadeagas@gmail.com","123");
 $obj2->login("Obj2");
$obj2->setName("Root");
$obj2->getName();



 var_dump($obj2);



?>


interface                                    abstract
implements                                  extends
incomplete-function                       incomplete-function
create object                             cant create object
public access modifier only              public - private -protected
implementation function to use it        implementation function to use it
no properties                                  may be there is properties
construct method - destruct                               there is no construct method or destruct
support multi inhertance                        not support multi inherance


