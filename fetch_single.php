<?php

//fetch_single.php
//".$_GET["id"]."

$connect = new PDO("mysql:host=localhost;dbname=test", "root", "123456789");

if(isset($_GET["id"]))
{
 $query = "SELECT * 
 FROM products 
 INNER JOIN  ordersdetall ON products.ProductID = ordersdetall.productid 
 INNER JOIN sales ON sales.SaleID = ordersdetall.ordersid
 WHERE sales.SaleID = '".$_GET["id"]."'";

 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $output = '<div class="row">';
 foreach($result as $row)
 {
//   $images = '';
//   if($row["images"] != '')
//   {
//    $images = '<img src="images/'.$row["images"].'" class="img-responsive img-thumbnail" />';
//   }
//   else
//   {
//    $images = '<img src="https://www.gravatar.com/avatar/38ed5967302ec60ff4417826c24feef6?s=80&d=mm&r=g" class="img-responsive img-thumbnail" />';
//   }
  $output .= '
  <div class="col-md-9">
   <br />
   <p><label>Product ID :&nbsp;</label>'.$row["ProductID"].'</p>
   <p><label>Coffee Name :&nbsp;</label>'.$row["ProductName"].'</p>
   <p><label>Coffee quantity :&nbsp;</label>'.$row["quantity"].'</p>
   <p><label>Price :&nbsp;</label>'.$row["price"].' </p>
  </>
  </div><br />
  ';
 }
 echo $output;
}

?>
