<?php
    session_start();
    include "../connect.php";
    
    $email = $_SESSION['email'];
    if(!isset($_SESSION['email'])) {
        header("Location: ../login.php");
        exit();
    }

    
    $select_signup = mysqli_query($conn, "SELECT * FROM signup");
    // $signup = mysqli_fetch_assoc($select_signup);
    
    $conn->close();
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details | MEGAPROFITSTRADE</title>
    <link rel="stylesheet" href="style.css">
    <!-- <script src="https://kit.fontawesome.com/be0461b2be.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>
    .admin{
        width: 100%;
        height: 100vh;
        background-attachment: fixed;
        overflow-y: scroll;
    }
    .admin .details table {
        width: 100px !important;
        overflow-x: scroll !important;
    }
</style>
<body>
    <div class="megaprofits">
        <div class="admin">
            <nav class="navbar navbar-expand-lg sticky-top shadow">
                <div class="container">
                    <!-- <a class="navbar-brand" href="#">Navbar</a> -->
                    <img src="../images/logo1.png" width="100%" alt="">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                        <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active text-white" aria-current="page" href="index.php">User details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="transaction.php">Transaction</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="wallet.php">Wallet details</a>
                            </li>
                        </ul>
                        <a href="../logout.php" class="ms-auto">
                            <button>Logout</button>
                        </a>
                    </div>
                </div>
            </nav>

            <div class="details my-5 text-center">
                <h2 class="mb-4">User Details</h2>
                <div class="container-fluid">
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Account Balance</th>
                            <th>Deposit Balance</th>
                            <th>Withdraw Balance</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Email Address</th>
                            <th>Phone number</th>
                            <th>Gender</th>
                            <th>Country</th>
                            <th>Currency</th>
                            <th>Password</th>
                            <th>Action</th>
                        </tr>
                        <?php
                            while ($signup = mysqli_fetch_assoc($select_signup)) {
                                ?>
                        <tr>
                            <td><?php echo $signup['id']?></td>
                            <td><?php echo $signup['accountBalance']?></td>
                            <td><?php echo $signup['depositBalance']?></td>
                            <td><?php echo $signup['withdrawBalance']?></td>
                            <td><?php echo $signup['firstname']?></td>
                            <td><?php echo $signup['lastname']?></td>
                            <td><?php echo $signup['email']?></td>
                            <td><?php echo $signup['number']?></td>
                            <td><?php echo $signup['gender']?></td>
                            <td><?php echo $signup['country']?></td>
                            <td><?php echo $signup['currency']?></td>
                            <td><?php echo $signup['password']?></td>
                            <td>
                                <a aria-current="page" href="edit.php?edits=<?php echo $signup["email"];?>">
                                    <button>Edit</button>
                                </a>
                            </td>
                        </tr>
                        <?php }?>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>