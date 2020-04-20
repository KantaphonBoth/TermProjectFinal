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
    $dbname = 'test';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    $sql = "SELECT * FROM products";
    $sql_run = mysqli_query($conn, $sql)
?>

<div class="modal fade" id="coffeeaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
         <div class="modal-heafer">

            <button type="button" class="close" data-dismiss="modal" aria-labal="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <h5 class="modal-title" id="exampleModalLabel" style="text-align:center;">Add Coffee</h5>
            <form action="insertcode.php" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <labal> DateTime</labal>
                        <input type="datetime-local" id="send" class="form-control" oninput="SaleDateTime.value = send.value">
                        <br>
                        <input type="text" name="SaleDateTime" class="form-control" id="SaleDateTime" placeholder="วันที่สั่ง">
                    </div>
                    <div class="form-group">
                        <labal>customers Name</labal>
                        <input type="text" name="CustomerName" class="form-control" placeholder="ชื่อลูกค้า"> 
                    </div>
                    <div class="form-group">
                        <labal> Coffee Name</labal>
                        <input type="text" name="nCoffee" class="form-control" placeholder="ใส่ชื่อกาแฟ">
                    </div>
                    <div class="form-group">
                        <labal>NumberCoffee</labal>
                        <input type="number" name="number" class="form-control" placeholder="จำนวนสินค้า">
                    </div>
                    <div>
                    <table cellpadding="2" cellspacing="2" border="0">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Price</th>
                        </tr>
                        <?php while($product = mysqli_fetch_object($sql_run)) {?>
                            <tr>
                                <td><?php echo $product->ProductID; ?></td>
                                <td><?php echo $product->ProductName; ?></td>
                                <td><?php echo $product->Price; ?></td>
                                <td><a href="cart.php?ProductID=<?php echo $product->ProductID; ?>&action=add">Order New</a></td>
                            </tr>
                        <?php } ?>
                    </table>
                    </div>
                </div>
                
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="insertdata" class="btn btn-primary">Coffee BUY</button>
                
            </div>
            </form>
        </div>
    </div>
</div>
<!-- ############################################################################################################################# -->
<!-- edit -->
<!-- ############################################################################################################################# -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
         <div class="modal-heafer">
            <h5 class="modal-title" id="exampleModalLabel">Edit Coffee</h5>
            
            <button type="button" class="close" data-dismiss="modal" aria-labal="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <form action="updatecode.php" method="POST">
                <div class="modal-body">
                
                <input type="hidden" name="update_id" id="update_id"/>

                    <div class="form-group">
                        <labal> DateTime</labal>
                        <input type="datetime-local" id="send" class="form-control" oninput="SaleDateTime.value = send.value">
                        <br>
                        <input type="text" name="SaleDateTime" class="form-control" id="SaleDateTime" placeholder="วันที่สั่ง">
                    </div>
                    <div class="form-group">
                        <labal>customers Name</labal>
                        <input type="text" name="CustomerName" class="form-control" id="CustomerName" placeholder="ชื่อลูกค้า"> 
                    </div>
                    <div class="form-group">
                        <labal> Coffee Name</labal>
                        <input type="text" name="nCoffee" class="form-control" id="nCoffee" placeholder="ใส่ชื่อกาแฟ">
                    </div>
                    <div class="form-group">
                        <labal>NumberCoffee</labal>
                        <input type="text" name="number" class="form-control" id="number" placeholder="จำนวนสินค้า">
                    </div>

                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="updatedata" class="btn btn-primary">Update Coffee BUY</button>
            </div>
        </form>

        </div>
    </div>
</div>

<!-- ############################################################################################################################# -->
<!-- Delete -->
<!-- ############################################################################################################################# -->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
         <div class="modal-heafer">
            <h5 class="modal-title" id="exampleModalLabel">Delete Coffee</h5>
            <button type="button" class="close" data-dismiss="modal" aria-labal="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <form action="deletecode.php" method="POST">
                
                <div class="modal-body">
                
                <input type="hidden" name="delete_id" id="delete_id"/>

                <h4>Delete coffee order ??</h4>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="submit" name="deletedata" class="btn btn-primary">Yes, Delete coffee</button>
            </div>
        </form>

        </div>
    </div>
</div>

<!-- ############################################################################################################################# -->

<div class="container">
    <div class="jumbotron">
        <div class="card">
            <h2> PHP Coffee Modal</h2>
        </div>
        <div class="card">
            <div class="card-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#coffeeaddmodal">
                    ADD COFFEE
                </button>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
            
            <?php
                $dbhost = 'localhost';
                $dbuser = 'test';
                $dbpass = '123456789';
                $dbname = 'test';
                $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
                
                $sql = "SELECT * FROM sales";
                $sql_run = mysqli_query($conn, $sql)
            ?>
            
            <table class="table table-bordered table-dark">
                    <thead>
                        <tr>
                            <th scope="col">SaleID</th>
                            <th scope="col">SaleDateTime</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Coffee Name</th>
                            <th scope="col">Number Coffee</th>
                            <th scope="col">EDIT</th>
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
                            <td> <?php echo $row['nCoffee']; ?> </td>
                            <td> <?php echo $row['number']; ?> </td>
                            <td>
                                <button type="button" class="btn btn-success editbtn">EDIT</button>
                            </td>
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
</body>

</html>