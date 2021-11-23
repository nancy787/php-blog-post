<?php require_once("includephpfiles/DB.php");?>
<?php require_once("includephpfiles/function.php");?>
<?php require_once("includephpfiles/session.php");?>
<?php
if(isset($_POST["Submit"]))
{
    $Category=$_POST["CategoryTitle"];
    $Admin="Nancy";
   // date_default_timezone_set("Asia/India");
    $CurrentTime=time();
    $DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
    echo $DateTime;
    if(empty($Category))
    {
      $_SESSION["ErrorMessage"]= "ALL Field Must Be Filled Out";
       Redirect_to("categories.php");
    }
    elseif(strlen($Category)<=3)
    {
        $_SESSION["ErrorMessage"]= "Categeory title muust be grteated than 3 Characters";
       Redirect_to("categories.php");
    }
    elseif(strlen($Category)>49)
    {
        $_SESSION["ErrorMessage"]= "Categeory title muust be less than 50 Characters";
       Redirect_to("categories.php");
    }
    else
    {
        //query to insert category in our database
        $sql="INSERT INTO category(title,author,datestime)VALUES (:categoryName,:adminName,:DatesTime)";
        $stmt = $ConnectingDB->prepare($sql); //pdo object notation
        $stmt->bindValue(':categoryName',$Category);
        $stmt->bindValue(':adminName',$Admin);
        $stmt->bindValue(':DatesTime',$DateTime);
        $Execute=$stmt->execute();
        if($Execute)
        {
           
            $_SESSION["SuccessMessage"]="Category Added Successfully";
            header("Basic.html");
           
        }
        else
        {
            $_SESSION["ErrorMessage"]="OOPS Something Went Wrong.Try Again!";
            Redirect_to("categories.php");
        }

        }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"content ="width-device-width ,initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <title>categories</title>
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
                 <div class="col-md-12">
                     <h1><i class="fas fa-edit"style="color: turquoise;;"></i>MANAGE CATEGORIES</h1>
                    
                 </div>
             </div>
             
         </div>
        </header>
         <!-- header end -->

         <!-- main area -->
        <section class="container py-2 mb-4">
            <div class="row">
            <div class="offset-lg-1 col-lg-10" style="min-height:400px;" >
            <?php
             echo ErrorMessage();
                    echo SuccessMessage();
            ?>
            <form class=" " action="categories.php" method="post">
                <div class="card bg-secondary text-light mb-3">
                         <div class="card-header">
                             <h1>Add New Categories</h1>
                         </div>
                         <div class="card-body bg-dark"> 
                             <div class="form-group">
                                 <label for="title"><span class="FieldInfo">Category Title</span></label>
                               <input class="form-control" type="text" name="CategoryTitle" id="title"  placeholder="Type Title Here" value="">
                             </div>
                             <div class="row mb-2 ">
                             <div class="col-lg-6">
                                 <a href="dashboard.php" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"></i>Back To Dashboard</a>
                            </div>
                            <div class="col-lg-6 mb-2">
                            <button type="submit" name="Submit" class="btn btn-success btn-block">
                            <i class="fas fa-check"></i>Publish</button>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </form> 
        </div>
     </div>

        </section>
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