<?php 
$host_name="localhost";
$user_name="root";
$password="";
$db_name="myshop";
$error=null;
$con=null;
$success=null;
$clients=null;
try{
    $con=mysqli_connect($host_name,$user_name,$password,$db_name);
}catch(mysqli_sql_exception $e){
    $error="Connection failed: " . $e->getMessage();
}
?>