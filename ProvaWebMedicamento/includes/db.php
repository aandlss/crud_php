<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "db_medicamentos";

	$con = mysqli_connect($host,$user,$pass);
    mysqli_select_db($con, $dbname);
?>