
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
	<link href="../css/bootstrap.css" rel="stylesheet" media="screen">
	<!-- Font Awesome Icon font css -->
	<link href="../css/fontawesome-all.css" rel="stylesheet">
	<!-- Flaticon Icon font css -->
	<link href="../css/flaticon.css" rel="stylesheet">
	<!-- Swiper's CSS -->
	<link rel="stylesheet" href="../css/swiper.min.css">
	<!-- SlickNav Menu css -->
	<link href="../css/slicknav.css" rel="stylesheet" media="screen">
	<!-- Main custom css -->
	<link href="../css/custom.css" rel="stylesheet" media="screen">
    <link href="../css/responsive.css" rel="stylesheet" media="screen">
    <link href="../css/style.css" rel="stylesheet"  media="screen">
    
</head>
<style>
	body {
		background: #D0CECA;
	}
</style>


<body >
<div class="preloader">
		<div class="loader"></div>
    </div>
    
    <nav class="navbar navbar-expand-sm navbar-dark bg-white">
        <div class="container">
        <a class="navbar-brand" href="index.php">
							<img src="../images/logo.png" alt="" />
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

    
    <!-- Preloader Starts -->
	<!-- <div class="preloader">
		<div class="loader"></div>
	</div> -->
	<!-- Preloader Ends -->
	
	<!-- Header Section Starts -->
	<!-- <header class="header-default">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="logo">
						<a class="navbar-brand" href="#">
							<img src="images/logo.png" alt="" />
						</a>
					</div>
				</div>
			</div>
		</div>
	</header> -->
	<!-- Header Section ends-->
	
	<!-- Navigation Starts -->
	<div class="main-navigation" id="main-navbar">
		<div class="menu-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<nav class="navbar navbar-expand-md navbar-light" id="navigation">
							<ul class="navbar-nav mx-auto" id="main-menu">
								<li class="nav-item"><a class="nav-link active" href="#home">Home</a></li>
								<li class="nav-item"><a class="nav-link" href="#menu">Menu</a></li>
								<li class="nav-item"><a class="nav-link " href="userservice.php">Service</a></li>
								<li class="nav-item"><a class="nav-link" href="usermyorder.php">My Oder</a></li>
								<li class="nav-item"><a class="nav-link" href="usersum.php">Sales summary</a></li>
							
							</ul>	
							<div class="navbar-toggle"><span>Menu</span></div>
							<div id="responsive-menu"></div>
						</nav>
					</div>
				</div>
			</div>
		</div>
</div>			
							
								
							

	<!-- Navigation Ends -->
	
	<!-- Home Slider Section Starts -->
	<div class="home-slider-section" id="home">
		<div class="container-fluid">
			<div class="row no-gutter">
				<div class="col-md-12">
					<div class="swiper-container home-slider">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								<div class="home-slide" style="background-image: url(../images/55.jpg);">
									<div class="home-slide-content">
										<h3>Hello Everyone!</h3>
										<h2>This is the COFFEE Shop, It's online website, If you find coffee shop online
										<br />
									that right to be here!</h2>
									</div>
								</div>
							</div>
							
							<div class="swiper-slide">
								<div class="home-slide" style="background-image: url(../images/56.jpg);">
									<div class="home-slide-content">
										<h3>Hello Everyone!</h3>
										<h2>This is the COFFEE Shop, It's online website, If you find coffee shop online
										<br />
									that right to be here!</h2>
									</div>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="home-slide" style="background-image: url(../images/57.jpg);">
									<div class="home-slide-content">
										<h3>Hello Everyone!</h3>
										<h2>This is the COFFEE Shop, It's online website, If you find coffee shop online
										<br />
									that right to be here!</h2>
									</div>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="home-slide" style="background-image: url(../images/59.jpg);">
									<div class="home-slide-content">
										<h3>Hello Everyone!</h3>
										<h2>This is the COFFEE Shop, It's online website, If you find coffee shop online
										<br />
									that right to be here!</h2>
									</div>
								</div>
							</div>
						</div>
						
						<div class="home-slider-prev"><i class="fa fa-angle-left"></i></div>
						<div class="home-slider-next"><i class="fa fa-angle-right"></i></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<section class="info0" id="menu">
        <div class="container">
            <div class="info0_area">
                
                <div class="info0_text">
                    <h1>Menu</h1>
                    <p></p>
                </div>
            </div>
        </div>
    </section>

    <section class="info1">
        <div class="container">
            <div class="info1_area">
                
                <div class="info1_text">
                    <h1></h1>
                    <p></p>
                </div>
            </div>
        </div>
	</section>
	
	<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '123456789';
$dbname = 'final';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

$sql = "SELECT * FROM users";
$sql_run = mysqli_query($conn, $sql);
?>

<div>
	<h3 align="center">USER ALL</h3>
<table class="table table-dark table-striped" cellpadding="2" cellspacing="2" border="0">
    <tr>
        <th>Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
    </tr>
    <?php while($users = mysqli_fetch_object($sql_run)) {?>
        <tr>
            <td><?php echo $users->ID; ?></td>
            <td><?php echo $users->FName; ?></td>
			<td><?php echo $users->LName; ?></td>
			<td><?php echo $users->Email; ?></td>
        </tr>
    <?php } ?>
</table>
</div>



	<footer>
        <p>Coffee Shop &copy;  | CPE04 Group2 </p>
	</footer>
	
	<?php require_once('footer.php'); ?>