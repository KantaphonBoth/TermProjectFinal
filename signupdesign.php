<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>COFFEE Shop</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <link rel="icon" href="favicon.ico" type="image/x-icon" />     
    <link href="https://fonts.googleapis.com/css?family=Chonburi&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css3/myorder.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800,900" rel="stylesheet">
	<!-- Bootstrap css -->
	<link href="css/bootstrap.css" rel="stylesheet" media="screen">
	<!-- Font Awesome Icon font css -->
	<link href="css/fontawesome-all.css" rel="stylesheet">
	<!-- Flaticon Icon font css -->
	<link href="css/flaticon.css" rel="stylesheet">
	<!-- Swiper's CSS -->
	<link rel="stylesheet" href="../css/swiper.min.css">
	<!-- SlickNav Menu css -->
	<link href="css/slicknav.css" rel="stylesheet" media="screen">
	<!-- Main custom css -->
	<link href="css/custom.css" rel="stylesheet" media="screen">
    <link href="css/responsive.css" rel="stylesheet" media="screen">
    <link href="css/style.css" rel="stylesheet"  media="screen">
    
</head>

<style>
body {
  background-image: url('img/22.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
</style>

<body>
<div class="preloader">
		<div class="loader"></div>
    </div>
    
    <nav class="navbar navbar-expand-sm navbar-dark bg-white">
        <div class="container">
        <a class="navbar-brand" href="index.php">
							<img src="images/logo.png" alt="" />
						</a>

            <div class="collapse navbar-collapse">
                <ul class="nav navbar ml-auto">

                
                <?php 

                if(isset($_SESSION['U_D']))
                {
                    echo    '<form action="../logout.php" method="POST">
                                <h2>'.$_SESSION['FName'].' '.$_SESSION['LName'].'</h2>
                                <li class="nav-item"><button type="submit" name="logout" class="btn btn-light">Logout</button></li>
                            </form>';
                }
                else
                {
                    echo '  <li class="nav-item"><a href="logindesign.php" class="btn btn-light ">Login</a></li>
                    <li class="nav-item"><a href="signupdesign.php" class="btn btn-light ml-3">Sign Up</a></li>';
                }

                ?>
                  
                </ul>
            </div>                

        </div>
    </nav>

     <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card bg-light mt-5">

                    <div class="card-title alert-dark text-white mt-5">
                        <h3 class="text-center py-2">Signup Form</h3>
                    </div>

                    <!--Display Empty Fiels-->
                    <?php 
                    
                        if(isset($_GET['empty']))
                        {
                            $Message=$_GET['empty'];
                            $Message=" Please Fill in the Blanks ";
                    ?>
                         <div class="alert alert-danger text-center"><?php echo $Message?></div>   
                    <?php                            
                        }
                    
                    ?>


                     <!--Invalid Character-->
                    <?php 
                    
                        if(isset($_GET['Invalid']))
                        {
                            $Message=$_GET['Invalid'];
                            $Message=" Invalid Characters ";
                    ?>
                         <div class="alert alert-danger text-center"><?php echo $Message?></div>   
                    <?php                            
                        }
                    
                    ?>


                      <!--Invalid Email-->
                    <?php 
                    
                        if(isset($_GET['VEmail']))
                        {
                            $Message=$_GET['VEmail'];
                            $Message=" Invalid Email ";
                    ?>
                         <div class="alert alert-danger text-center"><?php echo $Message?></div>   
                    <?php                            
                        }
                    
                    ?>


                      <!--User Invalid-->
                    <?php 
                    
                        if(isset($_GET['User']))
                        {
                            $Message=$_GET['User'];
                            $Message=" User Already Taken ";
                    ?>
                         <div class="alert alert-danger text-center"><?php echo $Message?></div>   
                    <?php                            
                        }
                    
                    ?>


                       <!--User Invalid-->
                    <?php 
                    
                        if(isset($_GET['Email']))
                        {
                            $Message=$_GET['Email'];
                            $Message=" Email Already Taken ";
                    ?>
                         <div class="alert alert-danger text-center"><?php echo $Message?></div>   
                    <?php                            
                        }
                    
                    ?>


                      <?php 
                    
                        if(isset($_GET['success']))
                        {
                            $Message=$_GET['success'];
                            $Message="  You Have Successfully Signed Up ";
                    ?>
                         <div class="alert alert-success text-center"><?php echo $Message?></div>   
                    <?php                            
                        }
                    
                    ?>


                    <div class="card-body">

                        <form action="signup.php" method="POST">
                            <input type="text" name="FName" placeholder="First Name" class="form-control my-2">
                            <input type="text" name="LName" placeholder="Last Name" class="form-control my-2">
                            <input type="text" name="Email" placeholder="Email" class="form-control my-2">
                            <input type="text" name="phone" placeholder="phone number" class="form-control my-2">
                            <input type="text" name="UserName" placeholder="User Name" class="form-control my-2">
                            
                            <input type="password" name="password" placeholder="Password " class="form-control mb-3">
                            <button class="btn btn-secondary" name="signup" class="pt-3">Signup</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery-1.12.4.min.js"></script>
	<!-- Bootstrap js file -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Swiper Carousel js file -->
	<script src="js/swiper.min.js"></script>
	<!-- SlickNav js file -->
	<script src="js/jquery.slicknav.js"></script>
	<!-- Smooth Scroll js file -->
	<script src="js/SmoothScroll.js"></script>
    <script src="js/function.js"></script>	

   
    
</body>
</html>