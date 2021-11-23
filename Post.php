<?php require_once("includephpfiles/DB.php");?>
<?php require_once("includephpfiles/function.php");?>
<?php require_once("includephpfiles/session.php");?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"content ="width-device-width ,initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <title>Posts</title>
    </head>
    
   
    <body>
        
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
          <!-- navbar -->
        <div style="height: 10px ; background-color: turquoise;"></div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container" >
                <a href="#" class="navbar-brand text-warning"><i class="far fa-hand-spock"></i>BIGOLLI.COM</a>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarcollapseCMS">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarcollapseCMS">  
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="MyProfile.php" class="nav-link text-success"><i class="fas fa-user text-success"></i>MY PROFILE</a>
                    </li>
                    <li class="nav-item">
                        <a href="Dashboard.php" class="nav-link "><i class="fas fa-tachometer-alt"></i>DASHBOARD</a>
                    </li>
                    <li class="nav-item">
                        <a href="Post.php" class="nav-link "><i class="fas fa-mail-bulk"></i>POSTS</a>
                    </li>
                    <li class="nav-item">
                        <a href="Categories.php" class="nav-link "><i class="fas fa-bars"></i>CATEGORIES</a>
                    </li>
                    <li class="nav-item">
                        <a href="Admin.php" class="nav-link "><i class="fas fa-user-shield"></i>ADMIN</a>
                    </li>
                    <li class="nav-item">
                        <a href="Comments.php" class="nav-link "><i class="fas fa-comment"></i>COMMENTS</a>
                    </li>
                    <li class="nav-item">
                        <a href="LiveBlog.php?page=1" class="nav-link "><i class="far fa-plus-square"></i></i>LIVE BLOG</a>
                    </li>
                </ul>
               
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item "><a href="Logout.php" class="nav-link text-danger"><i class="fas fa-user-times text-danger"></i>LOGOUT</a></li>
                </ul>
                </div>
           
        </div>

         </nav>
         <div style="height: 10px ; background-color: turquoise;"></div>
         <!-- navbar end -->
         <!-- header -->
         <header class="bg-dark text-white py-3">
         <div class="container">
             <div class="row">
                 <div class="col-md-12 mb-2">
                     <h1><i class="fas fa-blog"style="color: turquoise;;"></i>BLOG POSTS</h1>
                 </div>
                 <div class="col-lg-3 mb-2">
                     <a href="AddNewPost.php" class="btn btn-primary btn-block">
                         <i class="fas fa-edit"></i> Add New Post</a>

                 </div>
                 <div class="col-lg-3 mb-2">
                     <a href="categories.php" class="btn btn-info btn-block">
                         <i class="fas fa-folder-plus"></i> Add New Category</a>

                 </div>
                 <div class="col-lg-3 mb-2">
                     <a href="admin.php" class="btn btn-warning btn-block">
                         <i class="fas fa-user-plus"></i> Add New Admin</a>

                 </div>
                 <div class="col-lg-3">
                     <a href="comment.php" class="btn btn-success btn-block">
                         <i class="fas fa-check"></i> Approve Comments</a>

                 </div>

             </div>
             
         </div>
        </header>
         <!-- header end -->
         <!-- main area -->

            <section class="container py-2 mb-4">
                <div class="row">
                    <div class="col-lg-12">

                        <table class="table table-dark table-hover table-responsive">
                            <thead class="thead-dark">
                            <tr>
                                <th class="table-danger">#</th>
                                <th>Title</th>
                                <th>Date&Time</th>
                                <th>Category</th>
                                
                                <th>Author</th>
                                <th>Banner</th>
                                <th>Comments</th>
                                <th>Action</th>
                                <th>Live Preview</th>
                            </tr>
                            </thead>
                        <?php
                        $ConnectingDB;
                        $sql="SELECT * FROM post";
                        $stmt=$ConnectingDB->query($sql);
                        $sr=0;
                        while($DataRows=$stmt->fetch())
                        {
                                $ID=$DataRows["id"];
                                $DateTime=$DataRows["dates"];
                    
                                $POSTTITLE=$DataRows["posttitle"];
                                $CATEGORY=$DataRows["category"];
                                $Admin=$DataRows["author"];
                                $IMAGE=$DataRows["images"];
                                $POSTTEXT=$DataRows["posts"];
                                $sr++;
                        ?>
                        <tbody>
                        <tr>
                            <td><?php echo $sr ;?></td>
                            <td >
                                <?php 
                                if(strlen($POSTTITLE)>20){
                                    $POSTTITLE=substr($POSTTITLE,0,20).'....';}
                                     echo $POSTTITLE; 
                                
                                ?>
                               
                            </td>
                            
                            <td>
                            <?php 
                                if(strlen($DateTime)>8){
                                    $DateTime=substr($DateTime,0,8).'....';}
                                     echo $DateTime; 
                                
                                ?>
                        </td>
                            <td >
                                <?php 
                                if(strlen($CATEGORY)>11){
                                    $CATEGORY=substr($CATEGORY,0,11).'....';}
                                     echo $CATEGORY; 
                                
                                ?>
                               
                            </td>
                            <td >
                                <?php 
                                if(strlen($Admin)>6){
                                    $Admin=substr($Admin,0,6).'....';}
                                     echo $Admin; 
                                
                                ?>
                           
                            <td><img src="upload/<?php echo $IMAGE;?>" width="170px; height=50px;"</td>
                            <td>Comments</td>
                            <td >
                                <a href="#"><span class="btn btn-warning">Edit</span></a>
                            <a href="#"><span class="btn btn-danger">Delete</span></a>
                        </td>
                            <td>
                           <a href="#"><span class="btn btn-primary">Preview</span></a>
                            </td>
                            
                        </tr>
                        </tbody>
                        <?php } ?>
                        </table>
                </div>
            </div>

            </section>

         <!-- declosing main area -->
         <!-- footer  -->
         <footer class="bg-dark text-white">
             <div class="row">
             <div class="col">
                <p class="lead text-center">THEME BY |NANCY BHAGAT|&copy;---------ALL RIGHT RESERVED.</p>
                <p class="text-center small"><a style="color: white; text-decoration: none; cursor:pointer ; "href="www.udemy.com"></style>
                </a>This site is only for learning purose of php.</p>
             </div>
            </div>
         </footer>
         <div style="height: 10px ; background-color: turquoise;"></div>
         <!-- footer end -->
         <script>
            $('#year').text(new Date().getFullYear());
        </script>
    </body>
</html>