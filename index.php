<?php
include 'connexion.php';

$req = "SELECT * FROM users";
$result = mysqli_query($connection, $req);

if(isset($_POST['add'])){
    if(empty($_POST['Name']) && empty($_POST['Email']) && empty($_POST['Phone'])){
        header('location:index.php?warning=Please Fill in all the fields !!');
    }
    else{
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $phone = $_POST['Phone'];
    $req = "INSERT INTO `users`(`ID`,`Name`,`Email`,`Phone`) VALUES(NULL,'$name','$email','$phone')";
    mysqli_query($connection, $req);
    header('location:index.php?success=User Added Successfuly');
}
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Vue Js</title>
    <!-- Include Bootstrap.min.css -->
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <!-- Include kit.fontawesome -->
    <script src="https://kit.fontawesome.com/e15ac426d7.js" crossorigin="anonymous"></script>
    <style>
    #overlay {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.6);
    }
    </style>
</head>

<body>
    <div id="app">
        <div class="container-fluid">
            <div class="row bg-dark">
                <div class="col-lg-12">
                    <p class="text-center text-light display-4 pt-2 fs-3">CRUD Application | Vue.js & PHP & MySQL</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-3">
                <div class="col-lg-6">
                    <h2 class="text-info">Registration Users</h2>
                </div>
                <div class="col-lg-6">
                    <button class="btn btn-outline-info float-end" @click="showAddModal=true">
                        <i class="fas fa-user me-2"></i>Add New User
                    </button>
                </div>
            </div>
            <?php 
                if(isset($_GET['success'])){
            ?>
            <div class="alert alert-success" role="alert"><?php echo $_GET['success'];?></div>
            <?php        
                }
            ?>
            <?php 
                if(isset($_GET['warning'])){
            ?>
            <div class="alert alert-warning" role="alert"><?php echo $_GET['warning'];?></div>
            <?php        
                }
            ?>
            <?php 
                if(isset($_GET['delete'])){
            ?>
            <div class="alert alert-danger" role="alert"><?php echo $_GET['delete'];?></div>
            <?php        
                }
            ?>
            <?php 
                if(isset($_GET['sucessUPSATE'])){
            ?>
            <div class="alert alert-success" role="alert"><?php echo $_GET['sucessUPSATE'];?></div>
            <?php        
                }
            ?>
            <?php 
                if(isset($_GET['warningUPSATE'])){
            ?>
            <div class="alert alert-warning" role="alert"><?php echo $_GET['warningUPSATE'];?></div>
            <?php        
                }
            ?>

            <hr class="mb-2">
            <!-- Displaying Users -->
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center bg-info text-light">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
        while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row['ID'] . "</td>" ;
        echo "<td>" . $row['Name'] . "</td>";
        echo "<td>" . $row['Email'] . "</td>";
        echo "<td>" . $row['Phone'] . "</td>";
        echo "<td><a href='update.php?i={$row['ID']}&lg={$row['Name']}&email={$row['Email']}&phone={$row['Phone']}' class='btn btn-success' >Update</a></td>";
        echo "<td><a href='delete.php?i={$row['ID']}' class='btn btn-danger' >Delete</a></td></tr>";
        }
        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Add New User Modal -->
        <div id="overlay" v-if="showAddModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New User</h5>
                        <button type="button" class="btn-close" aria-label="Close" @click="showAddModal=false">
                            <span aria-hidden="true"></span>
                        </button>
                    </div>
                    <div class="modal-body p-4">
                        <form action="" method="post">
                            <div class="form-group mb-3">
                                <input name="Name" type="text" class="form-control form-control-lg" placeholder="Name">
                            </div>
                            <div class="form-group mb-3">
                                <input name="Email" type="email" class="form-control form-control-lg"
                                    placeholder="E-mail">
                            </div>
                            <div class="form-group mb-3">
                                <input name="Phone" type="tel" class="form-control form-control-lg" placeholder="Phone">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-outline-info btn-block btn-lg col-12" name="add">Add
                                    User</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit New User Modal -->
        <div id="overlay" v-if="showEditModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit New User</h5>
                        <button type="button" class="btn-close" aria-label="Close" @click="showEditModal=false">
                            <span aria-hidden="true"></span>
                        </button>
                    </div>
                    <div class="modal-body p-4">
                        <form action="" method="post">
                            <div class="form-group mb-3">
                                <input name="Name" type="text" class="form-control form-control-lg" placeholder="Name"
                                    value="">
                            </div>
                            <div class="form-group mb-3">
                                <input name="Email" type="email" class="form-control form-control-lg"
                                    placeholder="E-mail" value="">
                            </div>
                            <div class="form-group mb-3">
                                <input name="Phone" type="tel" class="form-control form-control-lg" placeholder="Phone"
                                    value="">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-outline-info btn-block btn-lg col-12" name="edit">Edit
                                    User</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Include Vue Js -->
        <script src="vue.js"></script>
        <script text="text/javascript" src="myScript.js"></script>
</body>

</html>