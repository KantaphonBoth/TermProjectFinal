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
	<link rel="stylesheet" href="css/swiper.min.css">
	<!-- SlickNav Menu css -->
	<link href="css/slicknav.css" rel="stylesheet" media="screen">
	<!-- Main custom css -->
	<link href="css/custom.css" rel="stylesheet" media="screen">
    <link href="css/responsive.css" rel="stylesheet" media="screen">
    <link href="css/style.css" rel="stylesheet"  media="screen">
    
</head>
<body >

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
								<li class="nav-item"><a class="nav-link " href="service.php">Service</a></li>
								<li class="nav-item"><a class="nav-link active" href="myorder.php">My Oder</a></li>
							</ul>
						</nav>
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
<div>
        <h5 style="text-align:center;">Add Coffee</h5>
            <div >
                <?php
                    session_start();

                    $dbhost = 'localhost';
                    $dbuser = 'test';
                    $dbpass = '123456789';
                    $dbname = 'test';
                    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

                    require 'item.php';

                    $id=$_GET['ProductID'];
                    if(isset ($_GET['ProductID']) && !isset($_POST['saveupdate'])){
                        $sql = "SELECT * FROM products where ProductID=";
                        $sql_run = mysqli_query($conn, $sql.$id);
                        $product = mysqli_fetch_object($sql_run);
                        $item = new Item();
                        $item->ProductID = $product->ProductID;
                        $item->image = $product->image;
                        $item->ProductName = $product->ProductName;
                        $item->Price = $product->Price;
                        $item->quantity = 1;

                        $index = -1;

                        if(isset($_SESSION['cart'])){
                            $cart = unserialize(serialize($_SESSION['cart']));
                            for($i = 0;$i<count($cart); $i++)
                            if($cart[$i]->ProductID == $_GET['ProductID']){
                                $index=$i;
                                break;
                            }
                        }
                        if($index == -1)
                        $_SESSION['cart'][] = $item;
                        else{
                            $cart[$index]->quantity++;
                            $_SESSION['cart'] = $cart;
                        }
                    }

                    //Delete
                    if(isset($_GET['index']) && !isset($_POST['saveupdate'])) {
                        $cart = unserialize(serialize($_SESSION['cart']));
                        unset($cart[$_GET['index']]);
                        $cart = array_values($cart);
                        $_SESSION['cart'] = $cart;
                    }
                    //Update
                    if(isset($_POST['saveupdate'])) {
                        $arrQuantity = $_POST['quantity'];
                        
                        // Check quabtity
                        $valid = 1;
                        for($i=0; $i < count($arrQuantity); $i++)
                        if(!is_numeric($arrQuantity[$i]) || $arrQuantity[$i] < 1) {
                            $valid = 0; 
                            break;
                        }
                        if($valid==1){
                            $cart = unserialize(serialize($_SESSION['cart']));
                            for($i = 0; $i < count($cart); $i++){
                                $cart[$i]->quantity = $arrQuantity[$i];
                            }
                            $_SESSION['cart'] = $cart;
                        }
                        else{
                            $error = 'Quantity is InValid';
                        }
                    }
                    ?>
                    <form method="POST">
                    <table class="table" cellpadding="2" cellspacing="2" border="1"  align="center">
                        <tr>
                            <th class="table-primary">option</th>
                            <th class="table-primary">Id</th>
                            <th class="table-primary">image</th>
                            <th class="table-primary">Name</th>
                            <th class="table-primary">Price</th>
                            <th class="table-primary">Quantity <input type="submit" value="Save" />
                                <input type="hidden" name="saveupdate"/>
                            </th>
                            <th class="table-warning" >Sub Total</th>
                        </tr>

                        <?php
                        $cart = unserialize(serialize($_SESSION['cart']));
                        $_SESSION['total'] = 0;
                        $index = 0;
                        for($i=0; $i<count($cart); $i++)
                        {   
                            $_SESSION['Sprice'] = $cart[$i]->Price * $cart[$i]->quantity;
                            $_SESSION['total'] += $cart[$i]->Price * $cart[$i]->quantity;
                            ?>
                        <tr>
                            <td><a href="myorder.php?index=<?php echo $index; ?>"
                                onclick="return confirm('Are you sure?')">Delete</a></td>
                            <td><?php echo $cart[$i]->ProductID; ?></td>
                            <td><img src="menu/<?php echo $cart[$i]->image; ?>" style="width:150px;height:150px;"/></td>
                            <td><?php echo $cart[$i]->ProductName; ?></td>
                            <td><?php echo $cart[$i]->Price; ?></td>
                            <td><input type="number" value="<?php echo $cart[$i]->quantity; ?>" 
                                style="width:50px;" name="quantity[]"/></td>
                            <td><?php echo $_SESSION['Sprice']; ?></td>
                        </tr>
                        <?php
                            $index++;
                        }
                        ?>
                        <tr>
                            <td colspan="6" align="center">sum</td>
                            <td align="left"><?php echo $_SESSION['total']; ?></td>
                        </tr>
                    </table>
                    <br>
                </div>
                    </form>>
                
                <form action="insertcode.php" method="POST" >
                <div align="center">
                    <div>
                        <labal>customers Name</labal>
                        <input type="text" name="CustomerName" placeholder="ชื่อลูกค้า"><br> 
                    </div>
                    <div>
                        <labal>My Phon</labal>
                        <input type="text" name="Phonnumber" placeholder="เบอร์โทรลูกค้า"><br> 
                    </div>
                    <div>
                        <labal> DateTime</labal>
                        <input type="datetime-local" id="send"  oninput="SaleDateTime.value = send.value">
                        <input type="text" name="SaleDateTime"  id="SaleDateTime" placeholder="วันที่สั่ง">
                    </div>
                    
                </div>

                <br>
            <div align="center">
                
                <button type="submit" name="insertdata" class="btn btn-primary">Confirmed</button>
            </div>
            </form>
</div>

    <footer>
        <p>Coffee Shop &copy;  | CPE04 Group2 </p>
    </footer>
    
</body>
</html>    
    