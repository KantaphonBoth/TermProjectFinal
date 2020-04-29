<?php

    $conn=mysqli_connect('localhost','root','123456789','final');
    
    if(!$conn)
    {
        die('Connection Error'.mysqli_error());
    }

?>