<?php 
include 'connect_db.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['submit'])){
        try{
            if(isset($con)){
                $name=$_POST['name'];
                $email=$_POST['email'];
                $phone=$_POST['phone'];
                $address=$_POST['address'];
                mysqli_query($con,"UPDATE clients SET name='$name', email='$email', phone='$phone',address='$address' WHERE id=$_GET[id];");
                $success="Successfully updated client";
                header("Location: index.php",true);
            }
        }catch(mysqli_sql_exception $e){
            $error="Something Wrong: " . $e->getMessage();
        }
}
}
try{
    if(!empty($_GET['id'])){
        if(isset($con)){
            $client=mysqli_query($con,"SELECT * FROM clients WHERE id=$_GET[id];");
            $client=mysqli_fetch_assoc($client);
            // var_dump($client);
        }
    }
}catch(mysqli_sql_exception $e){
    $error="Something Wrong: ". $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create new client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
    <?php 
        if($error):
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $error ?>
            <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
        </div>
        <?php endif?>
        <h2 class="text-center text-capitalize">create new client</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" value="<?php echo $client['name']?>" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" value="<?php echo $client['email']?>" id="email" name="email" >
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" value="<?php echo $client['phone']?>" id="phone" name="phone" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" value="<?php echo $client['address']?>" id="address" name="address" required>
            </div>
            <button type="submit" name="submit" class="btn btn-success btn-lg text-capitalize">save</button>
        </form>
    </div>
</body>
</html>