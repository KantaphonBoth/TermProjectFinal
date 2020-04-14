<html>
<head>
    <title>Page Layout</title>
<?php
$dbhost = 'localhost';
$dbuser = 'coffee';
$dbpass = '123456789';
$dbname = 'coffee';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(! $conn ){
	die('Could not connect: ' . mysqli_error());
}
?>

    <style>
        .coffee {
            background-color: #F0E68C;
            padding: 30px;
            text-align: center;
            font-size: 35px;
            color: white;
            font-weight:bold;
        }

        .buy {
            float: left;
            padding: 20px;
            width: 70%;
            background-color: #BDB76B;
            height: 300px; /* only for demonstration, should be removed */
        }
    </style>
</head>


<body>

<header>
    <div class="coffee">
    <h2>Coffee Shop</h2>
    </div>
</header>


<section>
<div class = "buy">
    <h1>สั่งเครื่องดื่ม</h1>
        
        <form action="order.php" method="post">
            ชื่อเครื่องดื่ม:
        <input type="text" name="buyname" id="buyname" placeholder="เครื่องดื่ม" style="width:150px;" />
            ชนิด:
        <input type="text" name="try" id="try" placeholder="ความหวาน" style="width:150px;" />
            จำนวน:
        <input type="text" name="number" id="number" placeholder="จำนวนเครื่องดื่ม" style="width:150px;" />
        </form>
 </div>   
</section>
</html>
</body>