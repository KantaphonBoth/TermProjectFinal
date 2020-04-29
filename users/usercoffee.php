<?php require_once('Header.php'); ?>

    
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