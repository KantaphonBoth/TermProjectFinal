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
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800,900" rel="stylesheet">
	<!-- Bootstrap css -->
	<link href="css/bootstrap.css" rel="stylesheet" media="screen">
	<!-- Font Awesome Icon font css -->
	<link href="css/fontawesome-all.css" rel="stylesheet">
	<!-- Flaticon Icon font css -->
	<link href="css/flaticon.css" rel="stylesheet">
	<!-- Swiper's CSS -->
	<link rel="stylesheet" href="css/swiper.min.css">
	<!-- SlickNav Menu css -->
	<link href="css/slicknav.css" rel="stylesheet" media="screen">
	<!-- Main custom css -->
	<link href="css/custom.css" rel="stylesheet" media="screen">
    <link href="css/responsive.css" rel="stylesheet" media="screen">
    <link href="css/style.css" rel="stylesheet"  media="screen">
    
</head>
<body data-spy="scroll" data-target="#navigation" data-offset="63">


    <div class="preloader">
		<div class="loader"></div>
    </div>
    
    <header class="header-default">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="logo">
						<a class="navbar-brand" href="coffee.php">
							<img src="images/logo.png" alt="" />
						</a>
					</div>
				</div>
			</div>
		</div>
    </header>
    
    <div class="main-navigation" id="main-navbar">
		<div class="menu-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<nav class="navbar navbar-expand-md navbar-light" id="navigation">
							<ul class="navbar-nav mx-auto" id="main-menu">
								<li class="nav-item"><a class="nav-link " href="coffee.php">Home</a></li>
								<li class="nav-item"><a class="nav-link " href="coffee.php">Menu</a></li>
								<li class="nav-item"><a class="nav-link active" href="#cart">Service</a></li>
								<li class="nav-item"><a class="nav-link " href="myorder.php">My Oder</a></li>
							</ul>
							
							<div class="navbar-toggle"><span>Menu</span></div>
							<div id="responsive-menu"></div>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
   
<div class="home-slider-section" id="home">
		<div class="container-fluid">
			<div class="row no-gutter">
				<div class="col-md-12">
					<div class="swiper-container home-slider">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								<div class="home-slide" style="background-image: url(images/55.jpg);">
									<div class="home-slide-content">
										<h3>Hello Everyone!</h3>
										<h2>This is the COFFEE Shop, It's online website, If you find coffee shop online
										<br />
									that right to be here!</h2>
									</div>
								</div>
							</div>
							
							<div class="swiper-slide">
								<div class="home-slide" style="background-image: url(images/56.jpg);">
									<div class="home-slide-content">
										<h3>Hello Everyone!</h3>
										<h2>This is the COFFEE Shop, It's online website, If you find coffee shop online
										<br />
									that right to be here!</h2>
									</div>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="home-slide" style="background-image: url(images/57.jpg);">
									<div class="home-slide-content">
										<h3>Hello Everyone!</h3>
										<h2>This is the COFFEE Shop, It's online website, If you find coffee shop online
										<br />
									that right to be here!</h2>
									</div>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="home-slide" style="background-image: url(images/59.jpg);">
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

</section>    
    <section style="background-image: url(img/e.jpg)">
            <div>
    <br>
        <h5 style="text-align:center;" id="cart">Add Coffee</h5>

</div>
    <div class="row">
        <?php

        $dbhost = 'localhost';
        $dbuser = 'test';
        $dbpass = '123456789';
        $dbname = 'test';
        $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

        $sql = "SELECT * FROM products";
        $sql_run = mysqli_query($conn, $sql);
        
        while($product = mysqli_fetch_object($sql_run)) 
        {?>
        <div class="col-md-4">
            <form method="post" action="myorder.php?ProductID=<?php echo $product->ProductID; ?>&action=add">
                <div style="border:25px solid #333; background-color:#f1f1f1; border-radius:25px; padding:50px;" align="center">
                    <h6><?php echo $product->ProductID; ?></h6>
                    <img src="menu/<?php echo $product->image;?>" class="img-responsive" style="width:300px;height:300px;" /><br />
                    <h4><?php echo $product->ProductName; ?></h4>
                    <h4><?php echo $product->Price; ?></h4>
                    <input type="submit" value="Buy" style="margin-top:5px;" class="btn btn-success"></input>
                </div>
                <br>
            </form>
        </div>
            <?php } ?>
            
    </div>
    </section>
    <footer>
        <p>Coffee Shop &copy;  | CPE04 Group2 </p>
    </footer>
    
</body>
</html> 