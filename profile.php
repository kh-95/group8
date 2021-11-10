<?php
session_start();


echo 'Name :'. $_SESSION['name'].'<br>'.'Email :'.$_SESSION['email'].'<br>'.'Password :'.$_SESSION['password'].
'<br>'.'Address :'.$_SESSION['address'].'<br>'.'Gender :'.$_SESSION['gender'].'<br>'.'Linkedinurl :'.$_SESSION['linkedin'].'<br>'.
'Image :'.$_SESSION['image'];





?>