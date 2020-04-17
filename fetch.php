<?php

//fetch.php

$connect = new PDO("mysq:host=localhost;dbname=sales", "root", "Pang0808!!");

$column = array('CustomerID', 'ProductID', 'SaleDateTime', 'GrandTotal');

$query = '
SELECT * FROM project
WHERE CustomerID LIKE "%'.$_POST["search"]["seles"].'%" 
OR ProductID LIKE "%'.$_POST["search"]["seles"].'%"
OR SaleDateTime LIKE "%'.$_POST["search"]["seles"].'%"
OR GrandTotal LIKE "%'.$_POST["search"]["seles"].'%"

';

if(isset($_POST["sales"]))
{
    $query .= 'ORDER BY '.$column[$_POST['sales']['0']['column']].' '.$_POST['sales']['0']['dir']. ' ';
}
else
{
    $query .= 'ORDER BY SaleID DESC ';
}

$query1 = '';

if($_POST['length'] != -1)
{
    $query1 = 'LIMIT ' . . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $connect->prepare($query . $query1);

$statement->execute();

$result = $statement->fatchAll();

$data = array();

$total_order = 0;

foreach($result as $row)
{
    $sub_array();
    $sub_array[] = $row["CustomerID"];
    $sub_array[] = $row["ProductID"];
    $sub_array[] = $row["SaleDateTime"];
    $sub_array[] = $row["GrandTotal"];

    $total_sales = $total_sales + floatval($row["GrandTotal"]);
    $data[] =$sub_array
}

function count_all_data($connect)
{
    $query = "SELECT * FROM sales";
    $statement = $connect->prepare($query);
    $statement->execute();
    return $statement->rowCount();
}

$output = array(
    'draw'            =>  intval($_POST["draw"]),
    'recordsTotal'    =>  count_all_data($connect),
    'recordsFiltered' =>  $number_filter_row,
    'data'            =>  $data,
    'total'           => number_format($total_order, 2)
);

echo json_encode($output);



?>
