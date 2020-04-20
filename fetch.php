<?php

//fetch.php

$connect = new PDO("mysql:host=localhost;dbname=project", "root", "Pang0808!!");

$column = array('SaleDateTime', 'CustomerID', 'StaffID', 'GrandTotal');

$query = '
SELECT * FROM sales 
WHERE SaleDateTime LIKE "%'.$_POST["search"]["value"].'%" 
OR CustomerID LIKE "%'.$_POST["search"]["value"].'%" 
OR StaffID LIKE "%'.$_POST["search"]["value"].'%" 
OR GrandTotal LIKE "%'.$_POST["search"]["value"].'%" 
';

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY SaleID DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $connect->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();

$data = array();

$total_order = 0;

foreach($result as $row)
{
 $sub_array = array();
 $sub_array[] = $row["SaleDateTime"];
 $sub_array[] = $row["CustomerID"];
 $sub_array[] = $row["StaffID"];
 $sub_array[] = $row["GrandTotal"];

 $total_order = $total_order + floatval($row["GrandTotal"]);
 $data[] = $sub_array;
}

function count_all_data($connect)
{
 $query = "SELECT * FROM sales";
 $statement = $connect->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}

$output = array(
 'draw'    => intval($_POST["draw"]),
 'recordsTotal'  => count_all_data($connect),
 'recordsFiltered' => $number_filter_row,
 'data'    => $data,
 'total'    => number_format($total_order, 2)
);

echo json_encode($output);


?>