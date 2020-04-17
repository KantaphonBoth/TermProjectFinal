<html>
<head>


</head>
<body>


<?php

$dbhost = 'localhost';
$dbuser = 'project';
$dbpass = '123456789';
$dbname = 'project';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(! $conn ){
	die('Could not connect: ' . mysqli_error());
}

$b[] = $_POST["buyname"];
// $b2[] = $_POST["buyname[]"];
// $b3[] = $_POST["buyname[]"];

$t1 = $_POST["try"];
// $t2[] = $_POST["try[1]"];
// $t3[] = $_POST["try[2]"];

$n1 = $_POST["number"];
// $n2[] = $_POST["number[1]"];
// $n3[] = $_POST["number[2]"];

$sql = "SELECT ProductName 
FROM products 
WHERE ProductName = '$b'";
$query = mysql_query($sql);


// $sql = "SELECT P.ProductName,SD.Quantity,P.ProductDetail
// FROM products P 
// INNER JOIN  sale_details SD ON P.ProductID = SD.ProductID
// INNER JOIN sales S ON SD.SaleID = S.SaleID
// INNER JOIN customers C ON S.CustomerID = C.CustomerID
// WHERE P.ProductName = '$b1' AND SD.Quantity = $n1 AND P.ProductDetail LIKE '%$t1%'";
        $result = $conn->query($sql);
        if ($result->num_rows == true) {
            while($row = $result->fetch_assoc()){
                
                echo "<br>"."-".$row["ProductName"];
            }
        }
        else{
            echo "0 results";
        }
        $conn->close();


// mysql_close($conn); 
?>
<?php
if (isset($_POST['submit'])){
    $sum = $field_Values_array = $_POST['buyname'];
    print_r($sum);
}

?>
</body>
</html>