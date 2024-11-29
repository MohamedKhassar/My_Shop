<?php 
include 'connect_db.php';
try{
    if($_GET['id']){
        if(isset($con)){
            mysqli_query($con,"DELETE FROM clients WHERE id=$_GET[id]");
            header('Location: index.php');
        }
    }
}catch(mysqli_sql_exception $e){
    $error ="Error: ".$e->getMessage();
}
?>