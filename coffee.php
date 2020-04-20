<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>COFFEE Shop</title>
    
    <link href="https://www.download-free-fonts.com/details/107115/tempus-sans-itc" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


    <div class="menubar">
        <div class="container">
            <div class="logo">
                <h1>COFFEE Shop</h1>
            </div>
            <ul class="menu">
                
                <li>
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="#">My Order</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="clearfix"></div>

    <header class="header">
        <div class="container">
            <div class="header_area">
                <h1>COFFEE Shop</h1>
                <p></p>
            </div>
        </div>
    </header>

    <section class="info0">
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

    <section class="info2">
        <div class="container">
            <div class="info2_area">
            <div>
                <button  onclick="myFunction()" class="btn btn-primary">
                ADD COFFEE
                </button>
            </div>
            <div class="row">
    <div id="coffeeaddmodal" class="col-sm-6" >
        <h5 style="text-align:center;">Add Coffee</h5>
            <form action="insertcode.php" method="POST">
            <div>
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
                    <table cellpadding="2" cellspacing="2" border="1">
                        <tr>
                            <th>option</th>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity <input type="submit" value="Save" />
                                <input type="hidden" name="saveupdate"/>
                            </th>
                            <th>Sub Total</th>
                        </tr>

                        <?php
                        $cart = unserialize(serialize($_SESSION['cart']));
                        $s=0;
                        $index = 0;
                        for($i=0; $i<count($cart); $i++)
                        {
                            $s += $cart [$i]->Price * $cart [$i]->quantity;
                            ?>
                        <tr>
                            <td><a href="coffee.php?index=<?php echo $index; ?>"
                                onclick="return confirm('Are you sure?')">Delete</a></td>
                            <td><?php echo $cart[$i]->ProductID; ?></td>
                            <td><?php echo $cart[$i]->ProductName; ?></td>
                            <td><?php echo $cart[$i]->Price; ?></td>
                            <td><input type="number" value="<?php echo $cart[$i]->quantity; ?>" 
                                style="width:50px;" name="quantity[]"/></td>
                            <td><?php echo $cart[$i]->Price * $cart[$i]->quantity; ?></td>
                        </tr>
                        <?php
                            $index++;
                        }
                        ?>
                        <tr>
                            <td colspan="5" align="right">sum</td>
                            <td align="left"><?php echo $s; ?></td>
                        </tr>
                    </table>
                    <br>
                    <!-- <a href="int.php">Continue Shopping</a> | <a href="checkout.php">Checkout</a> -->
                </div>
                <div>
                    <div>
                        <labal> DateTime</labal>
                        <input type="datetime-local" id="send" class="form-control" oninput="SaleDateTime.value = send.value">
                        <input type="text" name="SaleDateTime" class="form-control" id="SaleDateTime" placeholder="วันที่สั่ง">
                    </div>
                    <div>
                        <labal>customers Name</labal>
                        <input type="text" name="CustomerName" class="form-control" placeholder="ชื่อลูกค้า"><br> 
                    </div>
                </div>
                

                <br>
            <div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="insertdata" class="btn btn-primary">Coffee BUY</button>
            </div>
            </form>
    </div>


    <div class="col-sm-6">
        <?php

        $dbhost = 'localhost';
        $dbuser = 'test';
        $dbpass = '123456789';
        $dbname = 'test';
        $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

        $sql = "SELECT * FROM products";
        $sql_run = mysqli_query($conn, $sql);
        ?>

        <div>
        <table cellpadding="2" cellspacing="2" border="0">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Price</th>
                <th>Buy</th>
            </tr>
            <?php while($product = mysqli_fetch_object($sql_run)) {?>
                <tr>
                    <td><?php echo $product->ProductID; ?></td>
                    <td><?php echo $product->ProductName; ?></td>
                    <td><?php echo $product->Price; ?></td>
                    <td><a href="coffee.php?ProductID=<?php echo $product->ProductID; ?>&action=add">Order New</a></td>
                </tr>
            <?php } ?>
        </table>
        </div>
    </div>
</div>
            </div>
        </div>
    </section>

    <div class="clearfix"></div>

    


    <footer>
        <p>Coffee Shop &copy;  | CPE04 Group2 </p>s
    </footer>

    
<script>
$(document).ready(function() {
    $('.editbtn').on('click', function() {
        $('#editmodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();

        console.log(data);

        $('#update_id').val(data[0]);
        $('#SaleDateTime').val(data[1]);
        $('#CustomerName').val(data[2]);
        $('#nCoffee').val(data[3]);
        $('#number').val(data[4]);
    });
});
</script>
<script>
$(document).ready(function() {
    $('.deletebtn').on('click', function() {
        $('#deletemodal').modal('show');
            
            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#delete_id').val(data[0]);
    });
});
</script>

<script>
function myFunction() {
  var x = document.getElementById("coffeeaddmodal");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
</body>
</html>