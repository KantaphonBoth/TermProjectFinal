<html>
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

<style>
input[type="text"]{
    height:20px;
    vertical-align:top;
}
.field_wrapper div{
    margin-bottom:10px;
}
.add_button{
    margin-top:10px;
    margin-left:10px;
    vertical-align: text-bottom;
}
.remove_button{
    margin-top:10px;
    margin-left:10px;
    vertical-align: text-bottom;
}
        
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
    height: 300px;
}

.menu{
    background-color:#EEE8AA;
    font-size: 30px;
    font-family: "Times New Roman", Times, serif;
}

</style>
</head>


<body>

<header>
    <div class="coffee">
    <h2>Coffee Shop</h2>
    </div>
</header>

<meta charset="utf-8">
<script src= "http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript"> 

$(document).ready(function(){
    var max = 10;
    var add = $('.add_button');
    var wrapper = $('.field_wrapper');
    var field = '<div> <input type="text" name="buyname[]" placeholder="เครื่องดื่ม"/> <input type="text" name="try[]" placeholder="ความหวาน"/> <input type="text" name="number[]" placeholder="จำนวนเครื่องดื่ม"/> <a class="remove_button"><input type="button" value="remove"/></a></div>';
    var x = 1;

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

<section>
<dic class="container">
    <div class = "buy">
        <h1>สั่งเครื่องดื่ม</h1>
        <form action="order.php" method="post">
        <div class="field_wrapper">
            <div>
                <input  type="text" name="buyname[]" id="buyname" placeholder="เครื่องดื่ม" />
                <input  type="text" name="try[]" id="try" placeholder="ความหวาน"/>
                <input  type="text" name="number[]" id="number" placeholder="จำนวนเครื่องดื่ม" />
                </div>
        </div>
        <input type="submit" name="submit" value="BUY" style="width:100px;height:50px"/>
        <a class="add_button"><input type="button"value="เพิ่ม" /></a>
        </form>
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
