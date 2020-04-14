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

<h1>สั่งเครื่องดื่ม</h1>
    <form action="order.php" method="post">
        <input type="text" name="buyname" id="buyname" placeholder="เครื่องดื่ม" style="width:350px;" />
         
        <input type="text" name="number" id="number" placeholder="จำนวนเครื่องดื่ม" style="width:350px;" />

    </form>