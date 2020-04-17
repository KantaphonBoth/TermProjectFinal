
<!DOCTYPE html>
<html lang="en">
<head>
<?php
$dbhost = 'localhost';
$dbuser = 'project';
$dbpass = '123456789';
$dbname = 'project';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(! $conn ){
	die('Could not connect: ' . mysqli_error());
}
?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>coffee shop</title>
<link href="https://www.download-free-fonts.com/details/107115/tempus-sans-itc" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">


</head>


<body>
    <div class="clearfix"></div>
    <header class="header">
        <div class="container">
            <div class="header_area">
            <h2>COFFEE Shop</h2>
            </div>
        </div>
    </header>


<script src= "http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript"> 

$(document).ready(function(){
    var max = 5;
    var add = $('.add_button');
    var wrapper = $('.field_wrapper');
    var field = '<div ><input type="text" name="buyname[]" placeholder="เครื่องดื่ม"/><a class="remove_button"><input type="button" value="remove"/></a></div>';
    var x = 0;

    $(add).click(function(){
        if(x < max){
            $(wrapper).append(field);
            x++;
        }
    });
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    });
});
</script>

<section class="info1">
    <dic class="container">
        <div class="info1_area">
            <div class="info1_text">
                <h1>สั่งเครื่องดื่ม</h1>
            <form action="order.php" method="post">
            <br>
                <div class="field_wrapper">
                    
            </div>
            <input type="submit" name="submit" value="BUY" style="width:100px;height:50px"/>
            <a class="add_button"><input type="button"value="เพิ่ม" /></a>
            </form>
            </div>
        </div>
    </dic>   
</section>
<div class = "menu">
    <?php
        $sql = "SELECT ProductID,ProductName FROM products";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                echo "<br>".$row["ProductID"]."-".$row["ProductName"];
            }
        }
        else{
            echo "0 results";
        }
        $conn->close();
    ?>
</div>
</body>
</html>
