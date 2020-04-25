<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial.scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Page test</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link href="css/check.css" rel="stylesheet" type="text/css">
</head>
<body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>



<?php


$dbhost = 'localhost';
$dbuser = 'test';
$dbpass = '123456789';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
$db = mysqli_select_db($conn, 'test');
require 'item.php';
    
    if(isset($_POST['insertdata']))
    {
        session_start();
        $date = $_POST['SaleDateTime'];
        $CusName = $_POST['CustomerName'];
        $CofName = $_POST['nCoffee'];
        $num = $_POST['number'];
        $s = $_SESSION['total'];
        $ph = $_POST['Phonnumber'];
        

        $sql = "INSERT INTO sales (CustomerName,phonNo,SaleDateTime,Total) VALUES ('$CusName','$ph','$date',$s)";
        mysqli_query($conn, $sql);
        ?>
<header >  
        <div class="row">
                     <div class="col-4"> 
            <?php

                // $sql = "INSERT INTO `order`(name,Total) VALUES ('$CusName','$s')";
                // mysqli_query($conn, $sql);

                $ordersid = mysqli_insert_id($conn);

                $cart = unserialize(serialize($_SESSION['cart']));
                $index = 0;
                for($i=0; $i < count($cart); $i++){
                    $s = $_SESSION['total'];
                    // $sql = "INSERT INTO ordersdetall(productid,ordersid,price,quantity) VALUES('.$cart[$i]->ProductID.','.$ordersid.','.$cart[$i]->Price.','.$cart[$i]->quantity.')";
                    mysqli_query($conn, 'INSERT INTO ordersdetall(productid,ordersid,price,quantity) 
                VALUES('.$cart[$i]->ProductID.','.$ordersid.','.$cart[$i]->Price * $cart[$i]->quantity.','.$cart[$i]->quantity.')');
            ?>
                        <!-- <td><a href="int.php?index=<?php echo $index; ?>"
                            onclick="return confirm('Are you sure?')">Delete</a></td> -->
                        <!-- <p><?php echo $cart[$i]->ProductID; ?></p> -->
                        <!-- <p><img src="menu/<?php echo $cart[$i]->image; ?>" style="width:150px;height:150px;"/></p> -->
                       
                        <!-- <p><?php echo $cart[$i]->Price; ?></p> -->
                        <div>
                        <h2><a href="#" class="btn btn-one">Product:<?php echo $cart[$i]->ProductName; ?> Num:<?php echo $cart[$i]->quantity; ?> Price:<?php echo $cart[$i]->Price * $cart[$i]->quantity; ?></a></h2>
                        </div> 
                    </tr>
                    <?php
                $index++;
                }
                ?>
                </div>  
                <div class="col-8">
            <div class="hero">
            <h1>Thanks for buying products.
            <br>by <?php echo $CusName?>
            <br>SUM <?php echo $_SESSION['total']; ?></h1>
                
            <div class="button">
                <a href="coffee.php" class="btn btn-two"> HOME PAGE</a>
                <a href="index.php" class="btn btn-two"> SUMORDER PAGE</a>    
            </div>    
                    
            </header>
        </div>
    </div>
</div>
   <?php
        unset($_SESSION['cart']);
    }   
    ?>

</body>

</html>