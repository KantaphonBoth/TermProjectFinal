<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>COFFEE Shop</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"/>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <link rel="icon" href="favicon.ico" type="image/x-icon" />     
    <link href="https://fonts.googleapis.com/css?family=Chonburi&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css2/order.css">

    
</head>
<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

    <div class="menubars">
        <div class="container">
            <div class="logo">
                <h1>COFFEE Shop</h1>
            </div>
            <ul class="menu">
                
                <li>
                    <a href="coffee.php">หน้าหลัก</a>
                </li>
                <li>
                    <a href="order.php">สั่งซื้อ</a>
                </li>
                <li>
                    <a href="myorder.php">รถเข็น</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="clearfix"></div>
    <section class="info">
        <div class="container">
            <div class="info_area">
            
            </div>
        </div>
    </section>        
                
<div>
    <br>
        <h5 style="text-align:center;">Add Coffee</h5>

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
                <div style="border:5px solid #333; background-color:#f1f1f1; border-radius:25px; padding:50px;" align="center">
                    <h6><?php echo $product->ProductID; ?></h6>
                    <h4><?php echo $product->ProductName; ?></h4>
                    <h4><?php echo $product->Price; ?></h4>
                    <input type="submit" value="Buy" style="margin-top:5px;" class="btn btn-success"></input>
                </div>
                <br>
            </form>
        </div>
            <?php } ?>
            
    </div>



    <div class="clearfix"></div>
    <footer>
        <p>Coffee Shop &copy;  | CPE04 Group2 </p>
    </footer>
</body>
</html>    
    