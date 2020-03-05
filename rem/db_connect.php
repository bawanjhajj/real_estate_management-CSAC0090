<?php

$host = "localhost:3308";
$user = "root";
$password = "";
$dbname = "rem";

 $conn = mysqli_connect($host, $user, $password, $dbname);

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();


   
}

?>