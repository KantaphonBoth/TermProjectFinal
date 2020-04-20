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

        // $fname = $_POST['fname'];
        // $lname = $_POST['lname'];
        // $course = $_POST['course'];
        // $contact = $_POST['contact'];

        $sql = "INSERT INTO sales (SaleDateTime,CustomerName) VALUES ('$date','$CusName')";
        mysqli_query($conn, $sql);

    


    $sql = "INSERT INTO `order`(name) VALUES ('$CusName')";
    mysqli_query($conn, $sql);

    $ordersid = mysqli_insert_id($conn);

    $cart = unserialize(serialize($_SESSION['cart']));
    for($i=0; $i < count($cart); $i++){
        // $sql = "INSERT INTO ordersdetall(productid,ordersid,price,quantity) VALUES('.$cart[$i]->ProductID.','.$ordersid.','.$cart[$i]->Price.','.$cart[$i]->quantity.')";
        mysqli_query($conn, 'INSERT INTO ordersdetall(productid,ordersid,price,quantity) 
    VALUES('.$cart[$i]->ProductID.','.$ordersid.','.$cart[$i]->Price.','.$cart[$i]->quantity.')');
    }
    unset($_SESSION['cart']);
    
}
unset($_SESSION['cart']);

?>
Thanks for buying products. Click<a href="int.php">here</a> to continue

<div class="card">
            <div class="card-body">
            
            <?php
                
                $sql = "SELECT * FROM sales";
                $sql_run = mysqli_query($conn, $sql)
            ?>
            
            <table class="table table-bordered table-dark">
                    <thead>
                        <tr>
                            <th scope="col">SaleID</th>
                            <th scope="col">SaleDateTime</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">DELETE</th>
                        </tr>
                    </thead>
            <?php
                if($sql_run)
                {
                    foreach($sql_run as $row)
                    {
            ?>            
                    <tbody>
                        <tr>
                            <td> <?php echo $row['SaleID']; ?> </td>
                            <td> <?php echo $row['SaleDateTime']; ?> </td>
                            <td> <?php echo $row['CustomerName']; ?> </td>
                            <td>
                                <button type="button" class="btn btn-danger deletebtn">DELETE</button>
                            </td>
                        </tr>
                    </tbody>
            <?php        
                    }
                }
                else
                {
                    echo "No Record Found";
                }
            ?>
                </table>

            </div>
        </div>

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
<a href="index.php">Continue Shopping</a> | <a href="int.php">Checkout</a>
</body>

</html>