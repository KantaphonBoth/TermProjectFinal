<?php require_once('header.php'); ?>
    
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
								<li class="nav-item"><a class="nav-link" href="sum.php">Sales summary</a></li>
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
    
	<?php require_once('footer.php'); ?>