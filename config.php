<?php

$host = "sql105.infinityfree.com";
$user = "if0_38744894";
$password = "h00oYs73KaDC";
$db = "if0_38744894_portfolio_db";

$conn = new mysqli($host,$user,$password,$db);

if($conn->connect_error){
    die("DB connection failed");
}
?>