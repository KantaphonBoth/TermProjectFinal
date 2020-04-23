<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial.scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Page test</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<div align="center">
    Thanks for buying products. Click<a href="int.php">here</a> to continue,SubTotal<?php echo $_SESSION['total'];?>
</div>

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
    <table cellpadding="2" cellspacing="2" border="1"  align="center">
        <tr>
            <!-- <th>option</th> -->
            <th>Id</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity </th>
            <th>Sub Total</th>
        </tr>
        <tr>
            
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
            <td><?php echo $cart[$i]->ProductID; ?></td>
            <td><?php echo $cart[$i]->ProductName; ?></td>
            <td><?php echo $cart[$i]->Price; ?></td>
            <td><?php echo $cart[$i]->quantity; ?></td>
            <td><?php echo $cart[$i]->Price * $cart[$i]->quantity; ?></td>
        </tr>
        <?php
    $index++;
    }
    ?>
        <tr>
        <td colspan="4" align="right">sum</td>
        <td align="left"><?php echo $_SESSION['total']; ?></td>
        </tr>
    </table>
    <?php
    unset($_SESSION['cart']);
}   
?>






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
<a href="index.php">Continue Shopping</a> | <a href="int.php">Checkout</a>
</body>

</html>