<?php 
include_once "connect_db.php";
$sql="SELECT * FROM clients";
try{
    if(isset($con)){
        $clients=mysqli_query($con,$sql);
    }
}catch(mysqli_sql_exception $e){
    $error= "Error: ".$e->getMessage();
}

function delete_client($id){

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <?php 
        if($success):
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> <?php echo $success; ?>
        </div>
        <?php endif?>            
        <?php 
        if($error):
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $error ?>
            <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
        </div>
        <?php endif?>
        <h2 class="text-center text-capitalize">list of clients</h2>
        <a role="button" class="btn btn-primary text-capitalize" href="create.php">new client</a>
        <br>
        <br>
        <table class="table table-dark ">
            <thead>
                <tr class="text-center">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(isset($clients)):
                foreach($clients as $client):  ?>
                <tr class="text-center">
                    <td><?php  echo $client['id'] ?></td>
                    <td><?php echo $client['name']  ?></td>
                    <td><?php echo $client['email']  ?></td>
                    <td><?php echo $client['phone']  ?></td>
                    <td><?php echo $client['address']  ?></td>
                    <td class="d-flex justify-content-evenly align-item-center ">
                        <a href=<?php echo "edit.php?id=$client[id]"?> class="btn btn-warning text-white text-capitalize">edit</a>
                        <a onclick="return confirm('Are You Sure You Want To Delete This Client!!')" href=<?php echo "delete.php?id=$client[id]"?> class="btn btn-danger text-white text-capitalize">delete</a>
                    </td>
                </tr>
                <?php 
                endforeach;
                endif
                ?>
            </tbody>
        </table>    
    </div>
</body>
</html>