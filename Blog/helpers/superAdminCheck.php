<?php 

if($_SESSION['user']['role_id'] != 4){

    header("Location: ".url('index.php'));
}


?>