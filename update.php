<?php
include 'connexion.php';

if (isset($_POST['Update'])) {
    if ( empty($_POST['ID']) || empty($_POST['Name']) || empty($_POST['Email']) || empty($_POST['Phone']) ) {
        header("location:index.php?warningUPSATE=Please Fill in all the fields !!");
    } else {
        $ID = $_POST['ID'];
        $Name = $_POST['Name'];
        $Email = $_POST['Email'];
        $Phone = $_POST['Phone'];

        $query = "UPDATE `users` SET `Name`='$Name',`Email`='$Email',`Phone`='$Phone' WHERE `ID`=$ID";
        $result = mysqli_query($connection,$query);
        header("location:index.php?sucessUPSATE=User Updated Succesfuly !!");
    }
    
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update | Administration</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
</head>
<body style="background-color:#CCC;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto m">
                <div class="card bg-dark mt-5">
                    <div class="card-title bg-success text-white mt-5">
                        <h3 class="text-center py-3">UPDATE</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <input class="form-control mb-3" type="text" name="ID" id="" placeholder="CNI" value="<?php echo $_GET['i'];?>">
                            <input class="form-control mb-3" type="text" name="Name" id="" placeholder="Username" value="<?php echo $_GET['lg'];?>">
                            <input class="form-control mb-3" type="email" name="Email" id="" placeholder="Email" value="<?php echo $_GET['email'];?>">
                            <input class="form-control mb-3" type="number" name="Phone" id="" placeholder="Phone" value="<?php echo $_GET['phone'];?>">
                            <button name="Update" class="btn btn-outline-success">Update</button>
                            <a href="index.php" class="btn btn-outline-warning">Retour</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>