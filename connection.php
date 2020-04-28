<?php

    $con=mysqli_connect('localhost','root','123456789','coffeeshop');
    
    if(!$con)
    {
        die('Connection Error'.mysqli_error());
    }

?>