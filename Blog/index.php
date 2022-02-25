<?php

require "./helpers/dbConnection.php";


?>

<!DOCTYPE html>
<html lang="en">

<?php

require "./layouts/header.php";

require "./layouts/nav.php";

?>



<!--page title start-->

<section class="page-title o-hidden text-center grey-bg bg-contain animatedBackground" data-bg-img="images/pattern/05.png">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-12">
        <h1 class="title">Blog Grid 2</h1>
        <nav aria-label="breadcrumb" class="page-breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index-2.html">Home</a>
            </li>
            <li class="breadcrumb-item"><a href="#">Blog</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Blog Grid 2</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <div class="page-title-pattern"><img class="img-fluid" src="images/bg/06.png" alt=""></div>
</section>

<!--page title end-->


<!--body content start-->

<div class="page-content">

<!--blog start-->



<section>
  <div class="container">




    <div class="row">
    <?php 

$sql = "select blogs.* , categories.title as cat_title , users.name , users.image as user_image from blogs inner join categories 
on blogs.cat_id = categories.id inner join   users on  blogs.addedBy = users.id  ";
 $op  = mysqli_query($con,$sql);


 while($data=mysqli_fetch_assoc($op)) {



?>
      <div class="col-lg-6 col-md-6">
        <div class="post">
          <div class="post-image">
            <img class="img-fluid h-100 w-100" src="../week3/Articale/uploads/<?php echo $data['image'];?>"  alt="">
          </div>
          <div class="post-desc">
            <div class="post-date">23 <span> <?php echo date ('d-y-m',$data['date']); ?></span>
            </div>
            <div class="post-title">
              <h5><a href="blog-details.html"><?php echo $data['cat_title']; ?></a></h5>
            </div>
            <p><?php echo $data['content']; ?></p>
            <div class="post-author">
              <div class="post-author-img">
                <img  src="../week3/Users/uploads/<?php echo $data['user_image'];?>" alt="">
              </div> <span><?php echo $data['name']; ?></span>
            </div>
          </div>
        </div>
      </div>
    
     <?php } ?>
     
     
    </div>
  </div>
</section>

<!--blog end-->


<!--counter start-->

<section class="grey-bg">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-6">
        <div class="counter style-2">
          <img class="img-center" src="images/counter/01.png" alt=""> <span class="count-number" data-to="2304" data-speed="10000">2304</span>
          <h5>Project Done</h5>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-6 xs-mt-5">
        <div class="counter style-2">
          <img class="img-center" src="images/counter/02.png" alt=""> <span class="count-number" data-to="2304" data-speed="10000">2304</span>
          <h5>Success Rate</h5>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-6 sm-mt-5">
        <div class="counter style-2">
          <img class="img-center" src="images/counter/03.png" alt=""> <span class="count-number" data-to="2304" data-speed="10000">2304</span>
          <h5>Awards</h5>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-6 sm-mt-5">
        <div class="counter style-2">
          <img class="img-center" src="images/counter/04.png" alt=""> <span class="count-number" data-to="2304" data-speed="10000">2304</span>
          <h5>Happy Client</h5>
        </div>
      </div>
    </div>
  </div>
</section>

<!--counter end-->


<!--client logo start-->

<section>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="ht-clients d-flex flex-wrap align-items-center text-center">
          <div class="clients-logo">
            <img class="img-center" src="images/client/07.png" alt="">
          </div>
          <div class="clients-logo">
            <img class="img-center" src="images/client/08.png" alt="">
          </div>
          <div class="clients-logo">
            <img class="img-center" src="images/client/09.png" alt="">
          </div>
          <div class="clients-logo">
            <img class="img-center" src="images/client/10.png" alt="">
          </div>
          <div class="clients-logo">
            <img class="img-center" src="images/client/11.png" alt="">
          </div>
          <div class="clients-logo">
            <img class="img-center" src="images/client/12.png" alt="">
          </div>
          <div class="clients-logo">
            <img class="img-center" src="images/client/12.png" alt="">
          </div>
          <div class="clients-logo">
            <img class="img-center" src="images/client/12.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!--client logo end-->

</div>

<!--body content end--> 

<?php

require "./layouts/footer.php";


?>


</div>

<!-- page wrapper end -->


<!--back-to-top start-->

<div class="scroll-top"><a class="smoothscroll" href="#top"><i class="flaticon-upload"></i></a></div>

<!--back-to-top end-->

 
<!-- inject js start -->

<!--== jquery -->
<script src="js/jquery.min.js"></script>

<!--== popper -->
<script src="js/popper.min.js"></script>

<!--== bootstrap -->
<script src="js/bootstrap.min.js"></script>

<!--== appear -->
<script src="js/jquery.appear.js"></script> 

<!--== modernizr -->
<script src="js/modernizr.js"></script> 

<!--== audioplayer -->
<script src="js/audioplayer/plyr.min.js"></script>

<!--== magnific-popup -->
<script src="js/magnific-popup/jquery.magnific-popup.min.js"></script> 

<!--== owl-carousel -->
<script src="js/owl-carousel/owl.carousel.min.js"></script> 

<!--== counter -->
<script src="js/counter/counter.js"></script> 

<!--== countdown -->
<script src="js/countdown/jquery.countdown.min.js"></script> 

<!--== isotope -->
<script src="js/isotope/isotope.pkgd.min.js"></script> 

<!--== mouse-parallax -->
<script src="js/mouse-parallax/tweenmax.min.js"></script>
<script src="js/mouse-parallax/jquery-parallax.js"></script> 

<!--== contact-form -->
<script src="js/contact-form/contact-form.js"></script>

<!--== wow -->
<script src="js/wow.min.js"></script>

<!--== theme-script -->
<script src="js/theme-script.js"></script>

<!-- inject js end -->

</body>


<!-- Mirrored from themeht.com/loptus/html/blog-grid-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 14 Jun 2020 12:21:01 GMT -->
</html>







