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
        <title>FULL POST</title>
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
                        <a href="Blog.php" class="nav-link "><i class="fas fa-home"></i>HOME</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link "><i class="fas fa-mail-bulk"></i>ABOUTUS</a>
                    </li>
                    <li class="nav-item">
                        <a href="Blog.php" class="nav-link "><i class="fas fa-bars"></i>Blog</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link "><i class="fas fa-user-call"></i>CONTACT US</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link "><i class="fas fa-comment"></i>FEATURES</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link  "><i class="fas fa-star text-warning"></i>RATE US</a>
                    </li>
                   
                </ul>
               
                <ul class="navbar-nav mr-auto">
                  <form class=" form-inline d-none d-sm-block" action=" Blog.php" >
                   <div class="form-group">
                  
                  <input class="form-control mr-2 "type="text" name="Search"placeholder="Search Here" value ="">
                  <button class="btn btn-primary" name="SearchButton"><i class="fas fa-search"></i></button>
                
                  </div>
                  </form>
                </ul>
                </div>
           
        </div>

         </nav>
         <div style="height: 10px ; background-color: turquoise;"></div>
         <!-- navbar end -->
         <!-- header -->
          <div class="container">
            <div class="row mt-4">
              <!-- main area start -->

            <div class="col-sm-8 " >
              <h1 >The Complete Responsive CMS Blog  </h1>
              <h1 class="lead"> the complete cms php project</h1>
              <?php
              global $ConnectingDB;
              if(isset($_GET["SearchButton"]))
              {
                    $Search=$_GET["Search"];//Search query for buttonn
                    $sql="SELECT * FROM post  
                    WHERE dates LIKE :search
                    OR posttitle LIKE :search
                    OR category LIKe :search
                     OR posts like :search";
                    $stmt=$ConnectingDB->prepare($sql);
                    $stmt->bindValue(':search','%'.$Search.'%');
                    $stmt->execute();

              }
              
             else 
             { 
             $PostIdFromUrl=$_GET["id"];
              $sql="SELECT * from post where id ='$PostIdFromUrl'";
              $stmt=$ConnectingDB->query($sql);
             }
              while ($DataRows=$stmt->fetch())
              {
                  $PostId=$DataRows["id"];
                  $DateTime=$DataRows["dates"];
                  $PostTitle=$DataRows["posttitle"];
                  $Category=$DataRows["category"];
                  $Admin=$DataRows["author"];
                  $Images=$DataRows["images"];
                  $Posts=$DataRows["posts"];
             ?>
             <!-- note make a prasctice to use htmentities function to every echo statemenrt so thet it wonts bresk html syntax -->
             <div class="card">
                 <img src="upload/<?php echo htmlentities($Images);?>"style="max-height-450px;" class="img-fluid card-img-top"/>
                <div class="card-body">
                    <h4 class="card-title"><?php echo htmlentities($PostTitle);?></h4>
                    <small class="text-muted"> Written by <?php echo htmlentities($Admin);?> On <?php echo  htmlentities($DateTime);?></small>
                    <span style="float:right;" class="badge badge-dark text-light">comments 100 </span>
                    <hr>
                    <p class="card-text">
                        <?php 
                        {
                            
                           echo $Posts;    }
                        ?></p>
                   
                </div>
             </div>
              <?php }?>
            </div>

            <!-- main area end -->
            <div class="col-sm-4" style="min-height:40px; background:green;"> 

            </div>
            
            </div>

          </div>
         <!-- header end -->
         <br>
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