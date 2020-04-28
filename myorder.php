<?php require_once('Header.php'); ?>

    
    
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
<div>
        <h5 style="text-align:center;">Add Coffee</h5>
        <div class="row">  
        <div class="col-6">
                <?php
                    session_start();

                    $dbhost = 'localhost';
                    $dbuser = 'root';
                    $dbpass = '123456789';
                    $dbname = 'final';
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
                
                    </form>
                </div>
                <div class="col-6">
                <form action="insertcode.php" method="POST" >
                <div align="center">
                    <div class="form-group">
                        <labal>customers Name</labal>
                        <input class="form-control" type="text" name="CustomerName" placeholder="ชื่อลูกค้า"><br> 
                    </div>
                    <div class="form-group">
                        <labal>My Phon</labal>
                        <input class="form-control" type="text" name="Phonnumber" placeholder="เบอร์โทรลูกค้า"><br> 
                    </div>
                    <div class="form-group">
                        <labal> DateTime</labal>
                        <input class="form-control" type="datetime-local" id="send"  oninput="SaleDateTime.value = send.value">
                        <br>
                        <input class="form-control" type="text" name="SaleDateTime"  id="SaleDateTime" placeholder="วันที่สั่ง">
                    </div>
                    
                </div>

                <br>
            <div align="center">
                
                <button type="submit" name="insertdata" class="btn btn-primary">Confirmed</button>
            </div>
            </form>
        </div>
    </div>  
</div>

    <footer>
        <p>Coffee Shop &copy;  | CPE04 Group2 </p>
    </footer>
    
	<?php require_once('footer.php'); ?>    
    