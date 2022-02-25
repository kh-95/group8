<?php 
 
 require '../helpers/dbConnection.php';
 require '../helpers/functions.php';
 

 $sql = "select blogs.* , categories.title as cat_title , users.name from blogs inner join categories 
         on blogs.cat_id = categories.id inner join   users on  blogs.addedBy = users.id  ";
 $op  = mysqli_query($con,$sql);




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
                $text = "Display Artricales";
               printMessage($text);
                ?>
            </li> 
            

                        </ol>
                       

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                List Articales
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Content</th>
                                                <th>date</th>
                                                <th>category</th>
                                                <th>Image</th>
                                                <th>Added By</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Content</th>
                                                <th>date</th>
                                                <th>category</th>
                                                <th>Image</th>
                                                <th>Added By</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                          
                                        
                             <?php  
                             
                                while($data = mysqli_fetch_assoc($op)){
                             
                             ?>           
                                            <tr>
                                                <td><?php echo $data['id'];?></td>
                                                <td><?php echo $data['title']?></td>
                                                <td><?php echo substr($data['content'],0,30)?></td>
                                                <td><?php echo date('Y/M/d',$data['date']);?></td>
                                                <td><?php echo $data['cat_title']?></td>
                                                <td><img src="./uploads/<?php echo $data['image']?>" width="50px"> </td>
                                                <td><?php echo $data['name'];?></td>
                                                <td>
                                                <a href='delete.php?id=<?php echo $data['id'];?>' class='btn btn-danger m-r-1em'>Delete</a>
                                                <a href='edit.php?id=<?php echo $data['id'];?>' class='btn btn-primary m-r-1em'>Edit</a>       
                                               </td>
                                            </tr>
                            <?php } ?>             

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
              

<?php 

 require '../layouts/footer.php';

?>