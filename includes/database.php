<?php 
    $host = "localhost";
    $username = "root";
    $password = "";
    $db_name = "exam_tb";

    $connect = mysqli_connect($host,$username,$password,$db_name);

    if(!$connect){
        die("Failed to connect Database: " . mysqli_connect_error());
    }
?>